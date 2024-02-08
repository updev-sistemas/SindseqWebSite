<?php

if(!defined("APP_ACCESS")) {
    die("Error");
}


class Data
{

    public static function cal($data) {
        $data = explode("-",$data);
        return sprintf("%s/%s/%s",$data[2],$data[1],$data[0]);
    }


    public static function getDataMySQLFormat($data){
        $data = explode(' ',$data)[0];
        $novaData = explode('-',$data);
        return sprintf("%s/%s/%s", $novaData[2],$novaData[1],$novaData[0]);
    }

    public static function getDataFuture($dias) {
        $agora = self::agora();
        $molde = new DateTime($agora);
        $molde->add(new DateInterval('P'. $dias .'D'));
        return $molde->format("Y-m-d H:i:s");
    }


    public static function getSimpleData($data){
        $tmp = explode('-',$data);
        return sprintf("%s/%s/%s", $tmp[2], $tmp[1],$tmp[0]);
    }

    public static function getHoraMySQLFormat($data){
        $hora = explode(' ',$data)[1];
        return $hora;
    }

    public static function getDataDefault(){
        return "0000-00-00 00:00:00";
    }

    public static function agora(){
        return date('Y-m-d H:i:s');
    }

    public static function getMes( $i ) {
        switch ($i) {
            case '00': {
                return "Mês";
            }
            case '01': {
                return "Janeiro";
            }
            case '02': {
                return "Fevereiro";
            }
            case '03': {
                return "Março";
            }
            case '04': {
                return "Abril";
            }
            case '05': {
                return "Maio";
            }
            case '06': {
                return "Junho";
            }
            case '07': {
                return "Julho";
            }
            case '08': {
                return "Agosto";
            }
            case '09': {
                return "Setembro";
            }
            case '10': {
                return "Outubro";
            }
            case '11': {
                return "Novembro";
            }
            case '12': {
                return "Dezembro";
            }
        }
    }

    public static function mysql2gregoriano( $data, $temHora = true){
        if($temHora) {
            $tmp = explode(" ", $data);
            $dt = explode("-",$tmp[0]);
            $hr = $tmp[1];
            $strdata = '' . $dt[2] . " de " . self::getMes($dt[1]) . " de " . $dt[0] . ", às " . $hr;
            return $strdata;
        } else {
            $dt = explode("-",$data);
            $strdata = '' . $dt[2] . " de " . self::getMes($dt[1]) . " de " . $dt[0];
            return $strdata;
        }
    }

    public static function gregoriano2mysql( $data, $temHora = false, $hora = null) {
        if($temHora) {
            $dt = explode('/', $data);
            $tmpData = '' . $dt[2] . '-' . $dt[1] . '-' . $dt[0];
            if(is_string($hora)) {
                $tmpData .= ' ' . $hora;
            } else {
                $tmpData .= ' 00:00:00';
            }
            return $tmpData;
        } else {
            $dt = explode('/', $data);
            $tmpData = '' . $dt[2] . '-' . $dt[1] . '-' . $dt[0];
            return $tmpData;
        }
    }
}