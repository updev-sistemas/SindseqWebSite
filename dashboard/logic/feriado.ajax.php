<?php

define("APP_ACCESS", "a");
require_once("../../system/app.inc.php");

$t1 = $request->post("token");
$t2 = $session->lerValor(APP_TOKEN);

$flag = true;
$flag &= Criptografia::comparaHash($t1,$t2);
$flag &= ($session->lerValor(APP_AUTENTICADO)==APP_AUTENTICADO_ON);


if($flag) {

    $acao = $request->post('acao');

    if($acao=='novo') {

        $sql = "INSERT INTO feriados (titulo,dia,mes,ano,ocorrencia) VALUES (?,?,?,?,?)";
        $repete = $request->post("repete");
        $titulo = $request->post("titulo");
        $dia = $request->post("dia");
        $mes = $request->post("mes");
        $ano = $request->post("ano");
        $ocorrencia = ($request->post("repete")=='s') ? "r" : "f";

        $params = array($titulo,$dia,$mes,$ano,$ocorrencia);

        $flag = $db->executar($sql,$params);

        echo ($flag) ? "ok" : "no";
        die;
    }

    if($acao=='rm'){

        $sql = "DELETE FROM feriados WHERE id=?";
        $param = array($request->post("item"));

        $flag = $db->executar($sql,$param);

        echo ($flag) ? "ok" : "no";
        die;
    }

    if($acao=='lista') {
        $sqlList = "SELECT * FROM feriados ORDER BY ano,mes,dia ASC";
        $db->executar($sqlList,array(1,$usuario->codigo));
        $lista = $db->resultado(APP_RESULTADO_JSON);
        echo $lista;
        die;
    }


} else {
    die('no');
}

