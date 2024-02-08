<?php

if(!defined("APP_ACCESS")) {
    die("Error");
}

function getTipoAnexo($t) {
    if($t=='doc') { return 'd'; }
    if($t=='audio') { return 'a'; }
    if($t=='arquivo') { return 'f'; }
}

$sql = "SELECT * FROM documentos WHERE codigo=? LIMIT 1";
$param = array($request->get("codigo"));

$db->executar($sql,$param);
$docs = $db->resultado(APP_RESULTADO_OBJETOS)[0];

?>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Adicionar Anexos</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Documentos Diversos</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div id="msgSuccessReg" class="col-lg-offset-3 col-sm-offset-3 col-md-6 col-sm-6 col-xs-12 alert alert-success oculto alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <strong>Sucesso!</strong> Mídia modificada.
                        </div>
                        <div id="msgErrorReg" class="col-lg-offset-3 col-sm-offset-3 col-md-6 col-sm-6 col-xs-12 alert alert-danger oculto alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <strong>Erro!</strong> Não foi possível modificar esta Mídia.
                        </div>
                    </div>

                    <!-- nome,item,descricao,tipo(doc,audio,arquivo), data_publicacao,publicado_por -->
                    <form action="novamidia.php" method="post" class="form-horizontal">
                        <input type="hidden" id="token" value="<?=$session->lerValor(APP_TOKEN)?>" />
                        <input type="hidden" id="autor" value="<?=$usuario->codigo?>" />
                        <input type="hidden" id="arquivo" value="<?=$docs->item?>" />
                        <input type="hidden" id="anexo" value="<?=$docs->codigo?>" />
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Título <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="<?=$docs->nome?>" id="titulo" required="required" class="form-control cmp col-md-7 col-xs-12">
                                <p class="help-block oculto" id="msgErrorTitulo">É obrigatório escrever o título do documento.</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sobrenome">Descrição <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="descricao" required="required" class="form-control cmp col-md-7 col-xs-12"><?=$docs->descricao?></textarea>
                                <p class="help-block oculto" id="msgErrorDescricao">É obrigatório descrever o arquivo.</p>
                            </div>
                        </div>
                        <style type="text/css">
                            .bgreen {color:green;}
                        </style>
                        <div id="areaUpload" class="form-group">
                            <label for="fileSend" class="control-label col-md-3 col-sm-3 col-xs-12">Arquivo</label>
                            <div class="col-mfd-6 col-sm-6 col-xs-12">
                                <input id="fileSend" class="form-control col-md-7 cmp col-xs-12" type="file" name="middle-name">
                                <div id="progressbar" class="progress oculto">
                                    <div id="pgb" class="progress-bar progress-bar-success" role="progressbar" data-transitiongoal="0"></div>
                                </div>
                                <p id="msgUpOK" class="oculto bgreen help-block">Arquivo Definido</p>
                                <p id="msgUpNO" class="oculto help-block">Não foi possível definir o arquivo</p>
                                <p id="msgObrigatorio" class="oculto help-block">Você precisa enviar algum arquivo</p>
                            </div>
                        </div>
                        <br />
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <a href="index.php?pagina=<?=$request->get("retorno")?>" class="btn btn-primary">Retornar</a>
                                <button type="button" id="btnRegistro" class="btn btn-success">Modificar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
