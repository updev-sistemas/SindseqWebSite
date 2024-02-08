<?php
/**
 * Created by PhpStorm.
 * User: Antonio José
 * Date: 30/08/2016
 * Time: 17:15
 */
define("APP_ACCESS", "p");
require_once("../system/app.inc.php");

if(!$request->isGet("pin")) {
    $response->redirectTo("index.php");
    exit;
}


$pin1 = $request->get("pin");
$pin2 = $session->lerValor("USER_RESET_PIN");

$uid = $session->lerValor("USER_RESET_ID");
$utk = $session->lerValor("USER_RESET_TK");


$sqlBusca = "SELECT * FROM usuarios WHERE codigo=? LIMIT 1";
$param = array($uid);

$db->executar($sqlBusca,$param);
$usuario = $db->resultado(APP_RESULTADO_OBJETOS)[0];


if(!Criptografia::comparaHash($usuario->token,$utk)) {
    $response->redirectTo("index.php");
    exit;
}



?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title>SINDSEQ</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="../assets/css/animate.min.css" type="text/css" />
    <link rel="stylesheet" href="../assets/css/custom.css" type="text/css" />
    <link rel="stylesheet" href="../assets/css/jquery.realperson.css" type="text/css" />
</head>
<body class="login">
<div>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form action="gateway.php" method="post">
                    <input type="hidden" name="frm" value="3" />
                    <input type="hidden" name="token" value="<?=$session->lerValor(APP_TOKEN)?>" />
                    <input type="hidden" name="utoken" value="<?=$session->lerValor("USER_RESET_TK")?>" />
                    <input type="hidden" name="pin" value="<?=$session->lerValor("USER_RESET_PIN")?>" />
                    <h1>Autenticação</h1>
                    <div>
                        <input type="password" id="us1" name="s1" class="form-control" placeholder="Nova Senha" required="true" />
                    </div>
                    <div>
                        <input type="password" id="us2" name="s2" class="form-control" placeholder="Repita a Senha" required="true" />
                    </div>
                    <div>
                        <input type="text" id="captcha1" name="defaultReal" class="form-control" placeholder="Captcha" required="true" />
                    </div>
                    <div>
                        <button type="submit" class="btn btn-default submit btn-block">Trocar Senha E Ativar</button>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <div>
                            <h1>SINDSEQ</h1>
                            <p>©2016 - <?=date('Y')?> Todos os Direitos Reservados</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>
<script type="text/javascript" src="../assets/js/jquery.min.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../assets/js/jquery.plugin.min.js"></script>
<script type="text/javascript" src="../assets/js/jquery.realperson.min.js"></script>
<script type="text/javascript">
    $(function(){
        $('#captcha1,#captcha2').realperson({length: 4,regenerate:'Clique para modificar'});



        $("#us2").change(function(){
            var s1 = $(this).val(),
                s2 = $("#us1").val();

            if(s1!==s2) {
                $("#us1,#us2").val("");
                alert("As senhas não conferem")
            }
        });
    });
</script>
</body>
</html>