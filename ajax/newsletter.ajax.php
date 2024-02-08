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

    $emailt = Criptografia::md5free($request->post("email"));

    $query = "INSERT INTO newsletters (nome,email,token,registrado_em,ip,confirmado,ativo) VALUES (?,?,?,?,?,?,?)";
    $params = array(
        $request->post("nome"),
        $request->post("email"),
        $emailt,
        Data::agora(),
        getIp(),
        "nao","sim"
    );

    $flag = $db->executar($query,$params);

    if(!$flag) {
        $query = "SELECT count(*) as 'qtd' FROM newsletters WHERE email=? LIMIT 1";
        $param = array($request->post("email"));
        $flag = $db->executar($query,$param);

        $result = $db->resultado(APP_RESULTADO_OBJETOS)[0];
        $qtd = $result->qtd;

        echo ($qtd>0) ? "dup" : "no";
        exit;
    }


    echo "ok";
    die;

} else {
    die("no");
}
