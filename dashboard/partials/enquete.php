<?php

if(!defined("APP_ACCESS")) {
    die("Error");
}

$sqlEnquete = "SELECT DISTINCT	e.id as 'id', e.descricao as 'descricao',  e.iniciar_em as 'inicio', e.encerrar_em as 'fim', e.pergunta as 'pergunta', e.estatus as 'estatus', u.nome as 'nome' FROM enquetes AS e, usuarios AS u WHERE e.criado_por=u.codigo";
$db->executar($sqlEnquete);
$enquetes = $db->resultado(APP_RESULTADO_OBJETOS);

?>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Enquetes</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Lista de Enquetes</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="tbConteudo" class="table table-responsive table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Pergunta</th>
                                <th>Descrição</th>
                                <th>Inicia Em</th>
                                <th>Termina Em</th>
                                <th>Status</th>
                                <th>Criado Por</th>
                                <th>Ação</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($enquetes as $e): ?>
                            <tr>
                                <td><?=$e->pergunta?></td>
                                <td><?=$e->descricao?></td>
                                <td><?=Data::mysql2gregoriano($e->inicio)?></td>
                                <td><?=Data::mysql2gregoriano($e->fim)?></td>
                                <td><?=$e->estatus?></td>
                                <td><?=$e->nome?></td>
                                <td>Ação</td>
                                <td>Ação</td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                            </div>
                            <div class="modal-body">
                                <h4>Text in a modal</h4>
                                <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                                <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
