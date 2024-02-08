<?php defined("APP_ACCESS") or die("Acesso Negado"); ?>
<?php

    $SQL_DESTAQUE = "SELECT codigo, titulo,previa, banner FROM publicacao WHERE destaque=? ORDER BY publicado_em DESC LIMIT 4";
    $db->executar($SQL_DESTAQUE,array("sim"));
    $publicacao = $db->resultado(APP_RESULTADO_OBJETOS);
?>
<div id="destaques" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <?php $active = true; $i = 0; foreach($publicacao as $p) : ?>
        <li data-target="#carousel-example-generic" data-slide-to="<?=$i?>" <?=($active)? 'class="active"':'class=""'?>></li>
        <?php $active = false; $i++; endforeach; ?>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <?php $active = true; $i = 0; foreach($publicacao as $p) : ?>
        <div class="item <?=($active)? 'active':''?>">
            <a href="#">
                <img src="./storage/banners/<?=$p->banner?>" alt="Banner">
                <div class="carousel-caption">
                    <h2><?=$p->titulo?></h2>
                    <p><?=substr($p->previa,0,100)?> ...</p>
                </div>
            </a>
        </div>
        <?php $active = false; $i++; endforeach; ?>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#destaques" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#destaques" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<br />