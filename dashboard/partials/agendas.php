<?php

if(!defined("APP_ACCESS")) {
    die("Error");
}


$SQL = "SELECT DISTINCT a.codigo, a.titulo, a.conteudo, a.data_evento, u.nome FROM agenda as a,usuarios as u WHERE u.codigo=a.registrado_por";
$db->executar($SQL);
$agenda = $db->resultado(APP_RESULTADO_OBJETOS);


?>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Agenda do SINDSEQ</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Eventos  <a href="index.php?pagina=novoevento" class="btn btn-primary"><i class="fa fa-plus"></i> Novo</a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="table table-responsive table-striped table-bordered" id="tbAgenda">
                        <thead>
                            <tr>
                                <th>Título</th>
                                <th>Data Evento</th>
                                <th>Registrado Por</th>
                                <th>Ação</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($agenda)): ?>
                                <?php foreach($agenda as $a) : ?>
                                <tr id="evento<?=$a->codigo?>">
                                    <td><?=$a->titulo?></td>
                                    <td><?=Data::mysql2gregoriano($a->data_evento,false)?></td>
                                    <td><?=$a->nome?></td>
                                    <td><a class="btn btn-primary" href="index.php?pagina=editarEvento&codigo=<?=$a->codigo?>">Editar</a></td>
                                    <td><button type="button" evento="<?=$a->codigo?>" class="btn btn-danger btn-remove">Excluir</button></td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr colspan="5">
                                    <th>Nenhum registro de evento</th>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
