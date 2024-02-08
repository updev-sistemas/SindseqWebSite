<?php


class DBConector {

    private static $link = null;
    private static $flag = false;
    const ATIVO = 'a';
    const INATIVO = 'i';

    private function __construct() {

    }

    public static function criar( $dsn, $usuario, $senha, $params = null) {
        if(self::verificarStatus() == self::INATIVO) {
            if (is_array($params)) {
                try {
                    self::$link = new PDO($dsn, $usuario, $senha, $params);
                }catch(PDOException $e) {
                    self::$link = null;
                    self::$flag = $e->getMessage();
                }
            } else {
                try {
                    self::$link = new PDO($dsn, $usuario, $senha);
                }catch(PDOException $e) {
                    self::$link = null;
                    self::$flag = $e->getMessage();
                }
            }
        }
    }

    public static function verificarStatus() {
        if(self::$link instanceof PDO) {
            return self::ATIVO;
        }
        return self::INATIVO;
    }


    public static function resgatarInstancia() {
        return self::$link;
    }
}