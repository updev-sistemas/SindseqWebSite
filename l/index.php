<?php
/**
 * Created by PhpStorm.
 * User: Antonio José
 * Date: 30/08/2016
 * Time: 17:15
 */



    define("APP_ACCESS", "p");
    require_once("../system/app.inc.php");


    function getErroMsg( $number ) {
        switch($number) {
            case 10 : {
                return "Token Não Reconhecido!";
            }
            case 11 : {
                return "Captcha Inválido";
            }
            case 12 : {
                return "Usuário ou Senha Inválido";
            }
            case 13 : {
                return "Ocorreu um erro na plataforma";
            }
        }
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
            <a class="hiddenanchor" id="signup"></a>
            <a class="hiddenanchor" id="signin"></a>

            <div class="login_wrapper">
                <div class="animate form login_form">
                    <section class="login_content">
                        <form action="gateway.php" method="post">
                            <input type="hidden" name="frm" value="1" />
                            <input type="hidden" name="token" value="<?=$session->lerValor(APP_TOKEN)?>" />
                            <h1>Autenticação</h1>

                            <?php if($request->isGet("msg")) : ?>
                                <div class="alert alert-warning alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <strong>Atenção!</strong> <?=getErroMsg($request->get("msg"))?>.
                                </div>
                            <?php endif; ?>

                            <div>
                                <input type="text" id="cmpUsuario" name="usuario" class="form-control" placeholder="Usuário ou Email" required="true" />
                            </div>
                            <div>
                                <input type="password" id="cmpSenha" name="senha" class="form-control" placeholder="Senha" required="true" />
                            </div>
                            <div>
                                <input type="text" id="captcha1" name="defaultReal" class="form-control" placeholder="Captcha" required="true" />
                            </div>
                            <div>
                                <button type="submit" class="btn btn-default submit btn-block">Iniciar Sessão</button>
                            </div>

                            <div class="clearfix"></div>

                            <div class="separator">
                                <p class="change_link">Esqueceu a Senha?
                                    <a href="#signup" class="to_register"> Recuperar Senha </a>
                                </p>

                                <div class="clearfix"></div>
                                <br />

                                <div>
                                    <h1>SINDSEQ</h1>
                                    <p>©2016 - <?=date('Y')?> Todos os Direitos Reservados</p>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>

                <div id="register" class="animate form registration_form">
                    <section class="login_content">
                        <form action="gateway.php" method="post">
                            <input type="hidden" name="frm" value="2" />
                            <input type="hidden" name="token" value="<?=$session->lerValor(APP_TOKEN)?>" />
                            <h1>Recuperar Senha</h1>
                            <div>
                                <input type="text" name="email" id="email" class="form-control" placeholder="E-mail" required="" />
                            </div>
                            <div>
                                <input type="text" id="captcha2" name="defaultReal" class="form-control" placeholder="Captcha" required="true" />
                            </div>
                            <div>
                                <button type="submit" class="btn btn-default submit btn-block">Solicitar Nova Senha</button>
                            </div>

                            <div class="clearfix"></div>

                            <div class="separator">
                                <p class="change_link">
                                    Voltar a página de
                                    <a href="#signin" class="to_register"> <strong>login</strong> </a>
                                </p>

                                <div class="clearfix"></div>
                                <br />

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
            });
        </script>
    </body>
</html>