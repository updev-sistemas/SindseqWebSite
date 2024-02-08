<?php
    /**
     * p : Acesso Público
     * a : Acesso Administrativo
     */
    define("APP_ACCESS", "p");
    require_once("./system/app.inc.php");


    $sqlCampanha = "SELECT * FROM campanhas WHERE (? BETWEEN inicia AND termina) AND cstatus=? LIMIT 1";
    $param = array(Data::agora(),"publicada");

    $flag = $db->executar($sqlCampanha,$param);
    $campanha = $db->resultado(APP_RESULTADO_OBJETOS)[0];

    $flag = ($session->lerValor("CMP_VIEW")!='ok');
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
                        <div class="left_coloum floatleft">

                            <?php require_once("./partials/destaque.index.php"); ?>

                            <!-- Redes Sindical -->
                            <?php require_once("./partials/parte1.inc.php"); ?>

                            <!-- Galerias -->
                            <?php require_once("./partials/parte3.inc.php"); ?>

                            <!-- Vídeos -->
                            <?php require_once("./partials/parte4.inc.php"); ?>

                        </div>

                        <div class="right_coloum floatright">

                            <?php require_once("./partials/editorial.inc.php"); ?>

                            <?php require_once("./partials/opiniao.inc.php"); ?>

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
        <?php if($flag) : $session->adicionarValor("CMP_VIEW","ok")?>
            <div class="modal fade" id="campanha" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <a href="ler.php?publicacao=<?=$campanha->publicacao?>">
                                <img src="./storage/banners/<?=$campanha->banner?>" class="img-responsive" alt="Banner"  />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                $(function(){
                    $("#campanha").modal('show');
                });
            </script>
        <?php endif; ?>

    </body>
</html>