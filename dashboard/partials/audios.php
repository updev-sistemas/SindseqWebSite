<?php

if(!defined("APP_ACCESS")) {
    die("Error");
}

$sqlDocumentos = "SELECT DISTINCT  u.titulo as 'nome',d.codigo as 'codigo',d.nome as 'titulo',d.descricao as 'descricao',d.data_publicacao as 'data' FROM usuarios as u, documentos as d WHERE d.publicado_por=u.codigo AND tipo=?";
$params = array("audio");
$db->executar($sqlDocumentos,$params);
$documentos = $db->resultado(APP_RESULTADO_OBJETOS);

?>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Lista de Documentos</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Documentos</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="tbMidias" class="table table-responsivo table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Título</th>
                            <th>Descrição</th>
                            <th>Autor</th>
                            <th>Data Envio</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(count($documentos)>0) : ?>
                            <?php foreach($documentos as $d): ?>
                                <tr>
                                    <td><?=$d->titulo?></td>
                                    <td><?=$d->descricao?></td>
                                    <td><?=$d->nome?></td>
                                    <td><?=Data::mysql2gregoriano($d->data)?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="4">Nenhum documento</td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

