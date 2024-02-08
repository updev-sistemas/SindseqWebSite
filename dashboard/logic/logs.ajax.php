<?php

define("APP_ACCESS", "a");
require_once("../../system/app.inc.php");

$t1 = $request->post("token");
$t2 = $session->lerValor(APP_TOKEN);

$flag = true;
$flag &= Criptografia::comparaHash($t1,$t2);
$flag &= ($session->lerValor(APP_AUTENTICADO)==APP_AUTENTICADO_ON);



if($flag) {

    $acao = $request->post("acao");

    if($acao == 'log') {

        $sqlQuery = "SELECT * FROM logs_admin WHERE usuario=? ORDER BY data_ocorrencia DESC LIMIT 50";
        $param = array($request->post("admin"));

        $db->executar($sqlQuery,$param);
        echo $db->resultado(APP_RESULTADO_JSON);
        die;
    }

    else{
        die("no");
    }

} else {
    die("no");
}


