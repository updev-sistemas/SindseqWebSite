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


    if($acao=='novo') {
        $SQL = "INSERT INTO publicacao (titulo,subtitulo,conteudo,categoria,autor,publicado_em,atualizado_em,visualizacao,banner,pstatus,previa,tem_anexo,destaque,galeria) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $param = array(
            $request->post("titulo"),
            $request->post("subtitulo"),
            $request->post("conteudo",false),
            $request->post("categoria"),
            $request->post("autor"),
            Data::agora(),
            Data::agora(),
            0,
            $request->post("banner"),
            "publicada",
            $request->post("previa"),
            $request->post("anexo"),
            $request->post("destaque"),
            $request->post("galeria")
        );


        $flag = $db->executar($SQL,$param);
        if(!$flag) {
            die("no");
        }

        echo ($db->ultimoId()>0) ? "ok" : "no";
        die;
    }

    if($acao=='editar') {
        $SQL = "UPDATE publicacao SET titulo=?,subtitulo=?,conteudo=?,previa=?, categoria=?,atualizado_em=?,banner=?,pstatus=?,tem_anexo=?,destaque=?,galeria=? WHERE codigo=?";
        $param = array(
            $request->post("titulo"),
            $request->post("subtitulo"),
            $request->post("conteudo",false),
            $request->post("previa"),
            $request->post("categoria"),
            Data::agora(),
            $request->post("banner"),
            $request->post("status"),
            $request->post("anexo"),
            $request->post("destaque"),
            $request->post("galeria"),
            $request->post("publicacao")
        );

        $flag = $db->executar($SQL,$param);
        if(!$flag) {
            die("no");
        }

        echo ($db->ultimoId()>0) ? "ok" : "no";
        die;
    }

    if($acao=='remove') {
        $SQL = "UPDATE publicacao SET pstatus='removida' WHERE codigo=?";
        $param = array($request->post("publicacao"));

        $flag = $db->executar($SQL,$param);
        if(!$flag) {
            die("no");
        }

        echo ($db->ultimoId()>0) ? "ok" : "no";
        die;
    }

} else {
    die('no');
}