<?php

if(!defined("APP_ACCESS")) {
    die("Error");
}


?>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Endereço do SINDSEQ</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Editar Endereço do Rodapé</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form class="form-horizontal">
                        <input type="hidden" id="token" value="<?=$session->lerValor(APP_TOKEN)?>" />
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Logradouro <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="logradouro" required="required" class="form-control cmp col-md-7 col-xs-12">
                                <p class="help-block oculto" id="msgErrorLogradouro">É obrigatório escrever o nome da rua e número.</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Bairro <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="bairro" required="required" class="form-control cmp col-md-7 col-xs-12">
                                <p class="help-block oculto" id="msgErrorBairro">É obrigatório escrever o nome do bairro.</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Cidade <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="cidade" required="required" class="form-control cmp col-md-7 col-xs-12">
                                <p class="help-block oculto" id="msgErrorCidade">É obrigatório escrever o nome da cidade.</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">CEP <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="cep" required="required" class="form-control cmp col-md-7 col-xs-12">
                                <p class="help-block oculto" id="msgErrorCep">É obrigatório escrever o CEP.</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Telefone <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="telefone" required="required" class="form-control cmp col-md-7 col-xs-12">
                                <p class="help-block" style="color:green;">Use o formato <strong>Descrição: (88) 9999-9999</strong> e separe os telefones por vírgula.</p>
                                <p class="help-block oculto" id="msgErrorTelefone">É obrigatório escrever o telefone.</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Email <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="email" required="required" class="form-control cmp col-md-7 col-xs-12">
                                <p class="help-block oculto" id="msgErrorEmail">É obrigatório escrever o email de contato principal.</p>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <a href="index.php" class="btn btn-primary">Cancelar</a>
                                <button type="button" id="btnSalvar" class="btn btn-success">Registrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
