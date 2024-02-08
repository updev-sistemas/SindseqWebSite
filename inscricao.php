<?php
/**
 * p : Acesso Público
 * a : Acesso Administrativo
 */
define("APP_ACCESS", "p");
require_once("./system/app.inc.php");


$sqlSecretarias = "SELECT codigo,nome FROM secretarias ORDER BY nome ASC";
$db->executar($sqlSecretarias);
$secretarias = $db->resultado(APP_RESULTADO_OBJETOS);


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php require_once("./partials/head.inc.php"); ?>
    <link rel="stylesheet" type="text/css" href="./assets/css/jquery.realperson.css" />
    <style type="text/css">
        .map-wrapper {
            position: relative;
        }
        .map-wrapper .text {
            position: absolute;
            top: 70px;
            right: 100px;
            z-index: 2;
            width: 400px;
            height: 170px;
            padding:20px;
            background: #FFF;
            box-shadow: 0 0 3px rgba(0, 0, 0, 0.15);
        }

    </style>
</head>
<body>



<section class="wrapper">
    <div class="center">

        <?php require_once("./partials/superbar.inc.php"); ?>

        <?php require_once("./partials/navbar.inc.php"); ?>

        <div class="content_area">
            <div class="container-fluid">
                <div class="row clearfix" style="margin-top:30px;">
                    <div class="col-md-4">
                        <div class="contact_info">
                            <h5 class="list-title gray"><i class="icones-menu slashBarTitle"></i> <strong>Administrativo</strong></h5>
                            <div class="contact-info ">
                                <div class="address">
                                    <p class="p1">SINDSEQ - Sindicato dos Servidores Públicos de Quixeramobim.</p>
                                    <p class="p1">Rua Dias Ferreira, nº 50 - Centro </p>
                                    <p class="p1">Quixeramobim/Ce </p>
                                    <p>Email: administracao@sindseq.org.br</p>
                                    <p>Telefone: (88) 3441-0046</p>
                                    <p>&nbsp;</p>
                                    <div>
                                        <p><strong><a href="#">Estatuto</a></strong></p>
                                        <p><strong><a href="#">Lei Municipal</a></strong></p>
                                        <p><strong><a href="#">ATA de Abertura</a></strong></p>
                                    </div>
                                    <p>&nbsp;</p>
                                </div>
                            </div>
                            <div class="social-list">
                                <a target="_blank" href="https://www.facebook.com/Sindseq-312017649193856/"><i class="icones-facebook"></i></a>
                                <a target="_blank" href="https://plus.google.com/u/0/103602613690930575970"><i class="icones-gplus"></i></a>
                                <a target="_blank" href="https://instagram.com/nossosindseq"><i class="icones-instagram"></i></a>
                                <a target="_blank" href="https://twitter.com/sindseq"><i class="icones-twitter"></i></a>
                                <a target="_blank" href="https://www.youtube.com/channel/UCTkHXdvUZ7wLK8cix0PYpjA"><i class="icones-youtube"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="contact-form">
                            <h5 class="list-title gray"><i class="icones-menu slashBarTitle"></i> <strong>Ficha de Inscrição</strong></h5>
                            <p class="text-justify">
                                <strong>Atenção!</strong> Este espaço é voltado apenas para Servidores Públicos da Prefeitura de Quixeramobim/Ce.
                                Ao lançar suas informações, as mesmas serão analisadas e reguladas pela diretória.
                            </p>
                            <br />
                            <div id="msgSuccess" class="oculto alert alert-success fade in" role="alert">
                                <strong>Obrigado!</strong> Contato recebido, aguarde que em breve entraremos em contato com você.
                            </div>
                            <div id="msgError" class="oculto alert alert-danger fade in" role="alert">
                                <strong>Atenção!</strong> Não foi possível salvar o seu contato, tente novamente.
                            </div>

                            <form class="form-horizontal" method="post" id="frmInscricao">
                                <input type="hidden" name="token" id="token" value="<?=$session->lerValor(APP_TOKEN)?>" />
                                <input type="hidden" name="foto" id="foto" value="default.png" />
                                <fieldset>
                                    <div class="row">

                                        <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <span for="nome"><strong>Nome</strong> <sup>*</sup></span>
                                                        <input id="nome" name="name" type="text" placeholder="Seu Nome" class="form-control">
                                                        <p class="oculto hb helper-block" id="msgNomeInvalido">
                                                            Seu nome é obrigatório
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                        <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <span for="sobrenome"><strong>Sobrenome</strong> <sup>*</sup></span>
                                                        <input id="sobrenome" name="name" type="text" placeholder="Seu Sobrenome" class="form-control">
                                                        <p class="oculto hb helper-block" id="msgSobrenomeInvalido">
                                                            Seu sobrenome é obrigatório
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                        <div class="col-sm-9">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <span for="cpf"><strong>CPF</strong> <sup>*</sup></span>
                                                    <input id="cpf" name="cpf" type="text" placeholder="CPF" class="form-control">
                                                    <p class="oculto hb helper-block" id="msgCpfInvalido">
                                                        Este CPF é inválido ou está em já está em Uso.
                                                        Em caso de dúvidas entre em contato conosco por meio deste <strong><a href="contato.php">formulário</a></strong>.
                                                    </p>
                                                    <p class="oculto hb helper-block" id="msgCpfFaltando">
                                                        Seu CPF é necessário.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <span for="aniversario"><strong>Data de Nascimento</strong> <sup>*</sup></span>
                                                    <input id="aniversario" name="niver" type="text" placeholder="DD/MM/AAAA" class="form-control cmpdata">
                                                    <p class="oculto hb helper-block" id="msgNiverInvalido">
                                                        Sua data de nascimento é necessária.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <span for="rg"><strong>RG</strong> <sup>*</sup></span>
                                                    <input id="rg" name="rg" type="text" placeholder="Seu RG" class="form-control">
                                                    <p class="oculto hb helper-block" id="msgRgInvalido">
                                                        RG Inválido ou Já em Uso.
                                                        Em caso de dúvidas entre em contato conosco por meio deste <strong><a href="contato.php">formulário</a></strong>.
                                                    </p>
                                                    <p class="oculto hb helper-block" id="msgRgFaltando">
                                                        Seu CPF é necessário.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <span for="emissao"><strong>Emissão</strong> <sup>*</sup></span>
                                                    <input id="emissao" name="emissao" type="text" placeholder="DD/MM/AAAA" class="form-control cmpdata">
                                                    <p class="oculto hb helper-block" id="msgEmissaoInvalido">
                                                        A data de emissão do documento é obrigatório
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <span for="orgao"><strong>Orgão</strong> <sup>*</sup></span>
                                                    <input id="orgao" name="orgao" type="text" placeholder="SSP,SSPDC,..." class="form-control">
                                                    <p class="oculto hb helper-block" id="msgOrgaoInvalido">
                                                        O orgão de emissão do documento é obrigatório
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <span for="email"><strong>Email</strong></span>
                                                    <input id="email" name="name" type="email" placeholder="Seu E-Mail" class="form-control" />
                                                    <p class="oculto hb helper-block" id="msgEmailInvalido">
                                                        Este email já está em uso.
                                                        Em caso de dúvidas entre em contato conosco por meio deste <strong><a href="contato.php">formulário</a></strong>.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <span for="telefone"><strong>Telefone</strong></span>
                                                    <input id="telefone" name="telefone" type="text" placeholder="Telefone (**) 9999-9999" class="form-control cmpTelefone">
                                                    <p class="oculto hb helper-block" id="msgTelefoneInvalido">
                                                        Seu telefone é obrigatório
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <span for="celular"><strong>Celular</strong></span>
                                                    <input id="celular" name="celular" type="text" placeholder="Celular (**) 9 9999-9999" class="form-control cmpTelefone">
                                                    <p class="oculto hb helper-block" id="msgCelularInvalido">
                                                        Seu celular é obrigatório
                                                    </p>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <span for="sexo"><strong>Sexo</strong></span>
                                                    <select id="sexo"  class="form-control">
                                                        <option value="0" selected>Escolha seu Sexo</option>
                                                        <option value="f">Feminino</option>
                                                        <option value="m">Masculino</option>
                                                    </select>
                                                    <p class="oculto hb helper-block" id="msgSexoInvalido">
                                                        Seu sexo é obrigatório
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <span for="tipo"><strong>Vínculo</strong></span>
                                                    <select id="tipo"  class="form-control">
                                                        <option value="0" selected>Escolha </option>
                                                        <option value="efetivo">Efetivo </option>
                                                        <option value="comissionado">Comissionado </option>
                                                        <option value="contratado">Contratado </option>
                                                        <option value="seletivado">Seletivado </option>
                                                        <option value="cedido">Cedido</option>
                                                    </select>
                                                    <p class="oculto hb helper-block" id="msgVinculoInvalido">
                                                        Seu Vínculo é obrigatório
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <span for="escolaridade"><strong>Escolaridade</strong></span>
                                                    <select id="escolaridade"  class="form-control">
                                                        <option value="0">Sua Escolaridade</option>
                                                        <option value="analfabeto">Analfabeto</option>
                                                        <option value="fundamental1">Fundamental 1 (1º ao 4º Ano)</option>
                                                        <option value="fundamental2">Fundamental 2 (5º ao 9º Ano)</option>
                                                        <option value="medio">Médio</option>
                                                        <option value="tecnico">Médio Técnico</option>
                                                        <option value="graduado">Graduação</option>
                                                        <option value="especializacao">Especialização</option>
                                                        <option value="mestrado">Mestrado</option>
                                                        <option value="doutorado">Doutorado</option>
                                                    </select>
                                                    <p class="oculto hb helper-block" id="msgEscolaridadeInvalido">
                                                        Sua escolaridade é obrigatória
                                                    </p>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-sm-12">
                                            <div class="jumbotron">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <span for="enviarFoto"><strong>foto</strong></span>
                                                        <input id="enviarFoto" name="enviarFoto" type="file" accept="image/*"  />
                                                        <span id="saidaContador">0</span>/100% Enviado.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <span for="logradouro"><strong>Logradouro</strong> <sup>*</sup></span>
                                                    <input id="logradouro" name="logradouro" type="text" placeholder="Seu Endereço" class="form-control">
                                                    <p class="oculto hb helper-block" id="msgEnderecoInvalido">
                                                        Seu endereço é obrigatório
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <span for="complemento"><strong>Complemento</strong> <sup>*</sup></span>
                                                    <textarea id="complemento" name="complemento" placeholder="Use para complemento de seu endereço" class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <span for="cep"><strong>CEP</strong> <sup>*</sup></span>
                                                    <input id="cep" name="cep" type="text" placeholder="CEP (63800-000)" class="form-control">
                                                    <p class="oculto hb helper-block" id="msgCEPInvalido">
                                                        Seu CEP é obrigatório
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <span for="bairro"><strong>Bairro</strong> <sup>*</sup></span>
                                                    <input id="bairro" name="bairro" type="text" placeholder="Seu Bairro" class="form-control">
                                                    <p class="oculto hb helper-block" id="msgBairroInvalido">
                                                        Seu bairro é obrigatório
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <span for="cidade"><strong>Cidade</strong> <sup>*</sup></span>
                                                    <select id="cidade"  class="form-control">
                                                        <option value="Quixeramobim" selected>Quixeramobim</option>
                                                        <option value="Abaiara">Abaiara</option>
                                                        <option value="Acarape">Acarape</option>
                                                        <option value="Acaraú">Acaraú</option>
                                                        <option value="Acopiara">Acopiara</option>
                                                        <option value="Aiuaba">Aiuaba</option>
                                                        <option value="Alcântaras">Alcântaras</option>
                                                        <option value="Altaneira">Altaneira</option>
                                                        <option value="Alto Santo">Alto Santo</option>
                                                        <option value="Amontada">Amontada</option>
                                                        <option value="Antonina do Norte">Antonina do Norte</option>
                                                        <option value="Apuiarés">Apuiarés</option>
                                                        <option value="Aquiraz">Aquiraz</option>
                                                        <option value="Aracati">Aracati</option>
                                                        <option value="Aracoiaba">Aracoiaba</option>
                                                        <option value="Ararendá">Ararendá</option>
                                                        <option value="Araripe">Araripe</option>
                                                        <option value="Aratuba">Aratuba</option>
                                                        <option value="Arneiroz">Arneiroz</option>
                                                        <option value="Assaré">Assaré</option>
                                                        <option value="Aurora">Aurora</option>
                                                        <option value="Baixio">Baixio</option>
                                                        <option value="Banabuiú">Banabuiú</option>
                                                        <option value="Barbalha">Barbalha</option>
                                                        <option value="Barreira">Barreira</option>
                                                        <option value="Barro">Barro</option>
                                                        <option value="Barroquinha">Barroquinha</option>
                                                        <option value="Baturité">Baturité</option>
                                                        <option value="Beberibe">Beberibe</option>
                                                        <option value="Bela Cruz">Bela Cruz</option>
                                                        <option value="Boa Viagem">Boa Viagem</option>
                                                        <option value="Brejo Santo">Brejo Santo</option>
                                                        <option value="Camocim">Camocim</option>
                                                        <option value="Campos Sales">Campos Sales</option>
                                                        <option value="Canindé">Canindé</option>
                                                        <option value="Capistrano">Capistrano</option>
                                                        <option value="Caridade">Caridade</option>
                                                        <option value="Cariré">Cariré</option>
                                                        <option value="Caririaçu">Caririaçu</option>
                                                        <option value="Cariús">Cariús</option>
                                                        <option value="Carnaubal">Carnaubal</option>
                                                        <option value="Cascavel">Cascavel</option>
                                                        <option value="Catarina">Catarina</option>
                                                        <option value="Catunda">Catunda</option>
                                                        <option value="Caucaia">Caucaia</option>
                                                        <option value="Cedro">Cedro</option>
                                                        <option value="Chaval">Chaval</option>
                                                        <option value="Choró">Choró</option>
                                                        <option value="Chorozinho">Chorozinho</option>
                                                        <option value="Coreaú">Coreaú</option>
                                                        <option value="Crateús">Crateús</option>
                                                        <option value="Crato">Crato</option>
                                                        <option value="Croatá">Croatá</option>
                                                        <option value="Cruz">Cruz</option>
                                                        <option value="Deputado Irapuan Pinheiro">Deputado Irapuan Pinheiro</option>
                                                        <option value="Ererê">Ererê</option>
                                                        <option value="Eusébio">Eusébio</option>
                                                        <option value="Farias Brito">Farias Brito</option>
                                                        <option value="Forquilha">Forquilha</option>
                                                        <option value="Fortaleza">Fortaleza</option>
                                                        <option value="Fortim">Fortim</option>
                                                        <option value="Frecheirinha">Frecheirinha</option>
                                                        <option value="General Sampaio">General Sampaio</option>
                                                        <option value="Graça">Graça</option>
                                                        <option value="Granja">Granja</option>
                                                        <option value="Granjeiro">Granjeiro</option>
                                                        <option value="Groaíras">Groaíras</option>
                                                        <option value="Guaiúba">Guaiúba</option>
                                                        <option value="Guaraciaba do Norte">Guaraciaba do Norte</option>
                                                        <option value="Guaramiranga">Guaramiranga</option>
                                                        <option value="Hidrolândia">Hidrolândia</option>
                                                        <option value="Horizonte">Horizonte</option>
                                                        <option value="Ibaretama">Ibaretama</option>
                                                        <option value="Ibiapina">Ibiapina</option>
                                                        <option value="Ibicuitinga">Ibicuitinga</option>
                                                        <option value="Icapuí">Icapuí</option>
                                                        <option value="Icó">Icó</option>
                                                        <option value="Iguatu">Iguatu</option>
                                                        <option value="Independência">Independência</option>
                                                        <option value="Ipaporanga">Ipaporanga</option>
                                                        <option value="Ipaumirim">Ipaumirim</option>
                                                        <option value="Ipu">Ipu</option>
                                                        <option value="Ipueiras">Ipueiras</option>
                                                        <option value="Iracema">Iracema</option>
                                                        <option value="Irauçuba">Irauçuba</option>
                                                        <option value="Itaiçaba">Itaiçaba</option>
                                                        <option value="Itaitinga">Itaitinga</option>
                                                        <option value="Itapagé">Itapagé</option>
                                                        <option value="Itapipoca">Itapipoca</option>
                                                        <option value="Itapiúna">Itapiúna</option>
                                                        <option value="Itarema">Itarema</option>
                                                        <option value="Itatira">Itatira</option>
                                                        <option value="Jaguaretama">Jaguaretama</option>
                                                        <option value="Jaguaribara">Jaguaribara</option>
                                                        <option value="Jaguaribe">Jaguaribe</option>
                                                        <option value="Jaguaruana">Jaguaruana</option>
                                                        <option value="Jardim">Jardim</option>
                                                        <option value="Jati">Jati</option>
                                                        <option value="Jijoca de Jericoacoara">Jijoca de Jericoacoara</option>
                                                        <option value="Juazeiro do Norte">Juazeiro do Norte</option>
                                                        <option value="Jucás">Jucás</option>
                                                        <option value="Lavras da Mangabeira">Lavras da Mangabeira</option>
                                                        <option value="Limoeiro do Norte">Limoeiro do Norte</option>
                                                        <option value="Madalena">Madalena</option>
                                                        <option value="Maracanaú">Maracanaú</option>
                                                        <option value="Maranguape">Maranguape</option>
                                                        <option value="Marco">Marco</option>
                                                        <option value="Martinópole">Martinópole</option>
                                                        <option value="Massapê">Massapê</option>
                                                        <option value="Mauriti">Mauriti</option>
                                                        <option value="Meruoca">Meruoca</option>
                                                        <option value="Milagres">Milagres</option>
                                                        <option value="Milhã">Milhã</option>
                                                        <option value="Miraíma">Miraíma</option>
                                                        <option value="Missão Velha">Missão Velha</option>
                                                        <option value="Mombaça">Mombaça</option>
                                                        <option value="Monsenhor Tabosa">Monsenhor Tabosa</option>
                                                        <option value="Morada Nova">Morada Nova</option>
                                                        <option value="Moraújo">Moraújo</option>
                                                        <option value="Morrinhos">Morrinhos</option>
                                                        <option value="Mucambo">Mucambo</option>
                                                        <option value="Mulungu">Mulungu</option>
                                                        <option value="Nova Olinda">Nova Olinda</option>
                                                        <option value="Nova Russas">Nova Russas</option>
                                                        <option value="Novo Oriente">Novo Oriente</option>
                                                        <option value="Ocara">Ocara</option>
                                                        <option value="Orós">Orós</option>
                                                        <option value="Pacajus">Pacajus</option>
                                                        <option value="Pacatuba">Pacatuba</option>
                                                        <option value="Pacoti">Pacoti</option>
                                                        <option value="Pacujá">Pacujá</option>
                                                        <option value="Palhano">Palhano</option>
                                                        <option value="Palmácia">Palmácia</option>
                                                        <option value="Paracuru">Paracuru</option>
                                                        <option value="Paraipaba">Paraipaba</option>
                                                        <option value="Parambu">Parambu</option>
                                                        <option value="Paramoti">Paramoti</option>
                                                        <option value="Pedra Branca">Pedra Branca</option>
                                                        <option value="Penaforte">Penaforte</option>
                                                        <option value="Pentecoste">Pentecoste</option>
                                                        <option value="Pereiro">Pereiro</option>
                                                        <option value="Pindoretama">Pindoretama</option>
                                                        <option value="Piquet Carneiro">Piquet Carneiro</option>
                                                        <option value="Pires Ferreira">Pires Ferreira</option>
                                                        <option value="Poranga">Poranga</option>
                                                        <option value="Porteiras">Porteiras</option>
                                                        <option value="Potengi">Potengi</option>
                                                        <option value="Potiretama">Potiretama</option>
                                                        <option value="Quiterianópolis">Quiterianópolis</option>
                                                        <option value="Quixadá">Quixadá</option>
                                                        <option value="Quixelô">Quixelô</option>
                                                        <option value="Quixeré">Quixeré</option>
                                                        <option value="Redenção">Redenção</option>
                                                        <option value="Reriutaba">Reriutaba</option>
                                                        <option value="Russas">Russas</option>
                                                        <option value="Saboeiro">Saboeiro</option>
                                                        <option value="Salitre">Salitre</option>
                                                        <option value="Santa Quitéria">Santa Quitéria</option>
                                                        <option value="Santana do Acaraú">Santana do Acaraú</option>
                                                        <option value="Santana do Cariri">Santana do Cariri</option>
                                                        <option value="São Benedito">São Benedito</option>
                                                        <option value="São Gonçalo do Amarante">São Gonçalo do Amarante</option>
                                                        <option value="São João do Jaguaribe">São João do Jaguaribe</option>
                                                        <option value="São Luís do Curu">São Luís do Curu</option>
                                                        <option value="Senador Pompeu">Senador Pompeu</option>
                                                        <option value="Senador Sá">Senador Sá</option>
                                                        <option value="Sobral">Sobral</option>
                                                        <option value="Solonópole">Solonópole</option>
                                                        <option value="Tabuleiro do Norte">Tabuleiro do Norte</option>
                                                        <option value="Tamboril">Tamboril</option>
                                                        <option value="Tarrafas">Tarrafas</option>
                                                        <option value="Tauá">Tauá</option>
                                                        <option value="Tejuçuoca">Tejuçuoca</option>
                                                        <option value="Tianguá">Tianguá</option>
                                                        <option value="Trairi">Trairi</option>
                                                        <option value="Tururu">Tururu</option>
                                                        <option value="Ubajara">Ubajara</option>
                                                        <option value="Umari">Umari</option>
                                                        <option value="Umirim">Umirim</option>
                                                        <option value="Uruburetama">Uruburetama</option>
                                                        <option value="Uruoca">Uruoca</option>
                                                        <option value="Varjota">Varjota</option>
                                                        <option value="Várzea Alegre">Várzea Alegre</option>
                                                        <option value="Viçosa do Ceará">Viçosa do Ceará</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                 </div>

                             <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <span for="secretaria"><strong>Secretaria</strong></span>
                                                    <select id="secretaria"  class="form-control">
                                                        <option value="0">Escolha a secretaria</option>
                                                        <?php foreach($secretarias as $s) : ?>
                                                        <option value="<?=$s->codigo?>"><?=$s->nome?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <p class="oculto hb helper-block" id="msgSecretariaInvalido">
                                                        Você deve indicar a Secretaria na qual é subordinado
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <span for="setores"><strong>Setores</strong></span>
                                                    <select id="setores"  class="form-control">
                                                        <option value="0">Escolha o Setor</option>
                                                    </select>
                                                    <p class="oculto hb helper-block" id="msgSetoresInvalido">
                                                        Você deve informar o Setor na qual está lotado.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                 </div>
                                    <div class="row">

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <span for="matricula"><strong>Matricula</strong> <sup>*</sup></span>
                                                    <input id="matricula" name="matricula" type="text" placeholder="Sua Matricula" class="form-control">
                                                    <p class="oculto hb helper-block" id="msgMatriculaInvalido">
                                                        Esta Matricula já está em Uso.
                                                        Em caso de dúvidas entre em contato conosco por meio deste <strong><a href="contato.php">formulário</a></strong>.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div class="col-md-12 ">
                                                    <button type="button" id="btnSalvar" class="btn btn-primary btnReg">Registrar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php require_once("./partials/footer.inc.php"); ?>

<?php require_once("./partials/script.inc.php"); ?>

<script type="text/javascript" src="./assets/js/jquery.plugin.min.js"></script>
<script type="text/javascript" src="./assets/js/jquery.realperson.min.js"></script>
<script type="text/javascript" src="./assets/js/mask.js"></script>
<script type="text/javascript" src="./controllers/inscricao.js"></script>
</body>
</html>