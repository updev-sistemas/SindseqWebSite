<?php

define("APP_ACCESS", "a");
require_once("../../system/app.inc.php");

$t1 = $request->post("token");
$t2 = $session->lerValor(APP_TOKEN);

$flag = true;
$flag &= Criptografia::comparaHash($t1,$t2);
$flag &= ($session->lerValor(APP_AUTENTICADO)==APP_AUTENTICADO_ON);


if($flag) {
    $resposta = array(
        'resposta'=>'',
        'nome'=>''
    );
    $acao = $request->post('acao');

    if($acao=='sb1') {
        $path = '../../storage/banners/';

        $nome = 'banner_' . sha1_file($_FILES['banner']['tmp_name']);
        $ext  = pathinfo($_FILES['banner']['name'], PATHINFO_EXTENSION);
        $nome .= '.' . $ext;

        $caminho = $path . $nome;

        $flag = move_uploaded_file($_FILES['banner']['tmp_name'], $caminho);

        $dados['nome'] = $nome;
        $dados['resposta'] = ($flag) ? "ok":"no";
        print(json_encode($dados));
        die;
    }

    if($acao=='sb2') {
        $path = '../../storage/thumbnails/';

        $nome = 'thumbnail_' . sha1_file($_FILES['banner']['tmp_name']);
        $ext  = pathinfo($_FILES['banner']['name'], PATHINFO_EXTENSION);
        $nome .= '.' . $ext;

        $caminho = $path . $nome;

        $flag = move_uploaded_file($_FILES['banner']['tmp_name'], $caminho);

        $dados['nome'] = $nome;
        $dados['resposta'] = ($flag) ? "ok":"no";
        print(json_encode($dados));
        die;
    }

    if($acao=='sb3') {
        $path = '../../storage/thumbnails/';

        $nome = 'thumb_' . sha1_file($_FILES['banner']['tmp_name']);
        $ext  = pathinfo($_FILES['banner']['name'], PATHINFO_EXTENSION);
        $nome .= '.' . $ext;

        $caminho = $path . $nome;

        $flag = move_uploaded_file($_FILES['banner']['tmp_name'], $caminho);


        $dados['nome'] = $nome;
        $dados['resposta'] = ($flag) ? "ok":"no";
        print(json_encode($dados));
        die;
    }

    if($acao=='ftdir') {
        $path = '../../storage/perfil/';

        $nome = 'dir_' . sha1_file($_FILES['membro']['tmp_name']);
        $ext  = pathinfo($_FILES['membro']['name'], PATHINFO_EXTENSION);
        $nome .= '.' . $ext;

        $caminho = $path . $nome;

        $flag = move_uploaded_file($_FILES['membro']['tmp_name'], $caminho);


        $dados['nome'] = $nome;
        $dados['resposta'] = ($flag) ? "ok":"no";
        print(json_encode($dados));
        die;
    }

    if($acao=='avatar') {
        $path = '../../storage/perfil/';

        $nome = sha1_file($_FILES['foto']['tmp_name']);
        $ext  = end(explode('.',$_FILES['foto']['name']));
        $nome .= '.' . $ext;

        $caminho = $path . $nome;

        $flag = move_uploaded_file($_FILES['foto']['tmp_name'], $caminho);

        if(!$flag) {
            $dados['nome'] = 'default.png';
            $dados['resposta'] = ($flag) ? "ok":"no";
            print(json_encode($dados));
            die;
        }


        $query = 'UPDATE usuarios SET foto=? WHERE codigo=?';
        $param = array($nome,$request->post('usuario'));
        $db->executar($query,$param);

        $dados['nome'] = $nome;
        $dados['resposta'] = ($flag) ? "ok":"no";
        print(json_encode($dados));
        die;
    }

    if($acao=='rmfotoatual') {
        $query = 'UPDATE usuarios SET foto=? WHERE codigo=?';
        $param = array("default.png",$request->post('id'));
        $flag = $db->executar($query,$param);

        print(($flag)?"ok":"no");
        die;
    }

} else {
    die('no');
}

