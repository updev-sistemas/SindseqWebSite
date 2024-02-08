<?php
/**
 * Created by PhpStorm.
 * User: antoniojose
 * Date: 12/01/17
 * Time: 23:54
 */

define("APP_ACCESS", "a");
require_once("../../system/app.inc.php");

$t1 = $request->post("token");
$t2 = $session->lerValor(APP_TOKEN);

$flag = true;
$flag &= Criptografia::comparaHash($t1,$t2);
$flag &= ($session->lerValor(APP_AUTENTICADO)==APP_AUTENTICADO_ON);


if($flag) {

    $acao = $request->post("acao");


    if($acao=='vemail') {

        $sql = "SELECT count(codigo) as 'qtd' FROM usuarios WHERE email=?";
        $param = array($request->post("email"));

        $db->executar($sql,$param);
        $registros = $db->resultado(APP_RESULTADO_OBJETOS)[0];

        print(($registros->qtd==0)? "ok":"no");
        die;
    }

    if($acao=='vuser') {

        $sql = "SELECT count(codigo) as 'qtd' FROM usuarios WHERE login=?";
        $param = array($request->post("username"));

        $db->executar($sql,$param);
        $registros = $db->resultado(APP_RESULTADO_OBJETOS)[0];

        print(($registros->qtd==0)? "ok":"no");
        die;
    }

    if($acao=='novo') {
        $tipo = ($request->post("tipo")=='a') ? "administrador" : "editor";
        $login = strtolower($request->post("login"));
        $email = strtolower($request->post("email"));

        $nome  = $request->post("nome");
        $sobrenome  = $request->post("sobrenome");
        $email = $request->post("email");
        $senha = Criptografia::hash('Sind1234');
        $token = Criptografia::md5free($email);

        $sql = "INSERT INTO usuarios (nome,sobrenome,foto,login,email,password,token,astatus,tipo) VALUES (?,?,?,?,?,?,?,?,?)";
        $param = array($nome,$sobrenome,"default.png",$login,$email,$senha,$token,"novo",$tipo);
        $db->executar($sql,$param);
        print(($db->ultimoId()>0)? "ok":"no");
        die;
    }

    if($acao=='edit') {
        $sqlQuery = "UPDATE usuarios SET astatus=?, tipo=? WHERE codigo=?";
        $params = array($request->post("status"),$request->post("tipo"),$request->post("codigo"));
        $db->executar($sqlQuery,$params);
        $afetados = $db->resultado(APP_RESULTADO_AFETADOS);
        echo ($afetados>0) ? "ok" : "no";
        die;
    }

    if($acao=='rm') {

        $sqlDelete = "UPDATE usuarios SET login=?,email=?,password=?,token=?,ustatus=? WHERE codigo=?";
        $param = array("--","--","--","--","removido",$request->post("admin"));

        $flag = $db->executar($sqlDelete,$param);
        echo ($flag) ? "ok":"no";
        die;
    }


    if($acao=='upps'){


        $sqlUpDados = "UPDATE usuarios SET nome=?,sobrenome=? WHERE codigo=?";
        $param = array($request->post("nome"),$request->post("sobrenome"),$request->post("id"));

        $flag = $db->executar($sqlUpDados,$param);

        echo ($flag) ? "ok" : "no";
        die;

    }


    if($acao=='uppw') {

        $senha = $request->post("senha");

        $sqlUpDados = "UPDATE usuarios SET password=? WHERE codigo=?";
        $param = array(Criptografia::hash($senha),$request->post("id"));

        $flag = $db->executar($sqlUpDados,$param);

        if($flag) {
            $sqlLog = "INSERT INTO logs_admin (session,data_ocorrencia,ip,usuario,acao) VALUES (?,?,?,?,?)";
            $p = array($session->sid(),Data::agora(),getIp(), $codigoUsuario, "reset");
            $db->executar($sqlLog,$p);
        }

        echo ($flag) ? "ok" : "no";
        die;


    }
} else {
    die("no");
}
