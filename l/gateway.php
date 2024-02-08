<?php

define("APP_ACCESS", "p");
require_once("../system/app.inc.php");

$session->adicionarValor(APP_AUTENTICADO, APP_AUTENTICADO_OFF);
$session->adicionarValor(APP_DATA_ACESSO, Data::agora());
$session->adicionarValor(APP_USER_ID, 0);
$session->adicionarValor(APP_IP, getIp());

$flag = true;

$t1 = $session->lerValor(APP_TOKEN);
$t2 = $request->post("token");

$rp1 = $request->post("defaultReal");
$rp2 = $request->post("defaultRealHash");

$token   = Criptografia::comparaHash($t1,$t2);
$captcha = Criptografia::realPersonCompare($rp1,$rp2);


if(!$token) {
    // O token não foi reconhecido nesta sessao
    $response->redirectTo("index.php?msg=10");
    exit;
}

if(!$captcha) {
    // Captcha informado pelo usuário está errado
    $response->redirectTo("index.php?msg=11");
    exit;
}

$frm = $request->post("frm");

// Form Login
if($frm == 1 ) {

    $query = "SELECT codigo, password, astatus, tipo,token FROM usuarios WHERE (email=? or login=?) AND (astatus=? OR astatus=?)";
    $params = array(
        $request->post("usuario"),
        $request->post("usuario"),
        "novo", "ativo"
    );

    $flag = $db->executar($query, $params);

    if (!$flag) {
        // Ocorreu um erro ao processar a query
        $response->redirectTo("index.php?msg=13");
        exit;
    }

    if ($db->qtdRegistros() == 0) {
        // Nenhum registro encontrado
        $response->redirectTo("index.php?msg=12");
        exit;
    }


    $resultado = $db->resultado(APP_RESULTADO_OBJETOS)[0];

    $rsenha = $request->post("senha");
    $bsenha = $resultado->password;

    $flag = Criptografia::verify($rsenha, $bsenha);
    if (!$flag) {
        // Senha inválida
        $response->redirectTo("index.php?msg=12");
        exit;
    }


    if($resultado->astatus=='novo') {
        $pin  = Criptografia::gerarSenha(4);
        $session->adicionarValor("USER_RESET_PIN", $pin);
        $session->adicionarValor("USER_RESET_ID", $resultado->codigo);
        $session->adicionarValor("USER_RESET_TK", $resultado->token);

        $url = "update.php?pin=" . $pin;
        $response->redirectTo($url);
        exit;
    }

    $sqlLogUser = "INSERT INTO logs_admin (session,data_ocorrencia,ip,usuario,acao) VALUES (?,?,?,?,?)";
    $params = array(
        $session->sid(),
        Data::agora(),
        getIp(),
        $resultado->codigo,
        'login'
    );

    $db->executar($sqlLogUser,$params);

    $session->adicionarValor(APP_AUTENTICADO, APP_AUTENTICADO_ON);
    $session->adicionarValor(APP_DATA_ACESSO, Data::agora());
    $session->adicionarValor(APP_USER_ID, $resultado->codigo);
    $session->adicionarValor(APP_USER_STATUS, $resultado->astatus);
    $session->adicionarValor(APP_USER_TIPO, $resultado->tipo);

    $cookie->adicionar(APP_AUTENTICADO, APP_AUTENTICADO_ON);
    $cookie->adicionar(APP_BROWSER, Browser::getCurrentBrowser());

    $response->redirectTo("../dashboard/index.php");
    exit;
}
// Form Reset Senha
else if($frm == 2) {

    $email = $request->post("email");

    $sqlReset = "SELECT codigo,token,email FROM usuarios WHERE email=?";
    $param = array($email);


    $db->executar($sqlReset,$param);
    $objetos = $db->resultado(APP_RESULTADO_OBJETOS);
    $qtd = $db->qtdRegistros();

    if($qtd==0) {
        $response->redirectTo("index.php");
        exit;
    }

    $usuario = $objetos[0];
    $senha = Criptografia::gerarSenha(10);
    $csenha = Criptografia::hash($senha);

    $sqlResetSenha = "UPDATE usuarios SET password=?,astatus=? WHERE codigo=?";
    $param = array($csenha,'novo',$usuario->codigo);
    $flag = $db->executar($sqlResetSenha,$param);

    if($flag) {
        $response->redirectTo("index.php");
        exit;
    }


    $mail = new PHPMailer(true);
    $mail->isSMTP();

    try {
        $mail->Host = 'br284.hostgator.com.br'; // Endereço do servidor SMTP (Autenticação, utilize o host smtp.seudomínio.com.br)
        $mail->SMTPAuth   = true;  // Usar autenticação SMTP (obrigatório para smtp.seudomínio.com.br)
        $mail->Port       = 465; //  Usar 587 porta SMTP
        $mail->Username = 'contato@sindseq.org.br'; // Usuário do servidor SMTP (endereço de email)
        $mail->Password = '^CgrDw_ETdDA'; // Senha do servidor SMTP (senha do email usado)

        //Define o remetente
        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        $mail->SetFrom('contato@sindseq.org.br', 'SINDSEQ'); //Seu e-mail
        $mail->AddReplyTo('contato@sindseq.org.br', 'SINDSEQ'); //Seu e-mail
        $mail->Subject = 'Troca de Senha';//Assunto do e-mail


        //Define os destinatário(s)
        //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        $mail->AddAddress('e-mail@destino.com.br', 'Teste Locaweb');


        //Define o corpo do email
        $mail->MsgHTML('corpo do email');

        ////Caso queira colocar o conteudo de um arquivo utilize o método abaixo ao invés da mensagem no corpo do e-mail.
        //$mail->MsgHTML(file_get_contents('arquivo.html'));

        $mail->Send();
        echo "Mensagem enviada com sucesso</p>\n";
    } catch (phpmailerException $e){
        $response->redirectTo("index.php");
        exit;
    }

}
// Form Troca Status
else if($frm == 3) {

    $s1 = $request->post("s1");
    $s2 = $request->post("s2");

    if($s1!=$s2) {
        $response->redirectTo("index.php");
        exit;
    }


    $ut1 = $request->post("utoken");
    $pin = $request->post("pin");

    $flag = true;
    $flag &= Criptografia::comparaHash($ut1,$session->lerValor("USER_RESET_TK"));
    $flag &= Criptografia::comparaHash($pin,$session->lerValor("USER_RESET_PIN"));


    if(!$flag) {
        $response->redirectTo("index.php");
        exit;
    }

    $codigoUsuario = $session->lerValor("USER_RESET_ID");
    $tokenUsuario = $session->lerValor("USER_RESET_TK");

    $criptoSenha = Criptografia::hash($s1);
    $sqlLogUsuario = "UPDATE usuarios SET password=?,astatus=? WHERE codigo=?";
    $params = array($criptoSenha,'ativo',$codigoUsuario);

    $sqlLogSenha = "INSERT INTO logs_admin (session,data_ocorrencia,ip,usuario,acao) VALUES (?,?,?,?,?)";
    $p = array($session->sid(),Data::agora(),getIp(), $codigoUsuario, "reset");
    $db->executar($sqlLogSenha,$p);

    $flag = $db->executar($sqlLogUsuario,$params);
    if($flag) {
        $response->redirectTo("index.php?resultado=sucesso");
        exit;
    }else{
        $response->redirectTo("index.php?resultado=erro");
        exit;
    }

}
else {
    die("NO");
}