<?php
/**
 * Created by PhpStorm.
 * User: antoniojose
 * Date: 12/01/17
 * Time: 23:54
 */

define("APP_ACCESS", "a");
require_once("../../system/app.inc.php");

$t1 = $request->post("token");
$t2 = $session->lerValor(APP_TOKEN);

$flag = true;
$flag &= Criptografia::comparaHash($t1,$t2);
$flag &= ($session->lerValor(APP_AUTENTICADO)==APP_AUTENTICADO_ON);


if($flag) {

    $acao = $request->post("acao");


    if($acao=='novo') {

        $ref = $request->post("relativo");

        if($ref=='d') {
            $ref = "doc";
        }
        if($ref=='a') {
            $ref = "audio";
        }
        if($ref=='f') {
            $ref = "arquivo";
        }


        $sqlInsert = "INSERT INTO documentos (titulo,item,descricao,tipo,data_publicacao,publicado_por,dstatus) VALUES (?,?,?,?,?,?,?)";
        $param = array($request->post("titulo"),$request->post("arquivo"),$request->post("descricao"),$ref,Data::agora(),$request->post("autor"),'ativo');

        $flag = $db->executar($sqlInsert,$param);
        if(!$flag) {
            die("no");
        }

        echo ($db->ultimoId()>0) ? "ok" : "no";
        die;
    }


    if($acao=='alt') {

        $sqlChange = "UPDATE documentos SET dstatus=? WHERE codigo=?";
        $params = array($request->post("valor"),$request->post("documento"));

        $flag = $db->executar($sqlChange,$params);

        if(!$flag) {
            die('no');
        }

        echo ($db->resultado(APP_RESULTADO_AFETADOS)>0) ? "ok" : "no";
        die;

    }


    if($acao=='update') {


        $sqlUpdate = "UPDATE documentos SET titulo=?,item=?,descricao=? WHERE codigo=?";
        $params = array($request->post("titulo"),$request->post("arquivo"),$request->post("descricao"),$request->post("anexo"));

        $flag = $db->executar($sqlUpdate,$params);
        if(!$flag) {
            die("no");
        }

        echo ($db->resultado(APP_RESULTADO_AFETADOS)>0) ? "ok" : "no";
        die;

    }


    if($acao=='anexo') {

        $EXT_ARQUIVOS = array("rar", "zip");
        $EXT_AUDIOS = array("mp3", "wma", "wav");
        $EXT_DOC = array("doc", "docx", "xls", "xlsx", "ppt", "pptx", "pdf", "txt", "rtf", "odt", "ods", "odp");


        $acao = $request->post("acao");
        $referente = $request->post("relativo");
        $extensao = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);

        $resposta = array(
            "nome" => "-",
            "resposta" => "no"
        );
        $prefixo = "";
        $path = "";
        if ($referente == 'd') {

            if (!in_array($extensao, $EXT_DOC)) {
                print(json_encode($resposta));
                die;
            }

            $path = "../../storage/anexos/documentos/";
            $prefixo = "documento_";
        }

        if ($referente == 'a') {
            if (!in_array($extensao, $EXT_AUDIOS)) {
                print(json_encode($resposta));
                die;
            }

            $path = "../../storage/anexos/audios/";
            $prefixo = "audio_";
        }

        if ($referente == 'f') {
            if (!in_array($extensao, $EXT_ARQUIVOS)) {
                print(json_encode($resposta));
                die;
            }
            $path = "../../storage/anexos/arquivos/";
            $prefixo = "arquivo_";
        }

        $hashFile = sha1_file($_FILES['arquivo']['tmp_name']);

        $nome = uniqid(rand(), true) . $hashFile . Data::agora();
        $nome = sha1($nome);
        $nome = $prefixo . $nome . "." . $extensao;

        $resposta['nome'] = $nome;
        $path .= $nome;

        $flag = move_uploaded_file($_FILES['arquivo']['tmp_name'], $path);

        $resposta['resposta'] = ($flag) ? "ok" : "no";

        print(json_encode($resposta));
        die;
    }

} else {
    die("no");
}
