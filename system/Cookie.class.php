<?php

if(!defined("APP_ACCESS")) {
    die("Error");
}


class Cookie
{
    public static function adicionar($nome,$valor){
        return setcookie($nome, $valor , time() + (24*60*60), "/");
    }
    
    public static function existe($nome) {
        return isset($_COOKIE[$nome]);
    }
    
    public static function remover($nome) {
        unset($_COOKIE[$nome]);
    }
    
    public static function ler($nome) {
        if(self::existe($nome)) {
            return $_COOKIE[$nome];
        }
        return false;
    }
}