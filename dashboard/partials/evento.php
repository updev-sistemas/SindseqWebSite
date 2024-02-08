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
            <h3>Publicação</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Novo Evento</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="container-fluid">
                        <form action="#" role="form" method="post" class="form-horizontal">
                            <input type="hidden" id="usuario" value="<?=$usuario->codigo?>" />
                            <div class="col-lg-9" style="border-right-style: solid;border-right-color: #989898;border-right-width: 1px;">
                                <div class="form-group">
                                    <div>
                                        <label for="titulo">Titulo</label>
                                        <input type="text" id="titulo" class="form-control" name="titulo" required />
                                        <br />
                                    </div>
                                    <br />
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <textarea id="word"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label for="titulo">Status</label>
                                            <select id="status" class="form-control">
                                                <option value="-">Escolha</option>
                                                <option value="ativo" selected>Publicar</option>
                                                <option value="rascunho">Rascunho</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-12">
                                            <label for="titulo">Data do Evento</label>
                                            <input type="text" class="form-control has-feedback-left" id="calendario" placeholder="Data Evento" aria-describedby="inputSuccess2Status">
                                        </div>
                                    </div>
                                    <div class="divider"></div>
                                    <div class="row">
                                        <div class="col-lg-12 jumbotron">
                                            <button class="btn btn-success btn-block" type="button" id="btnSalvar"><i class="fa fa-floppy-o"></i> <strong>Salvar</strong></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
