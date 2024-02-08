<?php
/**
 * Created by PhpStorm.
 * User: antoniojose
 * Date: 16/01/17
 * Time: 13:25
 */

define("APP_ACCESS", "p");
require_once("../system/app.inc.php");

$t1 = $session->lerValor(APP_TOKEN);
$t2 = $request->post("token");

$flag = Criptografia::comparaHash($t1,$t2);

function validaCPF($cpf = null) {

    // Verifica se um número foi informado
    if(empty($cpf)) {
        return false;
    }

    // Elimina possivel mascara
    $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

    // Verifica se o numero de digitos informados é igual a 11
    if (strlen($cpf) != 11) {
        return false;
    }
    // Verifica se nenhuma das sequências invalidas abaixo
    // foi digitada. Caso afirmativo, retorna falso
    else if ($cpf == '00000000000' ||
        $cpf == '11111111111' ||
        $cpf == '22222222222' ||
        $cpf == '33333333333' ||
        $cpf == '44444444444' ||
        $cpf == '55555555555' ||
        $cpf == '66666666666' ||
        $cpf == '77777777777' ||
        $cpf == '88888888888' ||
        $cpf == '99999999999') {
        return false;
        // Calcula os digitos verificadores para verificar se o
        // CPF é válido
    } else {

        for ($t = 9; $t < 11; $t++) {

            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{$c} != $d) {
                return false;
            }
        }

        return true;
    }
}

if($flag) {

    $acao = $request->post("acao");


    if($acao=='lst1') {
        $sqlListSetor = "SELECT codigo,nome FROM setores WHERE subordinado=? ORDER BY nome ASC";
        $params = array($request->post("secretaria"));
        $flag = $db->executar($sqlListSetor,$params);

        if(!$flag) {
            die("error");
        }
        echo $db->resultado(APP_RESULTADO_JSON);
        die;
    }
    else if($acao=='vml') {
        $sqlEmailEmUso = "SELECT count(codigo) as 'QTD' FROM servidores WHERE email =?";
        $param = array($request->post("email"));

        $flag = $db->executar($sqlEmailEmUso,$param);

        if(!$flag) {
            die("error");
        }

        $resultado = $db->resultado(APP_RESULTADO_OBJETOS)[0];
        if($resultado->QTD == 0) {
            die("ok");
        } else {
            die("no");
        }
    }
    else if($acao=='vmt') {
        $sqlMatriculaEmUso = "SELECT count(codigo) as 'QTD' FROM servidores WHERE matricula_funcional=?";
        $param = array($request->post("matricula"));

        $flag = $db->executar($sqlMatriculaEmUso,$param);

        if(!$flag) {
            die("error");
        }

        $resultado = $db->resultado(APP_RESULTADO_OBJETOS)[0];
        if($resultado->QTD == 0) {
            die("ok");
        } else {
            die("no");
        }
    }
    else if($acao=='vmrg') {

        $sqlRgEmUso = "SELECT count(codigo) as 'QTD' FROM servidores WHERE rg_num=?";
        $param = array($request->post("rg"));

        $flag = $db->executar($sqlRgEmUso,$param);

        if(!$flag) {
            die("error");
        }

        $resultado = $db->resultado(APP_RESULTADO_OBJETOS)[0];
        if($resultado->QTD == 0) {
            die("ok");
        } else {
            die("no");
        }
    }
    else if($acao=='novo') {


        if(!validaCPF($request->post("cpf"))) {
            die("no-cpf");
        }

        $dataNascimento = Data::gregoriano2mysql($request->post("aniversario"),false);
        $dataEmissao    = Data::gregoriano2mysql($request->post("emissao"),false);

        $sqlInsert = "INSERT INTO servidores (cpf, matricula_funcional, nome, sobrenome, email, telefone1, telefone2, data_nascimento, logradouro, complemento, bairro, cep, cidade, rg_num, rg_emissao, rg_emissor, foto, sexo, alocado, registrado_em, aceito_em, sstatus, tipo, formacao) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $params = array(
            $request->post("cpf"),$request->post("matricula"),$request->post("nome"),
            $request->post("sobrenome"),$request->post("email"),$request->post("telefone"),
            $request->post("celular"),$dataNascimento,$request->post("endereco"),
            $request->post("complemento"),$request->post("bairro"),$request->post("cep"),
            $request->post("cidade"),$request->post("rg"),$dataEmissao,$request->post("orgao"),
            $request->post("foto"),$request->post("sexo"),$request->post("setor"),
            Data::agora(),Data::agora(),"aguardando", $request->post("vinculo"),
            $request->post("escolaridade")
        );

        $flag = $db->executar($sqlInsert,$params);

        if(!$flag) {
            die("error");
        }

        echo ($db->ultimoId()>0) ? "ok" : "no";
        die;

    }
    else if($acao=='vcpf'){

        if(!validaCPF($request->post("cpf"))) {
            die("no");
        }

        $sqlCpfEmUso = "SELECT count(codigo) as 'QTD' FROM servidores WHERE cpf=?";
        $param = array($request->post("cpf"));

        $flag = $db->executar($sqlCpfEmUso,$param);

        if(!$flag) {
            die("error");
        }

        $resultado = $db->resultado(APP_RESULTADO_OBJETOS)[0];
        if($resultado->QTD == 0) {
            die("ok");
        } else {
            die("no");
        }

    }
    if($acao=='foto') {
        $path = '../storage/perfil/';

        $nome = 'afiliado_' . sha1_file($_FILES['imagem']['tmp_name']);
        $ext  = end(explode('.',$_FILES['imagem']['name']));
        $nome .= '.' . $ext;

        $caminho = $path . $nome;

        $flag = move_uploaded_file($_FILES['imagem']['tmp_name'], $caminho);

        $dados['nome'] = $nome;
        $dados['resposta'] = ($flag) ? "ok":"no";
        print(json_encode($dados));
        die;
    }
    else {
        die("no");
    }

} else {
    die("no");
}
