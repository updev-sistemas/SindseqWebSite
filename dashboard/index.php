<?php
/**
 * Created by PhpStorm.
 * User: antoniojose
 * Date: 12/01/17
 * Time: 17:40
 */
define("APP_ACCESS", "a");
require_once("../system/app.inc.php");


$usuario = null;

$flag = (
    ($session->lerValor(APP_AUTENTICADO) == APP_AUTENTICADO_ON) &&
    ($session->lerValor(APP_USER_ID) != 0) &&
    ($session->lerValor(APP_USER_STATUS) == 'ativo')
);


if(!$flag) {
    $session->adicionarValor(APP_AUTENTICADO, APP_AUTENTICADO_OFF);
    $session->adicionarValor(APP_USER_ID, 0);
    $session->adicionarValor(APP_USER_STATUS, '----');
    $session->adicionarValor(APP_USER_TIPO, '----');
    $response->redirectTo("../l/index.php");
    exit;
}

$sqlUserData = "SELECT * FROM usuarios WHERE codigo=? LIMIT 1";
$params = array($session->lerValor(APP_USER_ID));
$db->executar($sqlUserData,$params);
$usuario = $db->resultado(APP_RESULTADO_OBJETOS)[0];



define('PATH_PARTIALS','./partials/');
$pagina  = '';

if($request->isGet('pagina')) {
    $pagina = (PATH_PARTIALS . $request->get('pagina') . '.php');
} else {
    $pagina = (PATH_PARTIALS . 'inicio.php');
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SINDSEQ - Upside Serviços em Tecnologia da Informação LTDA</title>

    <!-- Bootstrap -->
    <link href="./vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="./vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="./vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="./vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="./vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="./vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>

    <link href="./vendors/switchery/switchery.css" rel="stylesheet" />
    <link href="./vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <link href="./vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">

    <link href="./vendors/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="./vendors/css/custom.min.css" rel="stylesheet">
    <style type="text/css">
        a.interface_btn:hover, a.interface_btn:focus {
            text: #FFF;
        }
        .itemRedeSocial {display:inline;list-style-type: none; font-size:2em;padding-left:5px;padding-right:5px;}
        .oculto{display:none;}
        .visivel{display:block;}
        .help-block{color:red;}
    </style>
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="index.php" class="site_title">
                        <img src="../assets/images/upside.png" width="30" alt="" class=""  /> <span>Dashboard</span>
                    </a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile">
                    <div class="profile_pic">
                        <img src="../storage/perfil/<?=$usuario->foto?>" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Bem Vindo,</span>
                        <h2><?=$usuario->nome?></h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br />

                <?php require_once("partials/bar.inc.php"); ?>

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a href="index.php?pagina=configuracao" data-toggle="tooltip" data-placement="top" class="interface_btn" title="Configuração">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a id="fbFull" href="#" data-toggle="tooltip" data-placement="top" class="interface_btn" title="Tela Cheia">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a href="#" data-toggle="tooltip" data-placement="top" class="interface_btn" title="Bloquear">
                        <span class="glyphicon glyphicon-eye-close " aria-hidden="true"></span>
                    </a>
                    <a id="fbLogout" href="#" data-toggle="tooltip" data-placement="top" class="interface_btn" title="Encerrar Sessão">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src="../storage/perfil/<?=$usuario->foto?>" alt=""><?=$usuario->nome?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="./index.php?pagina=perfil"> Perfil</a></li>
                                <li>
                                    <a href="javascript:;">
                                        <span>Configuração</span>
                                    </a>
                                </li>
                                <li><a href="javascript:;">Ajuda</a></li>
                                <li><a href="./logout.php"><i class="fa fa-sign-out pull-right"></i> Encerrar Sessão</a></li>
                            </ul>
                        </li>
                        <li role="presentation" class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-envelope-o"></i>
                                <span class="badge bg-green">2</span>
                            </a>
                            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                <li>
                                    <a>
                                        <span>
                                        <span>John Smith</span>
                                        <span class="time">3 mins ago</span>
                                        </span>
                                        <span class="message">
                                            Film festivals used to be do-or-die moments for movie makers. They were where...
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span>
                                        <span>John Smith</span>
                                        <span class="time">3 mins ago</span>
                                        </span>
                                        <span class="message">
                                            Film festivals used to be do-or-die moments for movie makers. They were where...
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <div class="text-center">
                                        <a>
                                            <strong>Ler Todos</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="">
                            <a target="_blank" href="http://webmail.sertaoparaserdoceara.com.br" >
                                <img style="margin-top:7px;" src="../assets/images/webmail.png" class="img-responsive" width="100" />
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">

            <?php
            if(file_exists($pagina)) {
                require_once($pagina);
            } else {
                require_once('./partials/404.php');
            }
            ?>

        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                Gentelella - Bootstrap Admin Template por <a target="_blank" href="https://colorlib.com">Colorlib</a>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script src="./vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="./vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="./vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="./vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="./vendors/Chart.js/dist/Chart.min.js"></script>
<!-- gauge.js -->
<script src="./vendors/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="./vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="./vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="./vendors/skycons/skycons.js"></script>

<script src="./vendors/pnotify/dist/pnotify.js"></script>
<script src="./vendors/pnotify/dist/pnotify.buttons.js"></script>
<script src="./vendors/pnotify/dist/pnotify.nonblock.js"></script>
<!-- Flot -->
<!-- script src="./vendors/Flot/jquery.flot.js"></script>
<script src="./vendors/Flot/jquery.flot.pie.js"></script>
<script src="./vendors/Flot/jquery.flot.time.js"></script>
<script src="./vendors/Flot/jquery.flot.stack.js"></script>
<script src="./vendors/Flot/jquery.flot.resize.js"></script -->
<!-- Flot plugins -->
<!-- script src="./vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="./vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="./vendors/flot.curvedlines/curvedLines.js"></script -->
<!-- DateJS -->
<script src="./vendors/DateJS/build/date.js"></script>
<!-- JQVMap -->
<script src="./vendors/jqvmap/dist/jquery.vmap.js"></script>
<script src="./vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="./vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="./vendors/moment/moment.js"></script>
<!-- FullCalendar -->
<script src="./vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="./vendors/dropzone/dist/min/dropzone.min.js"></script>
<script src="./vendors/datepicker/daterangepicker.js"></script>


<!-- Editor de Texto -->
<script src="./vendors/tinymce/js/tinymce/tinymce.min.js"></script>
<script src="./vendors/tinymce/js/tinymce/langs/pt_BR.js"></script>

<!-- Datatables -->
<script src="./vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="./vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="./vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="./vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="./vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="./vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="./vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="./vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="./vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="./vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="./vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="./vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
<script src="./vendors/select2/dist/js/select2.full.min.js"></script>
<script src="./vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
<!-- Custom Theme Scripts -->
<script src="./vendors/js/custom.min.js"></script>
<script type="text/javascript">
    $(function(){

        $.dataMes = function(mes) {
            switch (mes) {
                case '01' : {
                    return "Janeiro";
                }
                case '02' : {
                    return "Fevereiro";
                }
                case '03' : {
                    return "Março";
                }
                case '04' : {
                    return "Abril";
                }
                case '05' : {
                    return "Maio";
                }
                case '06' : {
                    return "Junho";
                }
                case '07' : {
                    return "Julho";
                }
                case '08' : {
                    return "Agosto";
                }
                case '09' : {
                    return "Setembro";
                }
                case '10' : {
                    return "Outubro";
                }
                case '11' : {
                    return "Novembro";
                }
                case '12' : {
                    return "Dezembro";
                }
                case '00':{
                    return "Mês";
                }
            }
        };

        $.dataVerbose = function( data ){
            var novaData = '';
            var partes = data.split(" ");
            var d = partes[0].split("-");
            return ('' + d[2] + " de " + $.dataMes(d[1]) + " de " + d[0] + ", às " + partes[1])
        };


        $.token = "<?=$session->lerValor(APP_TOKEN)?>";

        $('#fbLogout').click(function(e){
            e.preventDefault();
            console.log('chamou!');
            document.documentElement.requestFullscreen()
        });


    });
</script>
<?php if(!empty($request->get("pagina"))) : ?>
    <script type="text/javascript" src="./controllers/<?=$request->get('pagina')?>.js"></script>
<?php else : ?>
    <script type="text/javascript" src="./controllers/app.js"></script>
<?php endif; ?>

</body>
</html>




