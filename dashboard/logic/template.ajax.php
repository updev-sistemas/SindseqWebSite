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


    if($acao=='ler'){
        $arquivo = $request->post("arquivo");
        $url = "../../ajax/" . $arquivo;
        $file = file_get_contents($url,true);
        $file = str_replace("<br>",",", $file);
        echo $file;
        die;
    }


    if($acao=='escrever') {

        $url = "../../ajax/" . $request->post("arquivo");
        $telefones = str_replace(",","<br>", $request->post("telefone"));
        $dados = array(
            "logradouro"=>$request->post("logradouro"),
            "telefone"=>$telefone,
            "cep"=>$request->post("cep"),
            "cidade"=>$request->post("cidade"),
            "email"=>$request->post("email"),
            "bairro"=>$request->post("bairro")
        );

        $flag = file_put_contents($url,json_encode($dados));
        echo ($flag>0) ? "ok":"no";
    }


} else {
    die("no-faltou-algo");
}
