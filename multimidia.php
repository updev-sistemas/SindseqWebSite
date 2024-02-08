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

                    <div class="row featurette">
                        <div class="col-md-7 col-md-push-5">
                            <h2 class="featurette-heading">Vauires Rodrigues</h2>
                            <h4><span class="text-muted">Presidente</span></h4>
                            <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
                        </div>
                        <div class="col-md-5 col-md-pull-7">
                            <img class="featurette-image img-responsive center-block" width="200" src="./storage/perfil/default.png" alt="Generic placeholder image">
                        </div>
                    </div>

                    <hr class="featurette-divider">

                    <div class="row featurette">
                        <div class="col-md-7">
                            <h2 class="featurette-heading">Vauires Rodrigues</h2>
                            <h4><span class="text-muted">Presidente</span></h4>
                            <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
                        </div>
                        <div class="col-md-5">
                            <img class="featurette-image img-responsive center-block" width="200" src="./storage/perfil/default.png" alt="Generic placeholder image">
                        </div>
                    </div>

                    <hr class="featurette-divider">

                    <div class="row featurette">
                        <div class="col-md-7">
                            <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
                            <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
                        </div>
                        <div class="col-md-5">
                            <img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
                        </div>
                    </div>

                    <hr class="featurette-divider">

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