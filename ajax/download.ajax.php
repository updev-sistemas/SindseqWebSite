<?php
/**
 * Created by PhpStorm.
 * User: antoniojose
 * Date: 16/01/17
 * Time: 13:25
 */

define("APP_ACCESS", "p");
require_once("../system/app.inc.php");

$t1 = $session->lerValor(APP_TOKEN);
$t2 = $request->post("token");

$flag = Criptografia::comparaHash($t1,$t2);

if($flag) {


    $arquivo = $request->post("arquivo");


    $sql = "SELECT titulo,item,tipo FROM documentos WHERE codigo=? AND dstatus=? LIMIT 1";
    $params = array($arquivo, 'ativo');

    $flag = $db->executar($sql,$params);
    if(!$flag) {
        die("no");
    }


    $r = $db->resultado(APP_RESULTADO_OBJETOS)[0];
    $path = APP_STORAGE . DIRECTORY_SEPARATOR . "anexos" . DIRECTORY_SEPARATOR;

    if($r->tipo=='audio') {
        $path .= "audios";
    }
    else if($r->tipo=='doc') {
        $path .= "documentos";
    }
    else if($r->titpo=='arquivo') {
        $path .= "arquivos";
    }
    else {
        die('no');
    }


    $response->download($r->titulo,$r->item,$path);


} else {
    die("no");
}
