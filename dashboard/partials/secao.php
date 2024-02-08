<?php
if(!defined("APP_ACCESS")) {
    die("Error");
}

$db->executar("SELECT * FROM secao ORDER BY nome");
$secoes = $db->resultado(APP_RESULTADO_OBJETOS);


?>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Seções</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Seções</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <form method="post" action="#" class="form-horizontal">
                            <input type="hidden" id="token" value="<?=$session->lerValor(APP_TOKEN)?>" />
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="nome">Nome <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="nome" required="required" class="form-control cmp col-md-7 col-xs-12">
                                    <p class="help-block oculto" id="msgErrorNome">É obrigatório escrever o nome do usuário.</p>
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-12">
                                    <button type="button" id="btnRegistro" class="btn btn-success">Registrar</button>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                        </form>
                    </div>
                    <div class="divider"></div>
                    <div class="row">
                        <table id="tbSecao" class="table table-responsive table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>nome</th>
                                    <th>Ação</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody id="painel">
                                <?php foreach($secoes as $s) : ?>
                                <tr id="s<?=$s->id?>">
                                    <td><?=$s->nome?></td>
                                    <td>Editar</td>
                                    <td><button typ="button" class="btn btn-danger btn-rm" secao="<?=$s->id?>" >Remover</button></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
