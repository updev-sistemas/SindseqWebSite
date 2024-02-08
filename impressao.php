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
    <style type="text/css">
        .titulopub {

        }
        .datapub {

        }
        .catpub {

        }
        .textopub {
            margin-top:20px;
            font-size: 10pt;
            line-height: 1.1em;
        }
        .bannerPrincipal {
            margin-top:20px;
        }
    </style>
</head>
<body>

<main class="wrapper">
    <div class="center">
        <div class="container-fluid">
            <div class="logo col-lg-5">
                <a href="index.php">
                    <img src="assets/images/logo.png" width="300" alt="SINDSEQ" class="img-responsive" />
                </a>
            </div>
            <div class="col-lg-7">
                <h1 class="titulopub">Titulo da Publicação</h1>
                <div class="meta">
                    <span class="datapub">Publicado em 14 Aug 2015</span>,
                    <span class="catpub"><a href="#"> em <strong>Categoria</strong></a></span>
                </div>
            </div>
        </div>


        <div class="content_area">
            <div class="container-fluid floatleft">
                <div class="post">
                    <div class="text-center">
                        <img src="./storage/banners/1.png" alt="" class="img-responsive" />
                        <div class="textopub">
                            <p class="text-left">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eleifend leo lectus, in laoreet magna consequat eget. Nam sem nisl, tempus et eleifend non, tristique eget augue. Etiam auctor tempus mollis. In hac habitasse platea dictumst. Maecenas faucibus convallis leo, ac rutrum lacus pulvinar sit amet. Vivamus pellentesque tristique elit vel viverra. Proin ut efficitur diam. Pellentesque dignissim diam nunc, sed tempor metus tincidunt eget. Sed posuere condimentum dolor, eget viverra quam.
                            </p>
                            <p  class="text-left">
                                Phasellus blandit justo ac sollicitudin dictum. Pellentesque eleifend nec elit at auctor. Fusce tincidunt urna sed tortor auctor venenatis eu tempus nunc. Etiam ut aliquet enim. Cras ut neque viverra, elementum tellus a, sagittis augue. Aliquam ac faucibus massa. Cras sed hendrerit enim. Ut consectetur, ligula eget venenatis interdum, tortor nisi finibus neque, nec rutrum nisl odio a enim. Cras et pretium felis. Fusce semper mattis ante, aliquam posuere nisi sodales sed. Quisque sed nunc at lectus tincidunt faucibus sit amet id nulla.
                            </p>
                            <blockquote class="text-left">
                                Lorem ipsum no seu cu, seu viadim.
                            </blockquote>
                            <p  class="text-left">
                                Sed pharetra mauris ex, ut pretium massa lacinia laoreet. Integer pellentesque euismod neque sit amet tempor. Cras eget ligula non nibh rutrum efficitur. Praesent accumsan sed tortor sit amet pulvinar. Proin eu varius ligula. Integer tristique a justo ac lobortis. Curabitur iaculis sapien sem, ut finibus turpis pretium non. Nulla malesuada mattis pharetra. In commodo odio erat, a ullamcorper tellus rhoncus ut. Vestibulum vel bibendum nibh. Morbi vitae fermentum nisl.
                            </p>
                            <p class="text-left">
                                Integer at erat at lorem iaculis luctus. Cras et congue risus, ac lobortis sem. Duis cursus eros dui, ut scelerisque metus iaculis vel. Maecenas in libero eget magna hendrerit elementum sed ut erat. Vivamus rhoncus ut enim sit amet consectetur. Mauris congue nisi sit amet risus congue, quis pellentesque justo malesuada. Donec ultricies neque tellus, nec malesuada orci faucibus sit amet. Proin aliquet ac magna non suscipit. Ut bibendum turpis sed semper suscipit.
                            </p>
                            <p class="text-left">
                                Cras non eros non mi bibendum pulvinar. Curabitur id neque eu ipsum euismod lobortis et sed eros. Aenean id tellus eu metus dictum gravida et a erat. Proin eget libero et augue fringilla euismod malesuada eget tortor. Vestibulum semper a tellus venenatis egestas. Interdum et malesuada fames ac ante ipsum primis in faucibus. Morbi hendrerit ligula a quam auctor molestie. Quisque fermentum lectus in magna mollis, non varius turpis laoreet. Maecenas eleifend massa eu vehicula volutpat. Aliquam fringilla non massa in ultrices.
                            </p>
                        </div>
                        <br />
                    </div>
                    <hr />

                    <div id="container" style="margin-bottom: 30px;">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <h4><i class="icones-menu slashFootTitle"></i> Endereço</h4>
                            <ul class="listNoDecorate">
                               <li><span style="color:#000" class="footerEndereco" id="contatoLogradouro"></span></li>
                               <li><span style="color:#000" class="footerEndereco" id="contatoBairro"></span></li>
                               <li><span style="color:#000" class="footerEndereco" id="contatoCidade"></span></li>
                               <li><span style="color:#000" class="footerEndereco" id="contatoCep"></span></li>

                               <br />

                               <li><span style="color:#000" class="footerEndereco" id="contatoTelefone"></span></li>
                               <li><span style="color:#000" class="footerEndereco" id="contatoEmail"></span></li>
                            </ul>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <h4><i class="icones-menu slashFootTitle"></i> Acessar</h4>
                            <div id="areaQrCode"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>



<?php require_once("./partials/script.inc.php"); ?>
<script src="./assets/js/qrcode.js"></script>
<script type="text/javascript">

$(function(){
    var url = "http://www.sindseq.org.br/ler.php?publicacao=<?=$request->get("publicacao")?>";
    $('#areaQrCode').qrcode(url);
    $(window).load(function(){
        window.print();
    });
});

</script>

</body>
</html>