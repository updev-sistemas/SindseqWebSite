<?php

if(!defined("APP_ACCESS")) {
    die("Error");
}

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
                            <strong>Sucesso!</strong> Mídia definida.
                        </div>
                        <div id="msgErrorReg" class="col-lg-offset-3 col-sm-offset-3 col-md-6 col-sm-6 col-xs-12 alert alert-danger oculto alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <strong>Erro!</strong> Não foi possível registrar esta Mídia.
                        </div>
                    </div>

                    <!-- nome,item,descricao,tipo(doc,audio,arquivo), data_publicacao,publicado_por -->
                    <form action="novamidia.php" method="post" class="form-horizontal">
                        <input type="hidden" id="token" value="<?=$session->lerValor(APP_TOKEN)?>" />
                        <input type="hidden" id="autor" value="<?=$usuario->codigo?>" />
                        <input type="hidden" id="referente" value="-" />
                        <input type="hidden" id="arquivo" value="-" />
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Título <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="titulo" required="required" class="form-control cmp col-md-7 col-xs-12">
                                <p class="help-block oculto" id="msgErrorTitulo">É obrigatório escrever o título do documento.</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nomeArq">Nome do Arquivo <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="nomeArq" required="required" class="form-control cmp col-md-7 col-xs-12">
                                <p class="help-block oculto" id="msgErrorTitulo">É obrigatório escrever o nome do documento.</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sobrenome">Descrição <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="descricao" required="required" class="form-control cmp col-md-7 col-xs-12"></textarea>
                                <p class="help-block oculto" id="msgErrorDescricao">É obrigatório descrever o arquivo.</p>
                            </div>
                        </div>
                        <style type="text/css">
                            .bgreen {color:green;}
                        </style>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="tipo" name="tipo"  class="form-control  cmp col-md-7 col-xs-12">
                                    <option value="-" selected>Escolha</option>
                                    <option value="d">Documento</option>
                                    <option value="a">Áudio</option>
                                    <option value="f">Arquivo</option>
                                </select>
                                <p class="help-block oculto" id="msgErrorTipo">Selecione um tipo.</p>
                                <p id="td" class="help-block rrr bgreen oculto">
                                    <strong>Permitidos</strong> - Documentos (txt, doc, docx, xls, xlsx, ppt, pptx, pdf, odt, ods, odp, pdf)
                                </p>
                                <p id="ta" class="help-block rrr bgreen oculto">
                                    <strong>Permitidos</strong> - Áudios (mp3, wma, wav)
                                </p>
                                <p id="tq" class="help-block rrr bgreen oculto">
                                    <strong>Permitidos</strong> - Arquivos compactados (zip, rar)
                                </p>
                            </div>
                        </div>
                        <div id="areaUpload" class="form-group oculto">
                            <label for="fileSend" class="control-label col-md-3 col-sm-3 col-xs-12">Arquivo</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
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
                                <a href="index.php?pagina=inicio" class="btn btn-primary">Cancelar</a>
                                <button type="button" id="btnRegistro" class="btn btn-success">Registrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
