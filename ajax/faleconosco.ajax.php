<?php

define("APP_ACCESS", "p");
require_once("../system/app.inc.php");


$t1 = $session->lerValor(APP_TOKEN);
$t2 = $request->post("token");

$flag = Criptografia::comparaHash($t1,$t2);

if($flag) {

    $nome = $request->post("nome");
    $email = $request->post("email");
    $temail = Criptografia::md5free($email);

    $sql1 = "INSERT INTO newsletters (nome,email,token,registrado_em,ip,confirmado,ativo) VALUES (?,?,?,?,?,?,?)";
    $param1 = array($nome,$email,$temail,Data::agora(),getIp(),"nao","sim");
    $db->executar($sql1,$param1);

    $sqlFaleConosco = "INSERT INTO faleconosco (nome,assunto,contatos,conteudo,referente_a,enviado_em,ip) VALUES (?,?,?,?,?,?,?)";
    $paramFaleConosco = array(
        $request->post("nome"),
        $request->post("assunto"),
        $request->post("email"),
        $request->post("conteudo"),
        $request->post("motivo"),
        Data::agora(),
        getIp()
    );

    $flag = $db->executar($sqlFaleConosco,$paramFaleConosco);
    echo ($flag) ? "ok" : "no";
    die;
} else {
    echo 'no';
    die;
}