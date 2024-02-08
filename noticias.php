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
</head>
<body>
<section class="wrapper">
    <div class="center">

        <?php require_once("./partials/superbar.inc.php"); ?>

        <?php require_once("./partials/navbar.inc.php"); ?>

        <div class="content_area">
            <div class="main_content floatleft">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <img src="storage/banners/thumb.png" alt="" />
                            <h3>Lorem ipsum dolor sit amet, consectetur</h3>
                            <p>Nulla quis lorem neque, mattis venenatis lectus. In interdum ullamcorper
                                dolor eu mattis.</p>
                            <a class="readmore" href="#">Continue Lendo</a>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <img src="storage/banners/thumb.png" alt="" />
                            <h3>Lorem ipsum dolor sit amet, consectetur</h3>
                            <p>Nulla quis lorem neque, mattis venenatis lectus. In interdum ullamcorper
                                dolor eu mattis.</p>
                            <a class="readmore" href="#">Continue Lendo</a>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <img src="storage/banners/thumb.png" alt="" />
                            <h3>Lorem ipsum dolor sit amet, consectetur</h3>
                            <p>Nulla quis lorem neque, mattis venenatis lectus. In interdum ullamcorper
                                dolor eu mattis.</p>
                            <a class="readmore" href="#">Continue Lendo</a>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <img src="storage/banners/1.png" alt="" />
                            <h3>Lorem ipsum dolor sit amet, consectetur</h3>
                            <p>Nulla quis lorem neque, mattis venenatis lectus. In interdum ullamcorper
                                dolor eu mattis.</p>
                            <a class="readmore" href="#">Continue Lendo</a>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <img src="storage/banners/thumb.png" alt="" />
                            <h3>Lorem ipsum dolor sit amet, consectetur</h3>
                            <p>Nulla quis lorem neque, mattis venenatis lectus. In interdum ullamcorper
                                dolor eu mattis.</p>
                            <a class="readmore" href="#">Continue Lendo</a>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <img src="storage/banners/thumb.png" alt="" />
                            <h3>Lorem ipsum dolor sit amet, consectetur</h3>
                            <p>Nulla quis lorem neque, mattis venenatis lectus. In interdum ullamcorper
                                dolor eu mattis.</p>
                            <a class="readmore" href="#">Continue Lendo</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-md-12">
                            <nav aria-label="Page navigation">
                                <ul class="pagination pagination-sm">
                                    <li>
                                        <a href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <li><a href="noticias.php">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li>
                                        <a href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="sidebar floatright">
                <?php require_once("./partials/sidebar.noticias.php"); ?>
            </div>
        </div>

    </div>
    <?php require_once("./partials/footer.inc.php"); ?>
</section>



<?php require_once("./partials/script.inc.php"); ?>

</body>
</html>