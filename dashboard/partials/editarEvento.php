<?php

if(!defined("APP_ACCESS")) {
    die("Error");
}

$SQL = "SELECT codigo,titulo,conteudo,data_evento,astatus FROM agenda WHERE codigo=? LIMIT 1";
$params = array($request->get("codigo"));

$db->executar($SQL,$params);
$evento = $db->resultado(APP_RESULTADO_OBJETOS)[0];

?>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Eventos</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Editar Evento</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form action="#" role="form" method="post" class="form-horizontal">
                        <input type="hidden" id="token" value="<?=$session->lerValor(APP_TOKEN)?>" />
                        <input type="hidden" id="autor" value="<?=$usuario->codigo?>" />
                        <input type="hidden" id="evento" value="<?=$evento->codigo?>" />
                        <div class="col-lg-9">
                            <div class="form-group">
                                <div class="row">
                                    <div>
                                        <label for="titulo">Titulo</label>
                                        <input type="text" value="<?=$evento->titulo?>"  id="titulo" class="form-control" name="titulo" required />
                                        <p id="msgTituloErro" class="help-block oculto">Defina o Titulo do Evento</p>
                                        <br />
                                    </div>
                                </div>
                                <br />
                                <div class="row">
                                    <textarea id="word"><?=$evento->conteudo?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-12 jumbotron">
                                        <button class="btn btn-success btn-block" type="button" id="btnSalvar"><i class="fa fa-floppy-o"></i> <strong>Salvar</strong></button>
                                    </div>
                                </div>
                                <div class="divider"></div>
                                <div class="row">
                                    <div class="col-lg-12" style="margin-top:10px;">
                                        <label for="status">Data do Evento *</label>
                                        <input value="<?=Data::cal($evento->data_evento,false)?>" type="text" class="form-control has-feedback-left" id="calendario" placeholder="Data do Evento" />
                                        <p id="msgDataErro" class="help-block oculto">Defina a data do evento</p>
                                    </div>
                                    <div class="col-lg-12" style="margin-top:10px;">
                                        <label for="status">Status do Evento *</label>
                                        <select  class="form-control has-feedback-left" id="status">
                                            <option value="<?=$evento->astatus?>">Não alterar</option>
                                            <option value="ativo">Ativo</option>
                                            <option value="rascunho">Rascunho</option>
                                            <option value="inativo">Inativo</option>
                                        </select>
                                        <p id="msgDataErro" class="help-block oculto">Defina a data do evento</p>
                                    </div>
                                    <div class="col-lg-12" style="margin-top:10px;">
                                        <a href="index.php?pagina=agendas" class="btn btn-primary btn-block">Retornar</a>
                                    </div>
                                    <br />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
