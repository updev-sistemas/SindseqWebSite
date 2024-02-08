<?php

if(!defined("APP_ACCESS")) {
    die("Error");
}

function verMes($m) {
    switch($m) {
        case 1 : { return "Janeiro"; }
        case 2 : { return "Fevereiro"; }
        case 3 : { return "Março"; }
        case 4 : { return "Abril"; }
        case 5 : { return "Maio"; }
        case 6 : { return "Junho"; }
        case 7 : { return "Julho"; }
        case 8 : { return "Agosto"; }
        case 9 : { return "Setembro"; }
        case 10 : { return "Outubro"; }
        case 11 : { return "Novembro"; }
        case 12 : { return "Dezembro"; }
    }
}


$sqlList = "SELECT * FROM feriados ORDER BY ano,mes,dia ASC";
$db->executar($sqlList,array(1,$usuario->codigo));
$lista = $db->resultado(APP_RESULTADO_OBJETOS);

?>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Lista de Feriados</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Novo Feriado</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div id="msgs" class="col-md-12 col-sm-12 col-xs-12 alert alert-success oculto alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <strong>Sucesso!</strong> Feriado registrado.
                        </div>
                        <div id="msge" class="col-md-12 col-sm-12 col-xs-12 alert alert-danger oculto alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <strong>Erro!</strong> Não foi possível registrar o feriado.
                        </div>
                    </div>
                    <div class="row">

                    </div>
                    <form action="novoadmin.php" method="post" class="form-horizontal">
                        <input type="hidden" id="token" value="<?=$session->lerValor(APP_TOKEN)?>" />
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Titulo <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="nome" required="required" class="form-control cmp col-md-7 col-xs-12">
                                <p class="help-block oculto" id="msgTitulo">É obrigatório escrever o nome do feriado.</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sobrenome">Dia <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="dia" class="form-control">
                                    <option value="0" selected>Escolha</option>
                                    <?php for($i = 1; $i <= 31; $i++) : ?>
                                    <option value="<?=$i?>"><?=$i?></option>
                                    <?php endfor; ?>
                                </select>
                                <p class="help-block oculto" id="msgDia">É obrigatório definir o dia do feriado.</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">Mês</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="mes" class="form-control">
                                    <option value="0" selected>Escolha</option>
                                    <option value="1">Janeiro</option>
                                    <option value="2">Fevereiro</option>
                                    <option value="3">Março</option>
                                    <option value="4">Abril</option>
                                    <option value="5">Maio</option>
                                    <option value="6">Junho</option>
                                    <option value="7">Julho</option>
                                    <option value="8">Agosto</option>
                                    <option value="9">Setembro</option>
                                    <option value="10">Outubro</option>
                                    <option value="11">Novembro</option>
                                    <option value="12">Dezembro</option>
                                </select>
                                <p class="help-block oculto" id="msgMes">É obrigatório escrever o mês do feriado.</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ano" class="control-label col-md-3 col-sm-3 col-xs-12">Ano</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="ano" class="form-control col-md-7  cmp col-xs-12" type="text" name="middle-name">
                                <p class="help-block oculto" id="msgAno">É obrigatório escrever o ano do feriado.</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="repete" class="control-label col-md-3 col-sm-3 col-xs-12">Repete Data</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="repete" class="form-control">
                                    <option value="n" selected>Não</option>
                                    <option value="s">Sim</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="button" id="btnRegistro" class="btn btn-success">Registrar</button>
                            </div>
                        </div>
                    </form>

                    <div class="ln_solid"></div>
                    </div>
                    <div class="row">
                        <table id="tbLista" class="table table-responsive table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Título</th>
                            <th>Data</th>
                            <th>Ação</th>
                        </tr>
                        </thead>
                        <tbody id="areaFeriados">
                        <?php foreach($lista as $l) : ?>
                            <tr id="linha<?=$l->id?>">
                                <td><?=$l->titulo?></td>
                                <td><?=($l->dia . " de " . verMes($l->mes))?></td>
                                <td><button type="button" class="btn btn-danger btn-excluir" feriado="<?=$l->id?>">Remover</button></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>