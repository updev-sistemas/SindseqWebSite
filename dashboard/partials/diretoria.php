<?php

if(!defined("APP_ACCESS")) {
    die("Error");
}

$sqlDiretoria = "SELECT * FROM diretoria";
$db->executar($sqlDiretoria);
$diretoria = $db->resultado(APP_RESULTADO_OBJETOS);

?>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Diretória</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>
                        Lista de Pessoas
                        <a class="btn btn-success" href="index.php?pagina=novodir"><i class="fa fa-plus"></i> Novo</a>
                        <a class="btn btn-primary" href="index.php?pagina=ordenar"><i class="fa fa-exchange"></i> Ordenar</a>
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 text-center"></div>

                        <div class="clearfix"></div>
                        <?php foreach($diretoria as $d): ?>
                        <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                            <div class="well profile_view">
                                <div class="col-sm-12">
                                    <h4 class="brief"><i><?=$d->cargo?></i></h4>
                                    <div class="left col-xs-7">
                                        <h2><?=$d->nome?></h2>
                                        <p><?=$d->sobre?></p>
                                        <ul class="list-unstyled">
                                            <li style="display:inline;padding-left:5px;padding-right:5px;"><i class="fa fa-facebook"></i></li>
                                            <li style="display:inline;padding-left:5px;padding-right:5px;"><i class="fa fa-twitter"></i></li>
                                            <li style="display:inline;padding-left:5px;padding-right:5px;"><i class="fa fa-instagram"></i></li>
                                            <li style="display:inline;padding-left:5px;padding-right:5px;"><i class="fa fa-google-plus"></i></li>
                                            <li style="display:inline;padding-left:5px;padding-right:5px;"><i class="fa fa-envelope"></i></li>
                                        </ul>
                                    </div>
                                    <div class="right col-xs-5 text-center">
                                        <img src="../storage/perfil/<?=$d->foto?>" alt="<?=$e->nome?>" class="img-circle img-responsive">
                                    </div>
                                </div>
                                <div class="col-xs-12 bottom text-center">
                                    <div class="col-xs-12 col-sm-12 col-lg-12 col-md-12 emphasis">
                                        <a href="index.php?pagina=editdir&cod=<?=$d->id?>" class="btn btn-primary btn-xs">
                                            <i class="fa fa-edit"> </i> Editar
                                        </a>
                                        <button type="button" class="btn btn-danger btn-excluir btn-xs" diretor="<?=$d->id?>">
                                            <i class="fa fa-close"> </i> Desativar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

