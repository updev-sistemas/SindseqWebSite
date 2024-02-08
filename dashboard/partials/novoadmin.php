<?php

if(!defined("APP_ACCESS")) {
    die("Error");
}


?>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Novo Usuário</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Registro</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div id="msgSuccessReg" class="col-lg-offset-3 col-sm-offset-3 col-md-6 col-sm-6 col-xs-12 alert alert-success oculto alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <strong>Sucesso!</strong> Usuário registrado. Utilize a senha <strong>Sind1234</strong>.
                        </div>
                        <div id="msgErrorReg" class="col-lg-offset-3 col-sm-offset-3 col-md-6 col-sm-6 col-xs-12 alert alert-danger oculto alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <strong>Erro!</strong> Não foi possível registrar o usuário.
                        </div>
                    </div>
                    <form action="novoadmin.php" method="post" class="form-horizontal">
                        <input type="hidden" id="token" value="<?=$session->lerValor(APP_TOKEN)?>" />
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Nome <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="nome" required="required" class="form-control cmp col-md-7 col-xs-12">
                                <p class="help-block oculto" id="msgErrorNome">É obrigatório escrever o nome do usuário.</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sobrenome">Sobrenome <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="sobrenome" name="last-name" required="required" class="form-control cmp col-md-7 col-xs-12">
                                <p class="help-block oculto" id="msgErrorSobrenome">É obrigatório escrever o sobrenome do usuário.</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="email" class="form-control col-md-7 cmp col-xs-12" type="text" name="middle-name">
                                <p class="help-block oculto" id="msgErrorEmail">Este email já está em uso, tente outro.</p>
                                <p class="help-block oculto" id="msgErrorEmail2">É obrigatório um email.</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="control-label col-md-3 col-sm-3 col-xs-12">Username</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="username" class="form-control col-md-7  cmp col-xs-12" type="text" name="middle-name">
                                <p class="help-block oculto" id="msgErrorUser">Este usuário já existe, tente outro.</p>
                                <p class="help-block oculto" id="msgErrorUser2">É obrigatório um username.</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="tipo" name="tipo"  class="form-control  cmp col-md-7 col-xs-12">
                                    <option value="-" selected>Escolha</option>
                                    <option value="e">Editor</option>
                                    <option value="a">Administrador</option>
                                </select>
                                <p class="help-block oculto" id="msgErrorTipo">Selecione um tipo.</p>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <a href="index.php?pagina=listadmin" class="btn btn-primary">Cancelar</a>
                                <button type="button" id="btnRegistro" class="btn btn-success">Registrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
