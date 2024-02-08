<?php defined("APP_ACCESS") or die("Acesso Negado"); ?>
<div class="single_sidebar">
    <h2 class="title"><i class="icones-menu slashBarTitle"></i> Calendário</h2>
    <style type="text/css">
        .table-style .today{background: #2A3F54; color: #ffffff;}
        .table-style th:nth-of-type(7),td:nth-of-type(7) {color: blue;}
        .table-style th:nth-of-type(1),td:nth-of-type(1) {color: red;}
        .table-style tr:first-child th{background-color:#F6F6F6; text-align:center; font-size: 15px;}
    </style>
    <div class="container-fluid">
        <div class="" style="border:0px solid">
            <p class="well" style="padding:10px; margin-bottom:2px;">
                <span class="glyphicon glyphicon-calendar"></span>  Eventos do Nosso Sindicato
            </p>
            <div class="col-md-12" style="padding:0px;">
                <br>
                <p class="text-center">
                    <a href="#" id="btnHoje" class="readmore text-center">Hoje</a>
                </p>
                <div id="areaCalendario"></div>
                <div id="feriados">
                    <ul id="listaFeriados">
                        <li>1 - Dia de Todos os Santos</li>
                        <li>1 - Dia de Todos os Santos</li>
                        <li>1 - Dia de Todos os Santos</li>
                        <li>1 - Dia de Todos os Santos</li>
                    </ul>
                </div>
            </div>
        </div>
        <br />
    </div>
</div>
<div class="single_sidebar">
    <h2 class="title"><i class="icones-menu slashBarTitle"></i> Sindicato na Rádio</h2>
    <div>
        <div id="areaRadio">
            <img src="assets/images/radio.png" class="img-responsive" title="Não estamos no ar neste momento, somente aos sábados de 12:00 às 13:00 na rádio Campo Maior de Quixeramobim" alt="Banner Rádio" / >
        </div>
    </div>
</div>
<div class="single_sidebar">
    <h2 class="title"><i class="icones-menu slashBarTitle"></i> IMPOSTÔMETRO</h2>
    <iframe id="impostometro" src="https://impostometro.com.br/widget/contador/ce?municipio=quixeramobim" width="320" height="80" scrolling="no" frameborder="0"></iframe>
</div>

