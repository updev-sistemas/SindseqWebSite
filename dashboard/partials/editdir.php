<?php

if(!defined("APP_ACCESS")) {
    die("Error");
}


$SQL = "SELECT * FROM diretoria WHERE id=? LIMIT 1";
$params = array($request->get("cod"));

$db->executar($SQL,$params);
$membro = $db->resultado(APP_RESULTADO_OBJETOS)[0];

?>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Editar Membro</h3>
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
                            <strong>Sucesso!</strong> Membro Atualizado.
                        </div>
                        <div id="msgErrorReg" class="col-lg-offset-3 col-sm-offset-3 col-md-6 col-sm-6 col-xs-12 alert alert-danger oculto alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <strong>Erro!</strong> Não foi possível atualizar o membro.
                        </div>
                    </div>
                    <form action="novoadmin.php" method="post" class="form-horizontal">
                        <input type="hidden" id="token" value="<?=$session->lerValor(APP_TOKEN)?>" />
                        <input type="hidden" id="foto" value="<?=$membro->foto?>" />
                        <input type="hidden" id="codigo" value="<?=$membro->id?>" />
                        <input type="hidden" id="posicao" value="<?=$membro->posicao?>" />
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Nome <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="<?=$membro->nome?>" id="nome" required="required" class="form-control cmp col-md-7 col-xs-12">
                                <p class="help-block oculto" id="msgErrorNome">É obrigatório escrever o nome do usuário.</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sobrenome">Cargo <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input value="<?=$membro->cargo?>" type="text" id="cargo" name="last-name" required="required" class="form-control cmp col-md-7 col-xs-12">
                                <p class="help-block oculto" id="msgErrorCargo">É obrigatório escrever o cargo do membro.</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="email" value="<?=$membro->email?>" class="form-control col-md-7 cmp col-xs-12" type="text" name="middle-name">
                                <p class="help-block oculto" id="msgErrorEmail">Este email já está em uso, tente outro.</p>
                                <p class="help-block oculto" id="msgErrorEmail2">É obrigatório um email.</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="control-label col-md-3 col-sm-3 col-xs-12">Sobre</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="sobre" class="form-control col-md-7  cmp col-xs-12" type="text" name="middle-name"><?=$membro->sobre?></textarea>
                                <p class="help-block oculto" id="msgErrorSobre">Digite algo sobre este membro.</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="control-label col-md-3 col-sm-3 col-xs-12">Iniciou em</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="<?=Data::cal($membro->data_inicio)?>" id="data1" class="form-control cmp col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="control-label col-md-3 col-sm-3 col-xs-12">Terminará em</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="<?=Data::cal($membro->data_final)?>" id="data2" class="form-control cmp col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Facebook <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="<?=$membro->facebook?>" id="facebook" class="form-control cmp col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Instagram <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="<?=$membro->instagram?>" id="instagram" class="form-control cmp col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Google Plus <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="<?=$membro->googleplus?>" id="googleplus" required="required" class="form-control cmp col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Twitter <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="twitter" value="<?=$membro->twitter?>" class="form-control cmp col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Foto <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" id="fotoperfil" accept="image/*" class="form-control cmp col-md-7 col-xs-12">
                                <p class="help-block oculto msgpht" id="msgFotoDefinida">Foto Definida</p>
                                <p class="help-block oculto msgpht" id="msgFotoNaoDefinida">Foto Não Definida.</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Foto <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="status" class="form-control cmp col-md-7 col-xs-12">
                                    <option value="<?=$membro->dstatus?>" selected>Não alterar</option>
                                    <option value="ativo">Ativo</option>
                                    <option value="inativo">Inativo</option>
                                </select>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <a href="index.php?pagina=diretoria" class="btn btn-primary">Cancelar</a>
                                <button type="button" id="btnRmFoto" class="btn btn-warning">Remover Foto</button>
                                <button type="button" id="btnRegistro" class="btn btn-success">Registrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
