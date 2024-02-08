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

    if($acao=='nsecao') {

        $sqlSecao = "INSERT INTO secao (nome) VALUES (?)";
        $param = array($request->post("termo"));

        $flag = $db->executar($sqlSecao,$param);
        if(!$flag) {
            die("no");
        }

        echo ($db->ultimoId()>0) ? "ok" :"no";
        die;

    }
    else if($acao=='lista') {

        $sqlList = "SELECT * FROM secao ORDER BY nome ASC";
        $flag = $db->executar($sqlList,$param);
        if(!$flag) {
            echo json_encode(["no"]);
            die;
        }

        echo $db->resultado(APP_RESULTADO_JSON);
        die;
    }
    else if($acao=='lstcat') {
        $sqlList = "SELECT * FROM categorias WHERE secao=? ORDER BY nome ASC";
        $param = array($request->post("secao"));
        $flag = $db->executar($sqlList,$param);
        if(!$flag) {
            echo json_encode(["no"]);
            die;
        }

        echo $db->resultado(APP_RESULTADO_JSON);
        die;
    }
    else {
        die("no");
    }

}
else {
    die('no');
}