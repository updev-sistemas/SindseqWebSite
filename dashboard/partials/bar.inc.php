<?php
/**
 * Created by PhpStorm.
 * User: Antônio José
 * Date: 19/12/2016
 * Time: 22:08
 */
?>
<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>Geral</h3>
        <ul class="nav side-menu">
            <?php if($usuario->tipo=='administrador') : ?>
            <li><a><i class="fa fa-users"></i> Administrativo <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="./index.php?pagina=diretoria">Diretória</a></li>
                    <li><a href="./index.php?pagina=novoadmin">Novo</a></li>
                    <li><a href="./index.php?pagina=listadmin">Lista de Admins</a></li>
                    <li><a href="./index.php?pagina=logadmin">Logs de Usuários</a></li>
                </ul>
            </li>
            <?php endif; ?>
            <li><a><i class="fa fa-edit"></i> Publicações <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="./index.php?pagina=listpub">Lista de Publicações</a></li>
                    <li><a href="./index.php?pagina=novapub">Nova Publicação</a></li>
                    <li><a href="./index.php?pagina=feriados">Feriados</a></li>
                    <li><a href="./index.php?pagina=agendas">Agenda</a></li>
                    <li><a href="./index.php?pagina=enquete">Enquetes</a></li>
                    <?php # -- Somente Administradores -------- ?>
                    <?php if($usuario->tipo=='administrador') : ?>
                    <li><a href="./index.php?pagina=secao">Seções</a></li>
                    <li><a href="./index.php?pagina=categorias">Categorias</a></li>
                    <?php endif; ?>
                </ul>
            </li>
            <li><a><i class="fa fa-archive"></i> Mídias <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="./index.php?pagina=midia">Nova Mídia</a></li>
                    <li><a href="./index.php?pagina=documentos">Documentos</a></li>
                    <li><a href="./index.php?pagina=audio">Audios</a></li>
                    <li><a href="./index.php?pagina=arquivos">Arquivos</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-comments"></i> Comentários <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="./index.php?pagina=comentarios">Moderar</a></li>
                </ul>
            </li>

            <?php if($usuario->tipo=='administrador') : ?>
            <li><a><i class="fa fa-newspaper-o"></i> Páginas <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="./index.php?pagina=endereco">Endereço</a></li>
                    <li><a href="./index.php?pagina=acessofacil">Acesso Fácil</a></li>
                </ul>
            </li>
            <?php endif; ?>
            <li><a><i class="fa fa-comment"></i> Contatos <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="./index.php?pagina=contatos">Gerenciar</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-envelope"></i> Email Marketing <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="./index.php?pagina=campanhas">Campanhas</a></li>
                    <li><a href="./index.php?pagina=listaContato">Lista de Registros</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- /sidebar menu -->
