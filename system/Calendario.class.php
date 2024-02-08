<?php

class Calendario
{
    private $meses = array(
        "01"=>"Jan",
        "02"=>"Fev",
        "03"=>"Mar",
        "04"=>"Abr",
        "05"=>"Mai",
        "06"=>"Jun",
        "07"=>"Jul",
        "08"=>"Ago",
        "09"=>"Set",
        "10"=>"Out",
        "11"=>"Nov",
        "12"=>"Dez"
    );

    public $dia;
    public $mes;
    public $ano;
    public $tstamp;
    public $dtmanip;
    public $dsprimdia;
    public $linhafechada;

    public function __construct( $pmes, $pano ) {
        $this->linhafechada = true;
        $this->dia = 1;
        $this->mes = $pmes;
        $this->ano = $pano;
        $this->calcula_tstamp();
        $this->data_manipulavel();
        $this->primeiro_dia_mes();
    }

    public function calcula_tstamp() {
        $this->tstamp = mktime( 0, 0, 0, $this->mes, $this->dia, $this->ano );
    }

    public function data_manipulavel() {
        $this->dtmanip = getdate( $this->tstamp );
    }

    public function primeiro_dia_mes() {
        $this->dsprimdia = $this->dtmanip[ "wday" ];
    }

    public function proximo_dia() {
        $this->dia++;
        $this->calcula_tstamp();
    }

    public function show() {
        $anoAnterior = $this->ano;
        $anoPosterior = $this->ano;
        $mesAnterior = $this->mes - 1;
        $mesPosterior = $this->mes + 1;

        if($mesAnterior == 0) {
            $mesAnterior = 12;
            $anoAnterior = $this->ano - 1;
        }

        if($mesPosterior > 12) {
            $mesPosterior = 1;
            $anoPosterior = $this->ano + 1;
        }

        if($mesAnterior < 10) { $mesAnterior = "0" . $mesAnterior; }
        if($mesPosterior < 10) { $mesPosterior = "0" . $mesPosterior; }

        $link1 = "<a href='#' id='bta' mes='{$mesAnterior}' ano='{$anoAnterior}'><span class=\"glyphicon glyphicon-chevron-left\"></span></a>";
        $link2 = "<a href='#' id='btp' mes='{$mesPosterior}' ano='{$anoPosterior}'><span class=\"glyphicon glyphicon-chevron-right\"></span></a>";

        echo "<table class=\"table table-bordered table-style table-responsive\">\n";
        echo "<tr><th>{$link1}</th><th colspan=\"5\"> ". $this->meses[$this->mes] ." - ". $this->ano . "</th><th>{$link2}</th></tr>";
        echo "<tr class='titulotabela'>\n";
        echo "<td title='Domingo' align='center'>D</td>\n";
        echo "<td title='Segunda-Feira' align='center'>S</td>\n";
        echo "<td title='Terça-Feira' align='center'>T</td>\n";
        echo "<td title='Quarta-Feira' align='center'>Q</td>\n";
        echo "<td title='Quinta-Feira' align='center'>Q</td>\n";
        echo "<td title='Sexta-Feira' align='center'>S</td>\n";
        echo "<td title='Sábado' align='center'>S</td>\n";
        echo "</tr>\n";

        $ccol = 0;
        $casa = 0;
        $hoje = date("d");
        while( checkdate( $this->mes, $this->dia, $this->ano ) ) {
            if ( $this->linhafechada ) {
                echo "<tr>\n";
                $this->linhafechada = false;
            }
            if ( $casa < $this->dsprimdia ) {
                echo "<td> </td>\n";
            } else {
                if($this->dia==$hoje && $this->mes == date("m")) {
                    echo "<td align='center' class='today'>\n";
                } else {
                    echo "<td align='center'>\n";
                }
                echo "<a href='#' class='dia' dia='{$this->dia}' mes='{$this->mes}' ano='{$this->ano}' >" . $this->dia."</a>\n";
                echo "</td>\n";
                $this->proximo_dia();
            }
            $ccol++;
            $ccol = $ccol % 7;
            $casa++;
            if ( ( $casa % 7 ) == 0 ) {
                echo "</tr>\n";
                $this->linhafecha = true;
            }
        }
        while( $ccol != 0 ) {
            $ccol++;
            $ccol = $ccol % 7;
            echo "<td> </td>\n";
        }
        echo "</tr>\n";

        echo "</table>\n";
    }


}
