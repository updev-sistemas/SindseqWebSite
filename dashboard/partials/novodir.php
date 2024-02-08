<?php

if(!defined("APP_ACCESS")) {
    die("Error");
}


?>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Novo Membro</h3>
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
                            <strong>Sucesso!</strong> Membro registrado.
                        </div>
                        <div id="msgErrorReg" class="col-lg-offset-3 col-sm-offset-3 col-md-6 col-sm-6 col-xs-12 alert alert-danger oculto alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <strong>Erro!</strong> Não foi possível registrar o <membro></membro>.
                        </div>
                    </div>
                    <form action="novoadmin.php" method="post" class="form-horizontal">
                        <input type="hidden" id="token" value="<?=$session->lerValor(APP_TOKEN)?>" />
                        <input type="hidden" id="usuariocod" value="<?=$usuario->codigo?>" />
                        <input type="hidden" id="foto" value="default.png" />
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Nome
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="nome" required="required" class="form-control cmp col-md-7 col-xs-12">
                                <p class="help-block oculto" id="msgErrorNome">É obrigatório escrever o nome do usuário.</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sobrenome">Cargo
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="cargo" name="last-name" required="required" class="form-control cmp col-md-7 col-xs-12">
                                <p class="help-block oculto" id="msgErrorCargo">É obrigatório escrever o cargo do membro.</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="email" class="form-control col-md-7 cmp col-xs-12" type="text" name="middle-name">
                                <p class="help-block oculto" id="msgErrorEmail">Digite o email para contato deste membro.</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="control-label col-md-3 col-sm-3 col-xs-12">Sobre</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="sobre" class="form-control col-md-7  cmp col-xs-12" type="text" name="middle-name"></textarea>
                                <p class="help-block oculto" id="msgErrorSobre">Digite algo sobre este membro.</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="control-label col-md-3 col-sm-3 col-xs-12">Iniciou em</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="data1" class="form-control cmp col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="control-label col-md-3 col-sm-3 col-xs-12">Terminará em</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="data2" class="form-control cmp col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Facebook
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="facebook" class="form-control cmp col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Instagram
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="instagram" class="form-control cmp col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Google Plus
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="googleplus" required="required" class="form-control cmp col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Twitter
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="twitter" class="form-control cmp col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Foto
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" id="fotoperfil" accept="image/*" class="form-control cmp col-md-7 col-xs-12">
                                <p class="help-block oculto" id="msgFotoDefinida">Foto Definida</p>
                                <p class="help-block oculto" id="msgFotoNaoDefinida">É obrigatório escrever o nome do usuário.</p>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <a href="index.php?pagina=diretoria" class="btn btn-primary">Cancelar</a>
                                <button type="button" id="btnRegistro" class="btn btn-success">Registrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
