<?php

define("APP_ACCESS", "p");
require_once("../system/app.inc.php");


$t1 = $session->lerValor(APP_TOKEN);
$t2 = $request->post("token");

$flag = Criptografia::comparaHash($t1,$t2);

if($flag) {

    $acao = $request->post("acao");

    if($acao=='list') {

        $mes = $request->post("mes");
        $ano = $request->post("ano");

        $cal = new Calendario($mes, $ano);
        $cal->show();
        exit;
    }

    if($acao=='feriado') {

        $mes = $request->post("mes");
        $ano = $request->post("ano");


        $sql = "SELECT dia, titulo,ano, ocorrencia FROM feriados WHERE mes=? ORDER BY dia ASC";
        $param = array($mes);
        $db->executar($sql,$param);
        $feriados = $db->resultado(APP_RESULTADO_OBJETOS);

        $lista = "";
        foreach($feriados as $l) {
            $linha  = "";

            if($l->ano == $ano || $l->ocorrencia=='r') {
                $linha = "<li><b>{$l->dia}</b> - {$l->titulo}</li>";
            }
            else {
                $linha = "";
            }
            $lista .= $linha;
        }

        echo $lista;
        exit;
    }

} else {
    die("no");
}