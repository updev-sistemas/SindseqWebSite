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

    if($acao=='novo') {

        $data = Data::gregoriano2mysql($request->post("calendario"),false);

        $sql = "INSERT INTO agenda (titulo,conteudo,data_evento,registrado_em,registrado_por,astatus) VALUES (?,?,?,?,?,?)";
        $param = array($request->post("titulo"),$request->post("conteudo",false),$data,Data::agora(),$request->post("autor"),'ativo');

        $flag = $db->executar($sql,$param);
        if(!$flag) {
            die('no');
        }

        echo ($db->ultimoId()>0) ? "ok" : "no";
        die;
    }

    if($acao=='editar') {

        $data = Data::gregoriano2mysql($request->post("calendario"),false);

        $sql = "UPDATE agenda SET titulo=?,conteudo=?,astatus=?,data_evento=? WHERE codigo=?";
        $param = array($request->post("titulo"),$request->post("conteudo",false),$request->post("status"),$data,$request->post("evento"));

        $flag = $db->executar($sql,$param);
        if(!$flag) {
            die('no');
        }

        echo ($db->resultado(APP_RESULTADO_AFETADOS)>0) ? "ok" : "no";
        die;
    }

    if($acao=='remove') {
        $SQL = "DELETE FROM agenda WHERE codigo=?";
        $params = array($request->post("evento"));
        $flag = $db->executar($SQL,$params);
        if(!$flag) {
            die("no");
        }

        echo ($db->resultado(APP_RESULTADO_AFETADOS)>0) ? "ok" : "no";
        die;
    }

} else {
    die("no");
}


