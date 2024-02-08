<?php

if(!defined("APP_ACCESS")) {
    die("Error");
}


$SQL = "SELECT * FROM publicacao WHERE codigo=? AND pstatus<>? LIMIT 1";
$params = array($request->get("codigo"),'removida');

$db->executar($SQL,$params);
$p = $db->resultado(APP_RESULTADO_OBJETOS)[0];


?>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Publicação</h3>
        </div>
    </div>

    <div class="clearfix"></div>
    <style type="text/css">
        .definido {color:green;}
        .nao-definido {color:red;}
    </style>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Editar Publicação</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="container-fluid">
                        <form action="#" role="form" method="post" class="form-horizontal">
                            <input type="hidden" id="token" value="<?=$session->lerValor(APP_TOKEN)?>" />
                            <input type="hidden" id="codigo" value="<?=$p->codigo?>" />
                            <input type="hidden" id="banner" value="<?=$p->banner?>" />
                            <div class="col-lg-9">
                                <div class="form-group">
                                    <div class="row">
                                        <div>
                                            <label for="titulo">Titulo</label>
                                            <input type="text" id="titulo" value="<?=$p->titulo?>" class="form-control" name="titulo" required />
                                            <p id="msgTituloErro" class="help-block oculto">Defina o Titulo da Publicação</p>
                                            <br />
                                        </div>
                                        <div>
                                            <label for="subtitulo">Subtitulo</label>
                                            <input type="text" value="<?=$p->subtitulo?>" id="subtitulo" class="form-control" name="subtitulo" required />
                                            <br />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div>
                                            <label for="previa">Prévia</label>
                                            <textarea id="previa" class="form-control"><?=$p->previa?></textarea>
                                            <p id="msgPreviaErro" class="help-block oculto">Defina um texto de prévia para a publicação</p>
                                            <br />
                                        </div>
                                    </div>
                                    <br />
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div>
                                                <label for="banner_d">Banner Principal [720x480] <i id="msgOk1" class="fa fa-check definido oculto"></i><i id="msgNo1" class="nao-definido oculto fa fa-close"></i> </label>
                                                <input type="file" accept="image/*" id="b1" class="form-control" name="banner_d" required />
                                                <div id="progressbar1" class="progress oculto">
                                                    <div id="pgb1" class="progress-bar progress-bar-success" role="progressbar" data-transitiongoal="0"></div>
                                                </div>
                                                <p id="msgBanner1" class="oculto help-block">Defina o Banner da Publicação</p>
                                            </div>
                                            <br />
                                        </div>
                                    </div>
                                    <br />
                                    <div class="row">
                                        <textarea id="word"><?=$p->conteudo?></textarea>
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
                                            <label for="status">Status *</label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="<?=$p->pstatus?>" selected>Não Alterar</option>
                                                <option value="publicada">Publicar</option>
                                                <option value="rascunho">Rascunho</option>
                                            </select>
                                            <p id="msgStatus" class="help-block oculto texto-vermelho">Escolher</p>
                                        </div>
                                        <div class="col-lg-12" style="margin-top:10px;">
                                            <label for="galeria">Possui Galeria *</label>
                                            <select name="galeria" id="galeria" class="form-control">
                                                <option value="<?=$p->galeria?>" selected>Não Alterar</option>
                                                <option value="nao">Não</option>
                                                <option value="sim">Sim</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-12" style="margin-top:10px;">
                                            <label for="galeria">Destaque *</label>
                                            <select name="galeria" id="destaque" class="form-control">
                                                <option value="<?=$p->destaque?>" selected>Não Alterar</option>
                                                <option value="nao">Não</option>
                                                <option value="sim">Sim</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-12" style="margin-top:10px;">
                                            <label for="galeria">Anexo *</label>
                                            <select name="anexo" id="anexo" class="form-control">
                                                <option value="<?=$p->tem_anexo?>" selected>Não Alterar</option>
                                                <option value="nao">Não</option>
                                                <option value="sim">Sim</option>
                                            </select>
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
</div>