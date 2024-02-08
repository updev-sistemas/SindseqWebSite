<?php
/**
 * p : Acesso Público
 * a : Acesso Administrativo
 */
define("APP_ACCESS", "p");
require_once("./system/app.inc.php");


?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php require_once("./partials/head.inc.php"); ?>
        <link rel="stylesheet" type="text/css" href="./assets/css/jquery.realperson.css" />
        <style type="text/css">
            .map-wrapper {
                position: relative;
            }
            .map-wrapper .text {
                position: absolute;
                top: 70px;
                right: 100px;
                z-index: 2;
                width: 400px;
                height: 170px;
                padding:20px;
                background: #FFF;
                box-shadow: 0 0 3px rgba(0, 0, 0, 0.15);
            }

        </style>
    </head>
    <body>



        <section class="wrapper">
            <div class="center">

                <?php require_once("./partials/superbar.inc.php"); ?>

                <?php require_once("./partials/navbar.inc.php"); ?>

                <div class="content_area">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="slider_area">
                                <iframe width="100%" height="300" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJmwpPHx41vAcRvva_TN4maas&key=AIzaSyBnQ5FV6WVfwvOgtRM2ToyOr8v9eXxq2bQ" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="row clearfix" style="margin-top:30px;">
                            <div class="col-md-4">
                                <div class="contact_info">
                                    <h5 class="list-title gray"><i class="icones-menu slashBarTitle"></i> <strong>Administrativo</strong></h5>
                                    <div class="contact-info ">
                                        <div class="address">
                                            <p class="p1">SINDSEQ - Sindicato dos Servidores Públicos de Quixeramobim.</p>
                                            <p class="p1">Rua Dias Ferreira, nº 50 - Centro </p>
                                            <p class="p1">Quixeramobim/Ce </p>
                                            <p>Email: administracao@sindseq.org.br</p>
                                            <p>Telefone: (88) 3441-0046</p>
                                            <p>&nbsp;</p>
                                            <div>
                                                <p><strong><a href="#">Estatuto</a></strong></p>
                                                <p><strong><a href="#">Lei Municipal</a></strong></p>
                                                <p><strong><a href="#">ATA de Abertura</a></strong></p>
                                            </div>
                                            <p>&nbsp;</p>
                                        </div>
                                    </div>
                                    <div class="social-list">
                                        <a target="_blank" href="https://www.facebook.com/Sindseq-312017649193856/"><i class="icones-facebook"></i></a>
                                        <a target="_blank" href="https://plus.google.com/u/0/103602613690930575970"><i class="icones-gplus"></i></a>
                                        <a target="_blank" href="https://instagram.com/nossosindseq"><i class="icones-instagram"></i></a>
                                        <a target="_blank" href="https://twitter.com/sindseq"><i class="icones-twitter"></i></a>
                                        <a target="_blank" href="https://www.youtube.com/channel/UCTkHXdvUZ7wLK8cix0PYpjA"><i class="icones-youtube"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="contact-form">
                                    <h5 class="list-title gray"><i class="icones-menu slashBarTitle"></i> <strong>Contato</strong></h5>

                                    <div id="msgSuccess" class="oculto alert alert-success fade in" role="alert">
                                       <strong>Obrigado!</strong> Contato recebido, aguarde que em breve entraremos em contato com você.
                                    </div>
                                    <div id="msgError" class="oculto alert alert-danger fade in" role="alert">
                                        <strong>Atenção!</strong> Não foi possível salvar o seu contato, tente novamente.
                                    </div>

                                    <form class="form-horizontal" method="post">
                                        <input type="hidden" name="token" id="token" value="<?=$session->lerValor(APP_TOKEN)?>" />
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <input id="nome" name="name" type="text" placeholder="Seu Nome" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <select id="motivo"  class="form-control">
                                                                <option value="0">Escolha o Motivo do Contato</option>
                                                                <option value="1">Sugestão</option>
                                                                <option value="2">Elogio</option>
                                                                <option value="3">Denuncia</option>
                                                                <option value="4">Dúvida</option>
                                                                <option value="5">Crítica</option>
                                                                <option value="6">Reclamação</option>
                                                                <option value="7">Solicitação</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <input id="assunto" name="assunto" type="text" placeholder="Assunto" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <input id="email" name="email" type="text" placeholder="Digite seu email" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <textarea class="form-control" id="conteudo" name="conteudo" placeholder="Digite aqui sua mensagem" rows="7"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12 ">
                                                            <button type="button" id="btnSalvar" class="btn btn-primary btnReg">Enviar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <?php require_once("./partials/footer.inc.php"); ?>

        <?php require_once("./partials/script.inc.php"); ?>

        <script type="text/javascript" src="./assets/js/jquery.plugin.min.js"></script>
        <script type="text/javascript" src="./assets/js/jquery.realperson.min.js"></script>
        <script type="text/javascript" src="./controllers/contato.js"></script>
    </body>
</html>