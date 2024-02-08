<?php defined("APP_ACCESS") or die("Acesso Negado"); ?>
<div class="header_area">
    <div class="logo floatleft">
        <a href="index.php">
            <img src="assets/images/logo.png" width="300" alt="SINDSEQ" class="img-responsive" />
        </a>
    </div>
    <div class="top_menu floatleft text-center">
        <ul>
            <li><a href="agenda.php">Agenda</a></li>
            <li><a href="inscricao.php">Filie-se</a></li>
            <li><a href="estatutosLeis.php">Estatutos e Leis</a></li>
            <li><a href="contato.php">Contato</a></li>
        </ul>
    </div>
    <div class="social_plus_search floatright">
        <div class="social">
            <ul>
                <li><a href="#" class="twitter"></a></li>
                <li><a href="#" class="facebook"></a></li>
                <li><a href="#" class="feed"></a></li>
            </ul>
        </div>
        <div class="search">
            <form action="pesquisa.php" method="post" id="search_form">
                <input type="search" placeholder="Pesquisar Por..." id="s" />
                <input type="submit" id="searchform" value="search" />
                <input type="hidden" value="post" name="post_type" />
            </form>
        </div>
    </div>
</div>
