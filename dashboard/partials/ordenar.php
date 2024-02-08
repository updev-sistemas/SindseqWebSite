<?php

if(!defined("APP_ACCESS")) {
    die("Error");
}



    $SQL = "SELECT id,nome,cargo FROM diretoria WHERE dstatus=?";
    $params = array('ativo');

    $db->executar($SQL,$params);
    $membros = $db->resultado(APP_RESULTADO_OBJETOS);
    $quantidade = $db->qtdRegistros();


?>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Ordenar Membros</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Registros</h2>
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
                        <table class="table table-responsive table-bordered table-striped">
                            <thead>
                                <th>Posição</th>
                                <th>Membro</th>
                            </thead>
                            <tbody>
                            <?php for($i = 0; $i < $quantidade; $i++) : ?>
                                <tr>
                                    <td>
                                        <span><?=($i+1)?> º</span>
                                    </td>
                                    <td>
                                        <select id="posicao<?=$i?>" class="form-control posicao">
                                            <option value="0">Escolha</option>
                                            <?php for($f = 0; $f < $quantidade; $f++) : ?>
                                                <option value="<?=$membros[$f]->id?>"><?=$membros[$f]->nome?> - <?=$membros[$f]->cargo?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </td>
                                </tr>
                            <?php endfor; ?>
                            </tbody>
                        </table>

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