<?php
/**
 * p : Acesso Público
 * a : Acesso Administrativo
 */
define("APP_ACCESS", "p");
require_once("./system/app.inc.php");


$sqlCampanha = "SELECT * FROM campanhas WHERE (? BETWEEN inicia AND termina) AND cstatus=? LIMIT 1";
$param = array(Data::agora(),"publicada");

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php require_once("./partials/head.inc.php"); ?>
</head>
<body>
<section class="wrapper">
    <div class="center">

        <?php require_once("./partials/superbar.inc.php"); ?>

        <?php require_once("./partials/navbar.inc.php"); ?>

        <div class="content_area">
            <div class="main_content floatleft">
                <div class="container-fluid">

                    <div class="jumbotron">
                        <h4 class="h4 text-center">Área de Download</h4>
                    </div>

                </div>
            </div>

            <div class="sidebar floatright">
                <?php require_once("./partials/sidebar.index.php"); ?>
            </div>
        </div>

    </div>

    <?php require_once("./partials/footer.inc.php"); ?>
</section>


</body>
</html>