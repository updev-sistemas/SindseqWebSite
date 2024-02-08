<?php


class DBExecuta {

    private $conector;
    private $query;
    private $params;
    private $flag;
    private $msgErro;
    private $msgSucesso;
    private $statement;
    private $ultimoIdInserido;
    private $proibidas;

    public function __construct(){
        $this->conector = null;
        $this->query = '';
        $this->params = null;
        $this->flag = true;
        $this->statement = null;
        $this->msgErro = '';
        $this->ultimoIdInserido = -1;
        $this->msgSucesso = '';
        $this->proibidas = array('show','drop','tables','describe','use','alter','add','create');
    }

    public function setInstanceDB(PDO $obj)
    {
        $this->conector = $obj;
    }


    /**
     * @param $sql
     * @param null $params
     * @param bool $iniciarTransacao
     * @deprecated
     */
    public function __invoke($sql, $params = null, $iniciarTransacao = true)
    {
        $this->executar($sql,$params,$iniciarTransacao);
    }


    public function resultado($tipo = APP_RESULTADO_ARRAY) {
        if($tipo == APP_RESULTADO_ARRAY) {
            return $this->statement->fetchALL(PDO::FETCH_ASSOC);
        }
        else if($tipo == APP_RESULTADO_OBJETOS) {
            return $this->statement->fetchALL(PDO::FETCH_OBJ);
        }
        else if($tipo == APP_RESULTADO_NUMERICO) {
            return $this->statement->fetchALL(PDO::FETCH_NUM);
        }
        else if($tipo == APP_RESULTADO_JSON) {
            return json_encode($this->statement->fetchALL(PDO::FETCH_ASSOC));
        }
        else if($tipo == APP_RESULTADO_BOOLEAN) {
            $qtd = $this->statement->rowCount() > 0;
            return $qtd;
        }
        else if($tipo == APP_RESULTADO_AFETADOS) {
            return $this->statement->rowCount();
        }
        else if($tipo== APP_RESULTADO_DB_ARRAY) {
            return new ListaObjetos($this->statement->fetchALL(PDO::FETCH_OBJ));
        }
    }


    public function qtdRegistros() {
        return $this->statement->rowCount();
    }

    public function ultimoId() {
        return $this->ultimoIdInserido;
    }


    public function definirQuery($sql) {
        if($this->validarQuery($sql)) {
            $this->query = $sql;
            $this->flag = true;
        }
        return $this->flag;
    }

    public function definirParametros($params) {
        if($this->validarParams($params)) {
            $this->params = $params;
            $this->flag = true;
        }
        return $this->flag;
    }

    public function executar($sql = null, $params = null, $iniciarTransacao = true) {
        if(is_string($sql)) {
            $this->definirQuery($sql);
        }
        if(is_array($params)) {
            $this->definirParametros($params);
        }

        if($this->flag) {
            if($iniciarTransacao) {
                $this->iniciarTransacao();
            }

            try {
                $this->statement = $this->conector->prepare($this->query);
                $processou = true;
                if(is_array($this->params)) {
                    $processou = $this->statement->execute($this->params);
                } else {
                    $processou = $this->statement->execute();
                }
                ($processou) ? $this->ultimoIdInserido = $this->conector->lastInsertId() : $this->ultimoIdInserido = 0;
                ($processou) ? $this->commitTransacao() : $this->rollbackTransacao();
                return $processou;
            } catch(PDOException $e) {
                return false;
            }
        }
        else {
            return false;
        }
    }


    public function validarQuery($sql) {
        $queryQuebrada = explode(' ', $sql);
        foreach($queryQuebrada as $item) {
            if(in_array($item, $this->proibidas)) {
                $this->flag = false;
                $this->msgErro = 'Query Proibida!';
                return false;
            }
        }
        return true;
    }

    public function validarParams($params) {
        $val = is_array($params);
        $val &= (count($params)>0);
        return $val;
    }


    public function iniciarTransacao() {
        try {
            $this->conector->beginTransaction();
            $this->flag = true;
        }catch(PDOException $e) {
            $this->msgErro = $e->getMessage();
            $this->flag = false;
        }
    }

    public function commitTransacao()  {
        try {
            $this->conector->commit();
            $this->flag = true;
        }catch(PDOException $e) {
            $this->msgErro = $e->getMessage();
            $this->flag = false;
        }
    }

    public function rollbackTransacao() {
        try {
            $this->conector->rollback();
            $this->flag = true;
        }catch(PDOException $e) {
            $this->msgErro = $e->getMessage();
            $this->flag = false;
        }
    }

    public function debug() {
        return $this->msgErro;
    }
}