<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Browser
 *
 * @author antoniojose
 */
class Browser {

    const MSIE          =  'ie';
    const FIREFOX       =  'fx';
    const CHROME        =  'gc';
    const SAFARI        =  'sf';
    const OPERA         =  'op';
    const DESCONHECIDO  =  'dc';
    
    private function __construct(){}
    
    public static function getCurrentBrowser() {
        $user_agent = $_SERVER['HTTP_USER_AGENT']; 
        if (preg_match('/MSIE/i', $user_agent)) { 
            return self::MSIE; 
        } 
        elseif (preg_match('/Firefox/i', $user_agent)){
            return self::FIREFOX;
        }
        elseif (preg_match('/Chrome/i', $user_agent)){
            return self::CHROME;
        } 
        elseif (preg_match('/Safari/i', $user_agent)){
            return self::SAFARI;
        } 
        elseif (preg_match('/Opera/i', $user_agent)){
            return self::OPERA;
        }
        else {
            return self::DESCONHECIDO;
        }
    }
    
    public static function getNameBrowser( $browser ) {
        switch( $browser ) {
            case self::CHROME : {
                return "Google Chrome";
            }
            case self::MSIE : {
                return "Internet Explorer";
            }
            case self::FIREFOX : {
                return "Mozilla Firefox";
            }
            case self::OPERA : {
                return "Opera";
            }
            case self::SAFARI : {
                return "Safari";
            }
            default: {
                return "Desconhecido";
            }
        }
    }
    
    
}
