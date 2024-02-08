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
                <div class="left_coloum floatleft">

                </div>

                <div class="right_coloum floatright">


                </div>
            </div>

            <div class="sidebar floatright">
                <?php require_once("./partials/sidebar.agenda.php"); ?>
            </div>
        </div>

    </div>
    <?php require_once("./partials/footer.inc.php"); ?>
</section>



<?php require_once("./partials/script.inc.php"); ?>
<script type="text/javascript">
    $(function(){
        var token = "<?=$session->lerValor(APP_TOKEN)?>";
        var ano = "<?=date('Y')?>";
        var mes = "<?=date('m')?>";

        function carregarCalendario(mes,ano) {
            $.ajax({
                url:'./ajax/calendario.ajax.php',
                method:'post',
                data:{token:token,ano:ano,mes:mes,acao:'list'},
                dataType:'html',
                success:function(response){
                    $("#areaCalendario").children().remove();
                    $("#areaCalendario").append(response);
                }
            });
        }

        function carregarFeriados(mes,ano) {
            $.ajax({
                url:'./ajax/calendario.ajax.php',
                method:'post',
                data:{token:token,ano:ano,mes:mes,acao:'feriado'},
                dataType:'html',
                success:function(response){
                    $("#listaFeriados").children().remove();
                    $("#listaFeriados").append(response);
                }
            });
        }

        $("#areaCalendario").on('click','#bta',function(e){
            e.preventDefault();
            carregarCalendario( $(this).attr("mes"),$(this).attr("ano"));
            carregarFeriados( $(this).attr("mes"),$(this).attr("ano"));
        });

        $("#areaCalendario").on('click','#btp',function(e){
            e.preventDefault();
            carregarCalendario( $(this).attr("mes"),$(this).attr("ano"));
            carregarFeriados( $(this).attr("mes"),$(this).attr("ano"));
        });


        $("#areaCalendario").on("click",".dia",function(e){
            e.preventDefault();
            var data = $(this).attr("dia") + "/" + $(this).attr("mes") + "/" + $(this).attr("ano");

        });

        $("#btnHoje").click(function(e){
            e.preventDefault();
            carregarCalendario(mes,ano);
            carregarFeriados(mes,ano);
        });

        carregarCalendario(mes,ano);
        carregarFeriados(mes,ano);

    });
</script>

</body>
</html>