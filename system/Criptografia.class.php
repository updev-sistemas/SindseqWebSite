<?php

if(!defined("APP_ACCESS")) {
    die("Error");
}


class Criptografia {

    private static $listaCaracteres = array(
        'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z',
        'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z',
        '1','2','3','4','5','6','7','8','9','0','$','#','@','_'
    );

    private static $listaCaracteres2 = array(
        'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z',
        'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'
    );

    public function __construct() {

    }

    public static function gerarSenha($tamanho = 10) {
        $senha = '';
        $qtd   = count(self::$listaCaracteres) - 1;
        for($i = 0; $i < $tamanho; $i++) {
            $indice = rand(0, $qtd);
            $senha .= self::$listaCaracteres[$indice];
        }
        return $senha;
    }

    public static function gerarNome($tamanho = 10) {
        $senha = '';
        $qtd   = count(self::$listaCaracteres2) - 1;
        for($i = 0; $i < $tamanho; $i++) {
            $indice = rand(0, $qtd);
            $senha .= self::$listaCaracteres2[$indice];
        }
        return $senha;
    }

    public static function md5free($texto){
        return md5($texto);
    }

    public static function hash( $textoClaro ) {
        $strTxtCrypt = password_hash($textoClaro, PASSWORD_BCRYPT);
        return $strTxtCrypt;
    }

    public static function verify($txtClaro, $hashEncontrado) {
        return password_verify($txtClaro,$hashEncontrado);
    }

    public static function realPersonHash($value) {
        $hash = 5381;
        $value = strtoupper($value);
        for($i = 0; $i < strlen($value); $i++) {
            $hash = (self::leftShift32($hash, 5) + $hash) + ord(substr($value, $i));
        }
        return $hash;
    }

    public static function leftShift32($number, $steps) {
        // convert to binary (string)
        $binary = decbin($number);
        // left-pad with 0's if necessary
        $binary = str_pad($binary, 32, "0", STR_PAD_LEFT);
        // left shift manually
        $binary = $binary.str_repeat("0", $steps);
        // get the last 32 bits
        $binary = substr($binary, strlen($binary) - 32);
        // if it's a positive number return it
        // otherwise return the 2's complement
        return ($binary{0} == "0" ? bindec($binary) :
            -(pow(2, 31) - bindec(substr($binary, 1))));
    }

    public static function realPersonCompare($rpDefault, $rpDefaultHash) {
        $hashCalculado = self::realPersonHash($rpDefault);
        return ($hashCalculado==$rpDefaultHash);
    }

    public static function gerarToken() {
        $dados = uniqid(time());
        $token = md5($dados);
        return strtolower($token);
    }

    public static function comparaHash($hash1, $hash2) {
        if(strlen($hash1) != strlen($hash2)) {
            return false;
        }
        else {
            $res = $hash1 ^ $hash2;
            $ret = 0;
            for($i = strlen($res) - 1; $i >= 0; $i--)
            {
                $ret |= ord($res[$i]);
            }
            return !$ret;
        }
    }

    public static function calculaHash($item) {
        return sha1($item,false);
    }

    public static function cifrar($chave,$semente) {
        $dados = $chave . $semente;
        return sha1($dados,false);
    }



}