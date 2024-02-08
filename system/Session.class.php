<?php

if(!defined("APP_ACCESS")) {
    die("Error");
}


class Session
{
    private $sid;
    private $data;

    public function __construct($nome='') {
        $this->sid = null;
        $this->data = null;
        $flag = $this->iniciar($nome);
    }



    public function iniciar($nome = 'UPSIDE') {
        @ini_set('session.gc_maxlifetime', (12 * 3600));
        @ini_set('session.cookie_lifetime', (12 * 3600));
        if(!empty($nome) || is_null($nome)) {
            session_name($nome);
        }
        $flag = true;
        session_start();
        if(session_status()==PHP_SESSION_NONE) {
            $flag &= $this->gerarNovoSID();
        }
        return $flag;
    }

    public function gerarNovoSID() {
        return session_regenerate_id();
    }

    public function adicionarValorSeNaoExiste($nome, $valor) {
        if(session_status()==PHP_SESSION_ACTIVE) {
            if($this->existeValor($nome)) {
                return false;
            }
            return $this->adicionarValor($nome,$valor);
        }
        return false;
    }

    public function adicionarValor($nome, $valor) {
        if(session_status()==PHP_SESSION_ACTIVE) {
            $_SESSION[$nome] = $valor;
            $this->data = $_SESSION;
            return isset($_SESSION[$nome]);
        }
        return false;
    }

    public function lerValor($nome) {
        if($this->existeValor($nome)) {
            return $_SESSION[$nome];
        }
        return false;
    }

    public function existeValor($nome) {
        return isset($_SESSION[$nome]);
    }

    public function apagarValor($nome) {
        if($this->existeValor($nome)) {
            $_SESSION[$nome] = 0;
            unset($_SESSION[$nome]);
            return !(isset($_SESSION[$nome]));
        }
        return false;
    }

    public function fechar() {
        session_destroy();
        unset($this->data);
        unset($this->sid);
    }

    public function sid() {
        return session_id();
    }
}