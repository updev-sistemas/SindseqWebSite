<?php
/**
 * p : Acesso Público
 * a : Acesso Administrativo
 */
define("APP_ACCESS", "p");
require_once("./system/app.inc.php");

?>

<!-- Estrutura do Comentário -->

<div class="box">
    <div id="comments">
        <h3>4 Comments</h3>
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

<!-- Estrutura do Comentário -->


<iframe src="//player.sejaguia.com.br/player-barra/12770/000000"  frameborder="0" width="100%" height="32"></iframe>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>SINDSEQ - Sindicato dos Servidores Públicos de Quixeramobim - Ceará</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.bxslider.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="assets/fontello/css/fontello.css"  />
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
<div class="wrapper">
    <div class="center">
        <div class="header_area">
            <div class="logo floatleft"><a href="index.php"><img src="assets/images/logo.png" alt="" /></a></div>
            <div class="top_menu floatleft">
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="#">Sobre</a></li>
                    <li><a href="#">Documentos</a></li>
                    <li><a href="#">Contato</a></li>
                </ul>
            </div>
            <div class="social_plus_search floatright">
                <div class="social">
                    <ul>
                        <li><a href="#" class="icones-facebook"></a></li>
                        <li><a href="#" class="icones-twitter"></a></li>
                        <li><a href="#" class="icones-instagram"></a></li>
                    </ul>
                </div>
                <div class="search">
                    <form action="pesquisar.php" method="post" id="search_form">
                        <input type="text" placeholder="Procurar Por..." id="s" />
                        <button type="submit" id="searchform"><i class="icones-search"></i></button>
                        <input type="hidden" value="post" name="post_type" />
                    </form>
                </div>
            </div>
        </div>
        <div class="main_menu_area">
            <ul id="nav">
                <li><a href="#">Rede Sindical</a>
                    <ul>
                        <li><a href="#">Single item</a></li>
                        <li><a href="#">Single item</a></li>
                        <li><a href="#">Single item</a>
                            <ul>
                                <li><a href="#">Single item</a></li>
                                <li><a href="#">Single item</a></li>
                                <li><a href="#">Single item</a></li>
                                <li><a href="#">Single item</a></li>
                                <li><a href="#">Single item</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Single item</a></li>
                        <li><a href="#">Single item</a></li>
                    </ul>
                </li>
                <li><a href="#">Sindicalistas</a></li>
                <li><a href="#">Política</a>
                    <ul>
                        <li><a href="#">Single item</a></li>
                        <li><a href="#">Single item</a></li>
                        <li><a href="#">Single item</a></li>
                        <li><a href="#">Single item</a></li>
                        <li><a href="#">Single item</a></li>
                    </ul>
                </li>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a>
                    <ul>
                        <li><a href="#">Single item</a></li>
                        <li><a href="#">Single item</a></li>
                        <li><a href="#">Single item</a></li>
                        <li><a href="#">Single item</a></li>
                        <li><a href="#">Single item</a></li>
                    </ul>
                </li>
                <li><a href="#">Link 3</a></li>
                <li><a href="#">Link 4</a></li>
            </ul>
        </div>
        <div class="slider_area">
            <div class="slider">
                <ul class="bxslider">
                    <li><img src="assets/images/1.jpg" alt="" title="Slider caption text" /></li>
                    <li><img src="assets/images/2.jpg" alt="" title="Slider caption text" /></li>
                    <li><img src="assets/images/3.jpg" alt="" title="Slider caption text" /></li>
                </ul>
            </div>
        </div>
        <div class="content_area">
            <div class="main_content floatleft">
                <div class="left_coloum floatleft">
                    <div class="single_left_coloum_wrapper">
                        <h2 class="title">from   around   the   world</h2>
                        <a class="more" href="#">more</a>
                        <div class="single_left_coloum floatleft"> <img src="assets/images/single_featured.png" alt="" />
                            <h3>Lorem ipsum dolor sit amet, consectetur</h3>
                            <p>Nulla quis lorem neque, mattis venenatis lectus. In interdum ullamcorper
                                dolor eu mattis.</p>
                            <a class="readmore" href="#">read more</a> </div>
                        <div class="single_left_coloum floatleft"> <img src="assets/images/single_featured.png" alt="" />
                            <h3>Lorem ipsum dolor sit amet, consectetur</h3>
                            <p>Nulla quis lorem neque, mattis venenatis lectus. In interdum ullamcorper
                                dolor eu mattis.</p>
                            <a class="readmore" href="#">read more</a> </div>
                        <div class="single_left_coloum floatleft"> <img src="assets/images/single_featured.png" alt="" />
                            <h3>Lorem ipsum dolor sit amet, consectetur</h3>
                            <p>Nulla quis lorem neque, mattis venenatis lectus. In interdum ullamcorper
                                dolor eu mattis.</p>
                            <a class="readmore" href="#">read more</a> </div>
                    </div>
                    <div class="single_left_coloum_wrapper">
                        <h2 class="title">latest  articles</h2>
                        <a class="more" href="#">more</a>
                        <div class="single_left_coloum floatleft"> <img src="assets/images/single_featured.png" alt="" />
                            <h3>Lorem ipsum dolor sit amet, consectetur</h3>
                            <p>Nulla quis lorem neque, mattis venenatis lectus. In interdum ullamcorper
                                dolor eu mattis.</p>
                            <a class="readmore" href="#">read more</a> </div>
                        <div class="single_left_coloum floatleft"> <img src="assets/images/single_featured.png" alt="" />
                            <h3>Lorem ipsum dolor sit amet, consectetur</h3>
                            <p>Nulla quis lorem neque, mattis venenatis lectus. In interdum ullamcorper
                                dolor eu mattis.</p>
                            <a class="readmore" href="#">read more</a> </div>
                        <div class="single_left_coloum floatleft"> <img src="assets/images/single_featured.png" alt="" />
                            <h3>Lorem ipsum dolor sit amet, consectetur</h3>
                            <p>Nulla quis lorem neque, mattis venenatis lectus. In interdum ullamcorper
                                dolor eu mattis.</p>
                            <a class="readmore" href="#">read more</a> </div>
                    </div>
                    <div class="single_left_coloum_wrapper gallery">
                        <h2 class="title">gallery</h2>
                        <a class="more" href="#">more</a> <img src="assets/images/single_featured.png" alt="" /> <img src="assets/images/single_featured.png" alt="" /> <img src="assets/images/single_featured.png" alt="" /> <img src="assets/images/single_featured.png" alt="" /> <img src="assets/images/single_featured.png" alt="" /> <img src="assets/images/single_featured.png" alt="" /> </div>
                    <div class="single_left_coloum_wrapper single_cat_left">
                        <h2 class="title">tech news</h2>
                        <a class="more" href="#">more</a>
                        <div class="single_cat_left_content floatleft">
                            <h3>Lorem ipsum dolor sit amet conse ctetur adipiscing elit </h3>
                            <p>Nulla quis lorem neque, mattis venenatis lectus. In interdum ullamcorper dolor ...interdum</p>
                            <p class="single_cat_left_content_meta">by <span>John Doe</span> |  29 comments</p>
                        </div>
                        <div class="single_cat_left_content floatleft">
                            <h3>Lorem ipsum dolor sit amet conse ctetur adipiscing elit </h3>
                            <p>Nulla quis lorem neque, mattis venenatis lectus. In interdum ullamcorper dolor ...interdum</p>
                            <p class="single_cat_left_content_meta">by <span>John Doe</span> |  29 comments</p>
                        </div>
                        <div class="single_cat_left_content floatleft">
                            <h3>Lorem ipsum dolor sit amet conse ctetur adipiscing elit </h3>
                            <p>Nulla quis lorem neque, mattis venenatis lectus. In interdum ullamcorper dolor ...interdum</p>
                            <p class="single_cat_left_content_meta">by <span>John Doe</span> |  29 comments</p>
                        </div>
                        <div class="single_cat_left_content floatleft">
                            <h3>Lorem ipsum dolor sit amet conse ctetur adipiscing elit </h3>
                            <p>Nulla quis lorem neque, mattis venenatis lectus. In interdum ullamcorper dolor ...interdum</p>
                            <p class="single_cat_left_content_meta">by <span>John Doe</span> |  29 comments</p>
                        </div>
                    </div>
                </div>
                <div class="right_coloum floatright">
                    <div class="single_right_coloum">
                        <h2 class="title">from the desk</h2>
                        <ul>
                            <li>
                                <div class="single_cat_right_content">
                                    <h3>Lorem ipsum dolor sit amet conse ctetur adipiscing elit</h3>
                                    <p>Nulla quis lorem neque, mattis venen atis lectus. In interdum ull amcorper dolor eu mattis.</p>
                                    <p class="single_cat_right_content_meta"><a href="#"><span>read more</span></a> 3 hours ago</p>
                                </div>
                            </li>
                            <li>
                                <div class="single_cat_right_content">
                                    <h3>Lorem ipsum dolor sit amet conse ctetur adipiscing elit</h3>
                                    <p>Nulla quis lorem neque, mattis venen atis lectus. In interdum ull amcorper dolor eu mattis.</p>
                                    <p class="single_cat_right_content_meta"><a href="#"><span>read more</span></a> 3 hours ago</p>
                                </div>
                            </li>
                            <li>
                                <div class="single_cat_right_content">
                                    <h3>Lorem ipsum dolor sit amet conse ctetur adipiscing elit</h3>
                                    <p>Nulla quis lorem neque, mattis venen atis lectus. In interdum ull amcorper dolor eu mattis.</p>
                                    <p class="single_cat_right_content_meta"><a href="#"><span>read more</span></a> 3 hours ago</p>
                                </div>
                            </li>
                        </ul>
                        <a class="popular_more" href="#">more</a> </div>
                    <div class="single_right_coloum">
                        <h2 class="title">editorial</h2>
                        <div class="single_cat_right_content editorial"> <img src="assets/images/editorial_img.png" alt="" />
                            <h3>Lorem ipsum dolor sit amet con se cte tur adipiscing elit</h3>
                        </div>
                        <div class="single_cat_right_content editorial"> <img src="assets/images/editorial_img.png" alt="" />
                            <h3>Lorem ipsum dolor sit amet con se cte tur adipiscing elit</h3>
                        </div>
                        <div class="single_cat_right_content editorial"> <img src="assets/images/editorial_img.png" alt="" />
                            <h3>Lorem ipsum dolor sit amet con se cte tur adipiscing elit</h3>
                        </div>
                        <div class="single_cat_right_content editorial"> <img src="assets/images/editorial_img.png" alt="" />
                            <h3>Lorem ipsum dolor sit amet con se cte tur adipiscing elit</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sidebar floatright">
                <div class="single_sidebar"> <img src="assets/images/add1.png" alt="" /> </div>
                <div class="single_sidebar">
                    <div class="news-letter">
                        <h2>Sign Up for Newsletter</h2>
                        <p>Sign up to receive our free newsletters!</p>
                        <form action="#" method="post">
                            <input type="text" value="Name" id="name" />
                            <input type="text" value="Email Address" id="email" />
                            <input type="submit" value="SUBMIT" id="form-submit" />
                        </form>
                        <p class="news-letter-privacy">We do not spam. We value your privacy!</p>
                    </div>
                </div>
                <div class="single_sidebar">
                    <div class="popular">
                        <h2 class="title">Popular</h2>
                        <ul>
                            <li>
                                <div class="single_popular">
                                    <p>Sept 24th 2045</p>
                                    <h3>Lorem ipsum dolor sit amet conse ctetur adipiscing elit <a href="#" class="readmore">Read More</a></h3>
                                </div>
                            </li>
                            <li>
                                <div class="single_popular">
                                    <p>Sept 24th 2045</p>
                                    <h3>Lorem ipsum dolor sit amet conse ctetur adipiscing elit <a href="#" class="readmore">Read More</a></h3>
                                </div>
                            </li>
                            <li>
                                <div class="single_popular">
                                    <p>Sept 24th 2045</p>
                                    <h3>Lorem ipsum dolor sit amet conse ctetur adipiscing elit <a href="#" class="readmore">Read More</a></h3>
                                </div>
                            </li>
                            <li>
                                <div class="single_popular">
                                    <p>Sept 24th 2045</p>
                                    <h3>Lorem ipsum dolor sit amet conse ctetur adipiscing elit <a href="#" class="readmore">Read More</a></h3>
                                </div>
                            </li>
                            <li>
                                <div class="single_popular">
                                    <p>Sept 24th 2045</p>
                                    <h3>Lorem ipsum dolor sit amet conse ctetur adipiscing elit <a href="#" class="readmore">Read More</a></h3>
                                </div>
                            </li>
                        </ul>
                        <a class="popular_more">more</a> </div>
                </div>
                <div class="single_sidebar"> <img src="assets/images/add1.png" alt="" /> </div>
                <div class="single_sidebar">
                    <h2 class="title">ADD</h2>
                    <img src="assets/images/add2.png" alt="" /> </div>
            </div>
        </div>
        <div class="footer_top_area">
            <div class="inner_footer_top"> <img src="assets/images/add3.png" alt="" /> </div>
        </div>
        <div class="footer_bottom_area">
            <div class="footer_menu">
                <ul id="f_menu">
                    <li><a href="#">world news</a></li>
                    <li><a href="#">sports</a></li>
                    <li><a href="#">tech</a></li>
                    <li><a href="#">business</a></li>
                    <li><a href="#">Movies</a></li>
                    <li><a href="#">entertainment</a></li>
                    <li><a href="#">culture</a></li>
                    <li><a href="#">Books</a></li>
                    <li><a href="#">classifieds</a></li>
                    <li><a href="#">blogs</a></li>
                </ul>
            </div>
            <div class="copyright_text">
                <p>&copy; 2016 - <?=date("Y")?> SINDSEQ. Todos os Direitos Reservados</p>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="assets/js/jquery-min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.bxslider.js"></script>
<script type="text/javascript" src="assets/js/selectnav.min.js"></script>
<script type="text/javascript">
    selectnav('nav', {
        label: '-MENU-',
        nested: true,
        indent: '-'
    });
    selectnav('f_menu', {
        label: '-MENU-',
        nested: true,
        indent: '-'
    });
    $('.bxslider').bxSlider({
        mode: 'fade',
        captions: true
    });
</script>
</body>
</html>