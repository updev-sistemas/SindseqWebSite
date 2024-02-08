<?php
/**
 * Created by PhpStorm.
 * User: antoniojose
 * Date: 23/01/17
 * Time: 07:26
 */

class UploadImagem extends Upload
{
    private $mimeFile = array(
        'jpg' => 'image/jpeg',
        'png' => 'image/png',
        'gif' => 'image/gif',
    );

    private $extensao;
    private $nome;
    private $nomeArquivo;

    public function __construct($nome, $c=1 , $a='', $b='')
    {
        parent::__construct($a, $b, $c);
        $this->nomeArquivo = $nome;
    }

    public function transferir()
    {
        $this->nome = $_FILES[$this->nomeArquivo]['name'];
        $this->extensao = end(explode(".",$this->nome));

        if($this->tnome==self::NOME_HASH) {
            $this->nome = sha1_file($_FILES[$this->nomeArquivo]['tmp_file']);
            $this->nome .= '.' . $this->extensao;
        } else if($this->tnome==self::NOME_RAND) {
            $this->nome = Criptografia::gerarSenha();
            $this->nome .= '.' . $this->extensao;
        } else {

        }

    }



    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getUppou()
    {
        return $this->uppou;
    }

    /**
     * @param string $uppou
     */
    public function setUppou($uppou)
    {
        $this->uppou = $uppou;
    }


    /**
     * @param int $tnome
     */
    public function setTnome($tnome)
    {
        $this->tnome = $tnome;
    }




}