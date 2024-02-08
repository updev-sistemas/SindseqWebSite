<?php defined("APP_ACCESS") or die("Acesso Negado"); ?>
<?php
    $SQL = "SELECT codigo, titulo, DATE_FORMAT(data_evento,'%d') AS 'dia' FROM agenda WHERE month(data_evento)=month(curdate()) AND astatus='ativo' ORDER BY data_evento DESC LIMIT 3";
    $db->executar($SQL);
    $eventos = $db->resultado(APP_RESULTADO_OBJETOS);
?>
<div class="single_sidebar">
    <h2 class="title"><i class="icones-menu slashBarTitle"></i> Agenda</h2>
    <div class="container-fluid">
        <?php if(count($eventos)>0) : foreach($eventos as $e) :?>
        <div style="margin-top:5px;" class="row">
            <div class="numbercal col-lg-4 col-md-5 col-sm-4">
                <img class="img-responsive imgcal" src="assets/images/calendar.png" />
                <span class="number"><?=$e->dia?></span>
            </div>
            <div class="conteudocal col-lg-8 col-mg-7 col-sm-8">
                <h4><a href="evento.php?codigo=<?=$e->codigo?>"><?=$e->titulo?></a></h4>
                <a href="evento.php?codigo=<?=$e->codigo?>" class="readmore">Ver</a>
            </div>
        </div>
        <?php endforeach; else : ?>
            <div class="col-lg-12">
                <h5 class="h5">Nenhum Evento Este Mês</h5>
            </div>
        <?php endif; ?>
        <br />
    </div>
</div>
<div class="single_sidebar">
    <div class="news-letter">
        <h2>Assine a Newsletters</h2>
        <p>Fique próximo a seu sindicato, receba novidades em seu email!</p>
        <div id="areaFormulario">
            <form action="#" method="post">
                <input type="hidden" id="token" name="token" value="<?=$session->lerValor(APP_TOKEN)?>" />
                <input type="text" placeholder="Seu nome" id="nome" />
                <p id="msgNwl1" class="help-block nwl oculto">Digite seu nome</p>

                <input type="email" placeholder="Seu email" id="email" />
                <p id="msgNwl2" class="help-block nwl oculto">Digite seu email</p>

                <input type="button" value="Registrar" id="form-submit" />
            </form>
        </div>
        <div id="areaLoad" class="oculto">
            <p class="text-center">
                <img style="text-align: center;" src="./assets/images/load.gif" width="50" class="img-responsive" />
            </p>
        </div>
        <p class="news-letter-privacy">Leia Nossa <a href="privacidade.php" id="abreModal">Politica de Privacidade</a>!</p>
    </div>
</div>
<div class="single_sidebar">
    <div class="popular">
        <h2 class="title"><i class="icones-menu slashBarTitle"></i> Popular</h2>
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
    <h2 class="title"><i class="icones-menu slashBarTitle"></i> Sindicato na Rádio</h2>
    <div>
        <div id="areaRadio">
            <img src="assets/images/radio.png" class="img-responsive" title="Não estamos no ar neste momento, somente aos sábados de 12:00 às 13:00 na rádio Campo Maior de Quixeramobim" alt="Banner Rádio" / >
        </div>
        <a href="multimidia.php" class="readmore text-center">Ver Mais</a>
    </div>
</div>
<div class="single_sidebar">
    <h2 class="title"><i class="icones-menu slashBarTitle"></i> IMPOSTÔMETRO</h2>
    <iframe id="impostometro" src="https://impostometro.com.br/widget/contador/ce?municipio=quixeramobim" width="320" height="80" scrolling="no" frameborder="0"></iframe>
</div>
