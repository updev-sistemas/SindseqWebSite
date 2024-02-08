<?php
/**
 * p : Acesso Público
 * a : Acesso Administrativo
 */
define("APP_ACCESS", "p");
require_once("./system/app.inc.php");


$SQL = "SELECT * FROM diretoria WHERE dstatus=? ORDER BY posicao ASC";
$param = array("ativo");
$db->executar($SQL, $param);
$diretores = $db->resultado(APP_RESULTADO_OBJETOS);


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php require_once("./partials/head.inc.php"); ?>
    <style type="text/css">
        .featurette-divider {
            margin: 80px 0; /* Space out the Bootstrap <hr> more */
        }

        /* Thin out the marketing headings */
        .featurette-heading {
            font-weight: 300;
            line-height: 1;
            letter-spacing: -1px;
        }
        .lead {font-size: 1em;}
    </style>
</head>
<body>
<section class="wrapper">
    <div class="center">

        <?php require_once("./partials/superbar.inc.php"); ?>

        <?php require_once("./partials/navbar.inc.php"); ?>

        <div class="content_area">
            <div class="main_content floatleft">
                <div class="container-fluid">


                    <hr class="featurette-divider">
                    <?php $i = 0; foreach($diretores as $d): $i++;?>
                    <div class="row featurette">
                        <?php if($i%2==0) : ?>
                        <div class="col-md-7 col-md-push-5">
                        <?php else : ?>
                        <div class="col-md-7">
                        <?php endif; ?>
                            <h2 class="featurette-heading"><?=$d->nome?></h2>
                            <h5><span class="text-muted"><?=$d->cargo?></span></h5>
                            <p class="lead"><?=$d->sobre?>.</p>
                            <p>
                                <ul id="listaSocial">
                                <?php if(!empty($d->facebook)): ?>
                                    <li><a href="<?=$d->facebook?>" target="_blank"><i class="icones-facebook"></i></a></li>
                                <?php endif; ?>
                                <?php if(!empty($d->googleplus)): ?>
                                    <li><a href="<?=$d->googleplus?>" target="_blank"><i class="icones-gplus"></i></a></li>
                                <?php endif; ?>
                                <?php if(!empty($d->instagram)): ?>
                                    <li><a href="<?=$d->instagram?>" target="_blank"><i class="icones-twitter"></i></a></li>
                                <?php endif; ?>
                                <?php if(!empty($d->twitter)): ?>
                                    <li><a href="<?=$d->twitter?>" target="_blank"><i class="icones-instagram"></i></a></li>
                                <?php endif; ?>
                                <?php if(!empty($d->email)): ?>
                                    <li><a href="<?=$d->email?>" target="_blank"><i class="icones-mail-alt"></i></a></li>
                                <?php endif; ?>
                                </ul>
                            </p>
                        </div>
                        <?php if($i%2==0) : ?>
                        <div class="col-md-5 col-md-pull-7">
                        <?php else : ?>
                        <div class="col-md-5">
                        <?php endif; ?>
                            <img class="featurette-image img-responsive center-block" width="200" src="./storage/perfil/<?=$d->foto?>" alt="Foto de <?=$d->nome?>" />
                        </div>
                    </div>
                    <hr class="featurette-divider">
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="sidebar floatright">
                <?php require_once("./partials/sidebar.index.php"); ?>
            </div>
        </div>

    </div>
    <?php require_once("./partials/footer.inc.php"); ?>
</section>



<?php require_once("./partials/script.inc.php"); ?>

</body>
</html>