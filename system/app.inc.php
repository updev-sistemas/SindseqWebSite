<?php


if(!defined("APP_ACCESS")) {
    die("Error");
}

/**
define("APP_PATH", $_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . "sindseq");
define("APP_SYSTEM", $_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . "sindseq" . DIRECTORY_SEPARATOR . 'system');
define("APP_STORAGE", $_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . "sindseq" . DIRECTORY_SEPARATOR . 'storage');
**/

define("APP_PATH", "/var/www/html/sindseq");
define("APP_SYSTEM", "/var/www/html/sindseq/system");
define("APP_STORAGE", "/var/www/html/sindseq/storage");


# Define Base de Dados
$database = array(

    "host" => "localhost",
    "dbname" => "sindseq",
    "port" => "3306",

    /* Acesso administrativo */
    "useradmin" => "root",
    "passadmin" => "12345",

    /* Acesso nas Páginas */
    "userpub" => "root",
    "passpub" => "12345"

);

# Autoload da Aplicação
function __autoload($nome) {
    $arquivo = APP_SYSTEM . DIRECTORY_SEPARATOR . $nome . ".class.php";
    if(file_exists($arquivo)) {
        require_once($arquivo);
    }
}

function getDsn() {
    global $database;
    return sprintf("mysql:host=%s;dbname=%s;charset=utf8;port=3306", $database["host"], $database["dbname"]);
}

function getUserAdmin() {
    global $database;
    return $database["useradmin"];
}

function getPassAdmin() {
    global $database;
    return $database["passadmin"];

}

function getUserPub() {
    global $database;
    return $database["userpub"];
}

function getPassPub() {
    global $database;
    return $database["passpub"];
}

function getInstanceDb($dsn, $user, $pass, $config = null) {
    try {
        if(is_array($config)) {
            return new PDO($dsn,$user,$pass,$config);
        } else {
            return new PDO($dsn,$user,$pass);
        }
    } catch (PDOException $e) {
        print("Erro na Conexão: " . $e->getMessage());
        return null;
    }

}

function getIp() {
    $ip = '';

    if (getenv('HTTP_CLIENT_IP')) {
        $ip = getenv('HTTP_CLIENT_IP');
    } else if(getenv('HTTP_X_FORWARDED_FOR')) {
        $ip = getenv('HTTP_X_FORWARDED_FOR');
    } else if(getenv('HTTP_X_FORWARDED')) {
        $ip = getenv('HTTP_X_FORWARDED');
    } else if(getenv('HTTP_FORWARDED_FOR')) {
        $ip = getenv('HTTP_FORWARDED_FOR');
    } else if(getenv('HTTP_FORWARDED')) {
        $ip = getenv('HTTP_FORWARDED');
    } else if(getenv('REMOTE_ADDR')) {
        $ip = getenv('REMOTE_ADDR');
    } else {
        $ip = 'N/A';
    }

    return $ip;
}


# -- Definição de formatos de Dados ----------------------------------------
define('APP_RESULTADO_ARRAY',    0);
define('APP_RESULTADO_JSON',     1);
define('APP_RESULTADO_OBJETOS',  2);
define('APP_RESULTADO_BOOLEAN',  3);
define('APP_RESULTADO_NUMERICO', 4);
define('APP_RESULTADO_AFETADOS', 5);
define('APP_RESULTADO_DB_ARRAY', 6);
# --------------------------------------------------------------------------



# -- Definição de Params da Plataforma -------------------------------------
define("APP_SESSION_ID","appsid");
define("APP_TOKEN","apptoken");
define("APP_AUTENTICADO","appauth");
define("APP_DATA_ACESSO","appdate");
define("APP_USER_ID","appuid");
define("APP_USER_TIPO","appusertype");
define("APP_USER_STATUS","appuserstutus");
define("APP_USER_DATA","appuserdata");
define("APP_AUTENTICADO","appauth");
define("APP_AUTENTICADO_ON", 1);
define("APP_AUTENTICADO_OFF", 0);
define("APP_BROWSER","appbr");
define("APP_IP","appip");
# --------------------------------------------------------------------------




# Objetos Globais
$request  = new Request();
$response = new Response();
$session  = new Session("UPSIDE");
$cookie   = new Cookie();
$db       = new DBExecuta();

if(APP_ACCESS=='a') {
    $db->setInstanceDB(getInstanceDb(getDsn(),getUserAdmin(),getPassAdmin(),array(PDO::ATTR_PERSISTENT => TRUE)));
} else {
    $db->setInstanceDB(getInstanceDb(getDsn(),getUserPub(),getPassPub(),array(PDO::ATTR_PERSISTENT => TRUE)));
}

/* -- Configuração Session -- */
$session->adicionarValorSeNaoExiste(APP_SESSION_ID, $session->sid());
$session->adicionarValorSeNaoExiste(APP_TOKEN,Criptografia::gerarToken());
$session->adicionarValorSeNaoExiste(APP_AUTENTICADO, APP_AUTENTICADO_OFF);
$session->adicionarValorSeNaoExiste(APP_DATA_ACESSO, Data::agora());
$session->adicionarValorSeNaoExiste(APP_USER_ID, 0);
$session->adicionarValorSeNaoExiste(APP_IP, getIp());
$session->adicionarValorSeNaoExiste(APP_USER_TIPO, null);
$session->adicionarValorSeNaoExiste(APP_USER_STATUS, null);
$session->adicionarValorSeNaoExiste(APP_USER_DATA, null);
$session->adicionarValorSeNaoExiste(APP_BROWSER, Browser::getCurrentBrowser());
/* -- -------------------- -- */










