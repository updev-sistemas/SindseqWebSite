<?php
/**
 * Created by PhpStorm.
 * User: antoniojose
 * Date: 03/12/16
 * Time: 10:55
 */

define('ACCESS', 'p');

require_once('../system/application.php');


$latitude  = $request->post("lat");
$longitude = $request->post("log");


$session->adicionarValor(GEO_LOC_LAT, $latitude);
$session->adicionarValor(GEO_LOC_LON, $longitude);

$query = <<<QUERY_CITY
SELECT DISTINCT id,nome,
(6371 * acos(
 cos( radians(?) )
 * cos( radians( latitude ) )
 * cos( radians( longitude ) - radians(?) )
 + sin( radians(?) )
 * sin( radians( latitude ) )
 )
) AS distancia
FROM cidades
HAVING distancia < 10
ORDER BY distancia ASC;
QUERY_CITY;

$params = array($latitude,$longitude,$latitude);

$db->executar($query,$params);
$resultado = $db->resultado(APP_RESULTADO_JSON);

$session->adicionarValor("cidade",json_decode($resultado,true)['id']);

echo $resultado;
exit;

