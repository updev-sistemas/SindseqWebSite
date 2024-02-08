<?php
/**
 * Created by PhpStorm.
 * User: Antonio José
 * Date: 31/08/2016
 * Time: 09:31
 */


define("APP_ACCESS", "p");
require_once('../system/app.inc.php');



unset($_SESSION);
unset($_GET);
unset($_POST);
unset($_FILES);
unset($_ENV);

$session->gerarNovoSID();
$session->fechar();
$response->redirectTo('../l/index.php');
exit;