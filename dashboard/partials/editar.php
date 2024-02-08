<?php

if(!defined("APP_ACCESS")) {
    die("Error");
}

$sqlSelect = "SELECT * FROM usuarios WHERE codigo=? LIMIT 1";
$params = array($request->get("codigo"));

$db->executar($sqlSelect,$params);
$auth = $db->resultado(APP_RESULTADO_OBJETOS)[0];
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
                            <strong>Sucesso!</strong> Usuário modificado.
                        </div>
                        <div id="msgErrorReg" class="col-lg-offset-3 col-sm-offset-3 col-md-6 col-sm-6 col-xs-12 alert alert-danger oculto alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <strong>Erro!</strong> Não foi possível modificar o usuário.
                        </div>
                    </div>
                    <form action="novoadmin.php" method="post" class="form-horizontal">
                        <input type="hidden" id="token" value="<?=$session->lerValor(APP_TOKEN)?>" />
                        <input type="hidden" id="codigo" value="<?=$request->get("codigo")?>" />
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for=""></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <h4>Você está alterando o usuário <strong><?=$auth->nome?></strong></h4>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="tipo" name="tipo"  class="form-control  cmp col-md-7 col-xs-12">
                                    <option value="<?=$auth->tipo?>" selected>Não alterar</option>
                                    <option value="editor">Editor</option>
                                    <option value="administrador">Administrador</option>
                                </select>
                                <p class="help-block oculto" id="msgErrorTipo">Selecione um tipo.</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="status" name="status"  class="form-control  cmp col-md-7 col-xs-12">
                                    <option value="<?=$auth->astatus?>" selected>Não alterar</option>
                                    <option value="ativo">Ativo</option>
                                    <option value="inativo">Inativo</option>
                                    <option value="novo">Reset</option>
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
