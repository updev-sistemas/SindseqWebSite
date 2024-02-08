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

        <?php require_once("./partials/superbar.inc.php"); ?>

        <?php require_once("./partials/navbar.inc.php"); ?>
        <div class="content_area">
            <div class="main_content floatleft">
                <div class="post">
                    <div class="text-center">
                        <h1 class="titulopub">Titulo da Publicação</h1>
                        <div class="meta">
                            <span class="datapub">Publicado em 14 Aug 2015</span>,
                            <span class="catpub"><a href="#"> em <strong>Categoria</strong></a></span>
                        </div>
                        <figure class="bannerPrincipal">
                            <img src="./storage/banners/1.png" alt="" class="img-responsive" />
                        </figure>
                        <div id="acessibilidade" style="margin-top:10px;">
                            <p class="text-right">
                                <button type="button" data-toggle="modal" data-target="#telaEnviarEmail" class="btnEmail" title="Enviar por email"><i class="glyphicon glyphicon-envelope"></i></button>
                                <button type="button" class="btnImpressao" title="Imprimir Noticia"><i class="glyphicon glyphicon-print"></i></button>
                                <button type="button" class="btnDiminuirFonte" title="Diminuir Fonte"><i class="glyphicon glyphicon-zoom-out"></i></button>
                                <button type="button" class="btnAumentarFonte" title="Aumentar Fonte"><i class="glyphicon glyphicon-zoom-in"></i></button>
                            </p>
                        </div>
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
                        <div id="acessibilidade" style="margin-top:10px;">
                            <p class="text-right">
                                <button type="button" data-toggle="modal" data-target="#telaEnviarEmail" class="btnEmail" title="Enviar por email"><i class="glyphicon glyphicon-envelope"></i></button>
                                <button type="button" class="btnImpressao" title="Imprimir Noticia"><i class="glyphicon glyphicon-print"></i></button>
                                <button type="button" class="btnDiminuirFonte" title="Diminuir Fonte"><i class="glyphicon glyphicon-zoom-out"></i></button>
                                <button type="button" class="btnAumentarFonte" title="Aumentar Fonte"><i class="glyphicon glyphicon-zoom-in"></i></button>
                            </p>
                        </div>
                        <br />
                        <div id="footpub">
                            <div class="col-lg-6 col-sm-12 col-md-12 tags text-left">
                                <a href="#">journal</a>
                                <a href="#">illustration</a>
                                <a href="#">design</a>
                                <a href="#">daily</a>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-md-12 text-right desktop">
                                <a href="#"><i class="icones-facebook"></i></a>
                                <a href="#"><i class="icones-twitter"></i></a>
                                <a href="#"><i class="icones-gplus"></i></a>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-md-12 text-right mobile">
                                <a href="#"><i class="icones-facebook"></i></a>
                                <a href="#"><i class="icones-twitter"></i></a>
                                <a href="#"><i class="icones-gplus"></i></a>
                                <a href="#"><i class="icones-whatsapp"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="formpub">
                            <hr />
                            <h3 class="h3">Deixe seu comentário</h3>
                            <form class="form-horizontal" method="post">
                                <input type="hidden" name="token" id="token" value="token" />
                                <fieldset>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input id="nome" name="name" type="text" placeholder="Seu Nome" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input id="email" name="email" type="text" placeholder="Digite seu email" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <textarea class="form-control" id="conteudo" name="conteudo" placeholder="Digite aqui seu comentário" rows="4"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button type="button" id="btnSalvar" class="btn btn-primary btnReg">Enviar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>'
                    </div>


                    <div class="box">
                        <div id="comments">
                            <h3>3 Comments</h3>
                            <div class="divide10"></div>
                            <ol id="singlecomments" class="commentlist">
                                <li>
                                    <div class="message">
                                        <div class="message-inner">
                                            <div class="info">
                                                <h2><a href="#">Connor Gibson</a></h2>
                                                <div class="meta"> <span class="date">January 14, 2010</span> <span class="reply"><a class="link-effect" href="#">Reply</a></span> </div>
                                            </div>
                                            <p>Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Sed posuere consectetur est at lobortis. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Vestibulum id ligula porta felis euismod semper.</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="message">
                                        <div class="message-inner">
                                            <div class="info">
                                                <h2><a href="#">Nikolas Brooten</a></h2>
                                                <div class="meta"> <span class="date">February 21, 2010</span> <span class="reply"><a class="link-effect" href="#">Reply</a></span> </div>
                                            </div>
                                            <p>Quisque tristique tincidunt metus non aliquam. Quisque ac risus sit amet quam sollicitudin vestibulum vitae malesuada libero. Mauris magna elit, suscipit non ornare et, blandit a tellus. Pellentesque dignissim ornare elit, quis mattis eros sodales ac.</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="message">
                                        <div class="message-inner">
                                            <div class="info">
                                                <h2><a href="#">Lou Bloxham</a></h2>
                                                <div class="meta"> <span class="date">May 03, 2010</span> <span class="reply"><a class="link-effect" href="#">Reply</a></span> </div>
                                            </div>
                                            <p>Sed posuere consectetur est at lobortis. Vestibulum id ligula porta felis euismod semper. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                                        </div>
                                    </div>
                                </li>
                            </ol>
                        </div>
                        <!-- /#comments -->

                    </div>

                </div>
                <!-- .post -->
            </div>
            <div class="sidebar floatright">
                <div class="single_sidebar">
                    <div class="popular">
                        <h2 class="title">Nesta Categoria</h2>
                        <ul>
                            <li>
                                <div class="single_popular">
                                    <p>Sept 24th 2045</p>
                                    <h3>Lorem ipsum dolor sit amet conse ctetur adipiscing elit <a href="#" class="readmore">Continue Lendo</a></h3>
                                </div>
                            </li>
                            <li>
                                <div class="single_popular">
                                    <p>Sept 24th 2045</p>
                                    <h3>Lorem ipsum dolor sit amet conse ctetur adipiscing elit <a href="#" class="readmore">Continue Lendo</a></h3>
                                </div>
                            </li>
                            <li>
                                <div class="single_popular">
                                    <p>Sept 24th 2045</p>
                                    <h3>Lorem ipsum dolor sit amet conse ctetur adipiscing elit <a href="#" class="readmore">Continue Lendo</a></h3>
                                </div>
                            </li>
                            <li>
                                <div class="single_popular">
                                    <p>Sept 24th 2045</p>
                                    <h3>Lorem ipsum dolor sit amet conse ctetur adipiscing elit <a href="#" class="readmore">Continue Lendo</a></h3>
                                </div>
                            </li>
                        </ul>
                        <a class="popular_more" href="#">Ver mais</a>
                    </div>
                </div>
                <div class="single_sidebar">
                    <div class="news-letter">
                        <h2>Pesquisa</h2>
                        <p>Utilize o formulário abaixo para buscar alguma informação que foi mencionada em alguma publicação nossa.</p>
                        <div id="areaFormulario">
                            <form action="#" method="post">
                                <input type="hidden" id="token" name="token" value="<?=$session->lerValor(APP_TOKEN)?>" />
                                <input type="search" placeholder="Pesquisar Por..." id="nome" />

                                <input type="button" value="Buscar" id="form-submit" />
                            </form>
                        </div>
                    </div>
                </div>
                <div class="single_sidebar">
                    <h2 class="title">Sindicato na Rádio</h2>
                    <div>
                        <div id="areaRadio">
                            <img src="assets/images/radio.png" class="img-responsive" title="Não estamos no ar neste momento, somente aos sábados de 12:00 às 13:00 na rádio Campo Maior de Quixeramobim" alt="Banner Rádio" / >
                        </div>
                    </div>
                </div>
                <div class="single_sidebar">
                    <h2 class="title">IMPOSTÔMETRO</h2>
                    <iframe id="impostometro" src="https://impostometro.com.br/widget/contador/ce?municipio=quixeramobim" width="320" height="80" scrolling="no" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </div>
</main>

<div id="telaEnviarEmail" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Enviar esta Publicação Por Email</h4>
            </div>
            <div class="modal-body">
                Texto
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary">Enviar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<?php require_once("./partials/footer.inc.php"); ?>

<?php require_once("./partials/script.inc.php"); ?>
<script type="text/javascript">

    $(function(){

        var atualSize = 10; maxSize = 30, minSize = 10, publicacao = "<?=$request->get("publicacao")?>";

        $(".btnAumentarFonte").click(function(){
            var tamanho = atualSize + 3;
            if(tamanho > maxSize) {
                tamanho = maxSize;
            }
            atualSize = tamanho;
            $(".textopub").css("font-size", tamanho + "pt");
        });

        $(".btnDiminuirFonte").click(function(){
            var tamanho = atualSize - 3;
            if(tamanho < minSize) {
                tamanho = minSize;
            }
            atualSize = tamanho;
            $(".textopub").css("font-size", tamanho + "pt");
        });

        $(".btnImpressao").click(function(){
            var url = "impressao.php?publicacao=" + publicacao;
            window.open(url,'_blank');
        });

    });

</script>

</body>
</html>