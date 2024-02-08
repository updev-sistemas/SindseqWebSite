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

        $data1 = Data::gregoriano2mysql($request->post("dataInicio"),false);
        $data2 = Data::gregoriano2mysql($request->post("dataFinal"),false);

        $SQL = "INSERT INTO diretoria (nome,foto,cargo,data_inicio,data_final, dstatus, sobre,facebook,twitter,instagram,googleplus,email,posicao) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $params = array(
            $request->post("nome"),
            $request->post("foto"),
            $request->post("cargo"),
            $data1,
            $data2,
            'ativo',
            $request->post("sobre"),
            $request->post("facebook"),
            $request->post("twitter"),
            $request->post("instagram"),
            $request->post("googleplus"),
            $request->post("email"),
            1
        );

        $flag = $db->executar($SQL,$params);
        if(!$flag) {
            die("no");
        }
        echo ($db->ultimoId()>0) ? "ok" : "no";
        die;

    }

    if($acao=='editar') {

        $data1 = Data::gregoriano2mysql($request->post("dataInicio"),false);
        $data2 = Data::gregoriano2mysql($request->post("dataFinal"),false);

        $SQL = "UPDATE diretoria SET nome=?,foto=?,cargo=?,data_inicio=?,data_final=?, dstatus=?, sobre=?,facebook=?,twitter=?,instagram=?,googleplus=?,email=?,posicao=?  WHERE id=?";
        $params = array(
            $request->post("nome"),
            $request->post("foto"),
            $request->post("cargo"),
            $data1,
            $data2,
            $request->post("status"),
            $request->post("sobre"),
            $request->post("facebook"),
            $request->post("twitter"),
            $request->post("instagram"),
            $request->post("googleplus"),
            $request->post("email"),
            $request->post("posicao"),
            $request->post("codigo")
        );

        $flag = $db->executar($SQL,$params);
        if(!$flag) {
            die("no");
        }
        echo ($db->resultado(APP_RESULTADO_AFETADOS)>0) ? "ok" : "no";
        die;

    }

    if($acao=='remove') {

    }

    if($acao=='posicao') {

    }

} else {
    die('no');
}

