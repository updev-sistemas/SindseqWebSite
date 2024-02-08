<?php

    $SQL = "SELECT DISTINCT p.codigo,p.titulo,c.nome as 'categoria',u.nome as 'autor',p.publicado_em,p.visualizacao,p.pstatus, p.destaque as 'destaque' FROM publicacao as p, usuarios as u, categorias as c WHERE p.autor=u.codigo AND p.categoria=c.id AND p.pstatus<>?";

    $db->executar($SQL);
    $publicacao = $db->resultado(APP_RESULTADO_OBJETOS,array('removida'));

?>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Publicações</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Lista de Publicações</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="tbPublicacao" class="table table-responsive table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Titulo</th>
                                <th>Categoria</th>
                                <th>Autor</th>
                                <th>Escrito em</th>
                                <th>Visualizações</th>
                                <th>Status</th>
                                <th>Ação</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($publicacao as $p) : ?>
                                <tr id="pub<?=$p->codigo?>">
                                    <?php if($p->destaque=='sim') : ?>
                                    <td><i class="fa fa-star"></i> <?=$p->titulo?></td>
                                    <?php else : ?>
                                    <td><?=$p->titulo?></td>
                                    <?php endif; ?>
                                    <td><?=$p->categoria?></td>
                                    <td><?=$p->autor?></td>
                                    <td><?=Data::mysql2gregoriano($p->publicado_em)?></td>
                                    <td><?=$p->visualizacao?></td>
                                    <td><?=$p->pstatus?></td>
                                    <td><a href="index.php?pagina=editpub&codigo=<?=$p->codigo?>" class="btn btn-primary"><i class="fa fa-edit"></i> Editar</a></td>
                                    <td><button type="button" publicacao="<?=$p->codigo?>" class="btn btn-danger btn-excluir"><i class="fa fa-close"></i> Excluir</button></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>








