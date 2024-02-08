<?php

if(!defined("APP_ACCESS")) {
    die("Error");
}

$sqlUser = "SELECT codigo, nome FROM usuarios WHERE (astatus=? or astatus=?)";
$param = array("ativo","novo");

$db->executar($sqlUser,$param);
$usuarios = $db->resultado(APP_RESULTADO_OBJETOS);

?>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Logs de Usuários</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Logs de Usuário</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <form method="post" action="#" class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Usuário</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="usuario" required="required" class="form-control cmp col-md-7 col-xs-12">
                                        <option value="0">Escolha</option>
                                        <?php foreach($usuarios as $u) : ?>
                                        <option value="<?=$u->codigo?>"><?=$u->nome?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="divider"></div>
                    <div class="row">
                        <table id="tbLogs" class="table table-responsive table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Sessão</th>
                                    <th>Data</th>
                                    <th>IP</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody id="painel">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
