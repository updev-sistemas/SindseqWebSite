<?php defined("APP_ACCESS") or die("Acesso Negado"); ?>
<div id="barraMenus">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
            <li class="dropdown drop1">
                <a href="#" class="dropdown-toggle js-activated" data-toggle="dropdown" role="button" aria-haspopup="false" aria-expanded="false">Institucional <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="diretoria.php">Diretória</a></li>
                    <li><a href="sobre.php">Quem Somos</a></li>
                </ul>
            </li>
            <li><a href="comunicados.php">Comunicação</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle js-activated" data-toggle="dropdown" role="button" aria-haspopup="false" aria-expanded="false">Atuação <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="campanhas.php">Campanhas</a></li>
                    <li><a href="projetos.php">Projetos</a></li>
                    <li><a href="processosjuridicos.php">Processos Judiciais</a></li>
                </ul>
            </li>
            <li><a href="noticias.php">Notícias</a></li>
            <li><a href="videos.php">Vídeos</a></li>
            <li><a href="galerias.php">Galerias</a></li>
        </ul>
    </div><!--/.nav-collapse -->
</div>