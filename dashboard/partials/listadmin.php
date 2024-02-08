<?php

if(!defined("APP_ACCESS")) {
    die("Error");
}


$sqlList = "SELECT codigo,nome,sobrenome,email,login,astatus,tipo FROM usuarios WHERE (codigo<>? AND codigo<>?) AND ustatus<>? ORDER BY nome ASC";
$db->executar($sqlList,array(1,$usuario->codigo,'removido'));
$lista = $db->resultado(APP_RESULTADO_OBJETOS);

?>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Lista de Administradores e Editores</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Lista</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div id="msgSuccessRm" class="col-md-12 col-sm-12 col-xs-12 alert alert-success oculto alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <strong>Sucesso!</strong> Usuário removido.
                        </div>
                        <div id="msgErrorRm" class="col-md-12 col-sm-12 col-xs-12 alert alert-danger oculto alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <strong>Erro!</strong> Não foi possível remover o usuario.
                        </div>
                    </div>
                    <table id="tbListAdmin" class="table table-responsive table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Login</th>
                                <th>Status</th>
                                <th>Tipo</th>
                                <th>Ação</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($lista as $l) : ?>
                            <tr id="u<?=$l->codigo?>">
                                 <td><?=($l->nome . " " . $l->sobrenome)?></td>
                                 <td><?=$l->email?></td>
                                 <td><?=$l->login?></td>
                                 <td><?=strtoupper($l->astatus)?></td>
                                 <td><?=strtoupper($l->tipo)?></td>
                                 <td><a href="index.php?pagina=editar&codigo=<?=$l->codigo?>" class="btn btn-primary">Editar</a></td>
                                 <td><button type="button" class="btn btn-danger btn-excluir" usuario="<?=$l->codigo?>">Remover</button></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>