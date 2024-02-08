<?php

if(!defined("APP_ACCESS")) {
    die("Error");
}

$sqlDocumentos = "SELECT DISTINCT  u.nome as 'nome',d.codigo as 'codigo',d.titulo as 'titulo',d.descricao as 'descricao',d.data_publicacao as 'data' FROM usuarios as u, documentos as d WHERE d.publicado_por=u.codigo AND d.tipo=?";
$params = array("arquivo");
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
                    <h2>Arquivos</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div id="msgSuccessReg" class="col-lg-offset-3 col-sm-offset-3 col-md-6 col-sm-6 col-xs-12 alert alert-success oculto alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <strong>Sucesso!</strong> Mídia Alterada.
                        </div>
                        <div id="msgErrorReg" class="col-lg-offset-3 col-sm-offset-3 col-md-6 col-sm-6 col-xs-12 alert alert-danger oculto alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <strong>Erro!</strong> Não foi possível Alterar esta Mídia.
                        </div>
                    </div>
                    <table id="tbMidias" class="table table-responsivo form-horizontal table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Título</th>
                            <th>Descrição</th>
                            <th>Autor</th>
                            <th>Data Envio</th>
                            <th>Ação</th>
                            <th>Ação</th>
                            <th>Ação</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(count($documentos)>0) : ?>
                            <?php foreach($documentos as $d): ?>
                                <tr id="l<?=$d->codigo?>">
                                    <td><?=$d->titulo?></td>
                                    <td><?=$d->descricao?></td>
                                    <td><?=$d->nome?></td>
                                    <td><?=Data::mysql2gregoriano($d->data)?></td>
                                    <td>
                                        <select class="autoriza form-control" arquivo="<?=$d->codigo?>">
                                            <option value="-" selected>Não alterar</option>
                                            <option value="ativo">Ativo</option>
                                            <option value="inativo">Inativo</option>
                                        </select>
                                    </td>
                                    <td><a href="index.php?pagina=editarAnexo&codigo=<?=$d->codigo?>&retorno=arquivos" class="btn btn-primary">Editar</a></td>
                                    <td><button type="button" arquivo="<?=$d->codigo?>" class="btn btn-danger">Excluir</button></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="7">Nenhum documento</td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

