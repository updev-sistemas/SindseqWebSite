<?php
if(!defined("APP_ACCESS")) {
    die("Error");
}


class Request
{
    const GET     = INPUT_GET;
    const POST    = INPUT_POST;
    const REQUEST = INPUT_REQUEST;
    const SESSION = INPUT_SESSION;
    const COOKIE  = INPUT_COOKIE;


    public function __construct() {

    }

    public function purge() {
        if (isset($_SERVER['HTTP_ORIGIN'])) {
            die('Origem Invalida');
        }
    }


    public function getParamFilter($nome, $tipo , $filtro)
    {
        return filter_input($tipo, $nome,$filtro);
    }

    public function get($nome, $seguro = true) {
        if($this->isGet($nome)) {
            if($seguro) {
                return $this->limpar($_GET[$nome]);
            }
            return $_GET[$nome];
        }
        return null;
    }

    public function isGet($nome){
        return isset($_GET[$nome]);
    }

    public function rmGet($nome) {
        unset($_GET[$nome]);
    }

    public function rmPost($nome) {
        unset($_POST[$nome]);
    }

    public function post($nome, $seguro = true) {
        if($this->isPost($nome)) {
            if($seguro) {
                return $this->limpar($_POST[$nome]);
            }
            return $_POST[$nome];
        }
        return null;
    }

    public function isPost($nome){
        return isset($_POST[$nome]);
    }

    public function isFile($nome) {
        return isset($_FILES[$nome]);
    }

    public function limpar($str) {
        $tmp = addslashes($str);
        $str = htmlspecialchars($tmp);
        return $str;
    }

    public function isServerPost() {
        return ("POST" == $_SERVER["REQUEST_METHOD"]);
    }

    public function isServerGet() {
        return ("GET" == $_SERVER["REQUEST_METHOD"]);
    }

}