<?php

if(!defined("APP_ACCESS")) {
    die("Error");
}

/**
* PHPMailer exception handler
* @package PHPMailer
*/
class phpmailerException extends Exception
{
/**
* Prettify error message output
* @return string
*/
public function errorMessage()
{
$errorMsg = '<strong>' . $this->getMessage() . "</strong><br />\n";
return $errorMsg;
}
}