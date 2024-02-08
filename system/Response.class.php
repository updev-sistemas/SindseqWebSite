<?php
if(!defined("APP_ACCESS")) {
    die("Error");
}



class Response
{
    public function redirectTo( $url )
    {
        $path = ('Location: ' . $url);
        header($path, true);
        exit();
    }


    public function download( $nome, $arquivo, $path )
    {
        @set_time_limit(0);
        $pathAbs = $path . DIRECTORY_SEPARATOR . $arquivo;

        if(!file_exists($pathAbs)) {
            return false;
        }


        header("HTTP/1.1 200 OK");
        header("Pragma: public");
        header("Expires: 0");
        header('Content-Description: File Transfer');
        header('Content-Disposition: attachment; filename="'.$nome.'"');
        header('Content-Type: application/octet-stream');
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: ' . filesize($pathAbs));
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Expires: 0');


        ob_end_clean();
        flush();
        readfile($pathAbs);

    }

}