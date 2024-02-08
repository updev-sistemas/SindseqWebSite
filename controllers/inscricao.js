$(function(){


    function validarCpf( cpf ) {

        cpf = cpf.replace(/[^\d]+/g,'');
        if(cpf == '') return false;
        if (cpf.length != 11 || cpf == "00000000000" || cpf == "11111111111" || cpf == "22222222222" || cpf == "33333333333" || cpf == "44444444444" || cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" || cpf == "88888888888" || cpf == "99999999999")
            return false;

        add = 0;
        for (i=0; i < 9; i ++)
            add += parseInt(cpf.charAt(i)) * (10 - i);
        rev = 11 - (add % 11);
        if (rev == 10 || rev == 11)
            rev = 0;
        if (rev != parseInt(cpf.charAt(9)))
            return false;
        add = 0;
        for (i = 0; i < 10; i ++)
            add += parseInt(cpf.charAt(i)) * (11 - i);
        rev = 11 - (add % 11);
        if (rev == 10 || rev == 11)
            rev = 0;
        if (rev != parseInt(cpf.charAt(10)))
            return false;
        return true;
    }

    function consultarCpf(cpf) {
        var dados = {
            token: $("#token").val(),
            acao: 'vcpf',
            cpf: cpf
        };
        $.ajax({
            url:"./ajax/cadastro.ajax.php",
            method:"post",
            data:dados,
            dataType:"html",
            beforeSend:function(){

            },
            complete:function(){

            },
            success:function(resposta) {
                if(resposta==='ok') {

                } else if(resposta==='error') {
                    $("#cpf").val("");
                    alert("Ocorreu um erro no servidor, aguarde um instante!");
                } else {
                    $("#cpf").val("");
                    $("#msgCpfInvalido").show();
                }
            },
            error:function(resposta) {

            }
        });
    }

    function validarEmail(email) {
        var dados = {
            token: $("#token").val(),
            acao: 'vml',
            email: email
        };
        $.ajax({
            url:"./ajax/cadastro.ajax.php",
            method:"post",
            data:dados,
            dataType:"html",
            beforeSend:function(){

            },
            complete:function(){

            },
            success:function(resposta) {
                if(resposta==='ok') {

                } else if(resposta==='error') {
                    $("#email").val("");
                    alert("Ocorreu um erro no servidor, aguarde um instante!");
                } else {
                    $("#email").val("");
                    $("#msgEmailInvalido").show();
                }
            },
            error:function(resposta) {

            }
        });
    }

    function consultarRG(rg){
        var dados = {
            token: $("#token").val(),
            acao: 'vmrg',
            rg: rg
        };
        $.ajax({
            url:"./ajax/cadastro.ajax.php",
            method:"post",
            data:dados,
            dataType:"html",
            beforeSend:function(){

            },
            complete:function(){

            },
            success:function(resposta) {
                if(resposta==='ok') {

                } else if(resposta==='error') {
                    $("#rg").val("");
                    alert("Ocorreu um erro no servidor, aguarde um instante!");
                } else {
                    $("#rg").val("");
                    $("#msgRgInvalido").show();
                }
            },
            error:function(resposta) {

            }
        });
    }

    function consultarMatricula(valor) {
        var dados = {
            token: $("#token").val(),
            acao: 'vmt',
            matricula: valor
        };
        $.ajax({
            url:"./ajax/cadastro.ajax.php",
            method:"post",
            data:dados,
            dataType:"html",
            beforeSend:function(){

            },
            complete:function(){

            },
            success:function(resposta) {
                if(resposta==='ok') {

                } else if(resposta==='error') {
                    $("#matricula").val("");
                    alert("Ocorreu um erro no servidor, aguarde um instante!");
                } else {
                    $("#matricula").val("");
                    $("#msgMatriculaInvalido").show();
                }
            },
            error:function(resposta) {

            }
        });
    }

    function limpar() {
        $(".form-control").val("");
    }


    $(".cmpdata").mask("99/99/9999").blur(function(){
        var data = $(this).val(),
            reg = /^(((0[1-9]|[12]\d|3[01])\/(0[13578]|1[02])\/((19|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)\/(0[13456789]|1[012])\/((19|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])\/02\/((19|[2-9]\d)\d{2}))|(29\/02\/((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$/g,
            flag = reg.test(data);
        if(!flag) {
            $(this).val("");
        }
    });

    $("#enviarFoto").change(function(){
        console.log("modificado a foto");
        var fd = new FormData();
        fd.append("token",$("#token").val());
        fd.append("acao","foto");
        fd.append("imagem", this.files[0]);

        $.ajax({
            url:'./ajax/cadastro.ajax.php',
            type:'POST',
            dataType:'json',
            data:fd,
            processData:false,
            contentType:false,
            beforeSend:function(){
            },
            xhr:function(){
                var xhr = $.ajaxSettings.xhr();
                if(xhr.upload) {
                    xhr.upload.addEventListener('progress',function(evento){
                        var pc = 0,
                            position = evento.loaded || evento.position,
                            total = evento.total;

                        if(evento.lengthComputable) {
                            pc = Math.ceil((position/total)*100);
                            $("#saidaContador").html(pc);
                        }
                    });
                }
                return xhr;
            },
            success:function(e){
                if(e.resposta==='ok') {
                    $('#foto').val(e.nome);
                    $('#msgBannerDOK1').show();
                } else {
                    $('#foto').val('default.png');
                    $('#msgBannerDNO1').show();
                }
            }
        });
    });

    var NonoDigito = function (val) {
            return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
        },
        NonoDigitoOpcoes = {
            onKeyPress: function(val, e, field, options) {
                field.mask(NonoDigito.apply({}, arguments), options);
            }
        };

    $(".cmpTelefone").mask(NonoDigito, NonoDigitoOpcoes);

    $("#cpf").mask("999.999.999-99").blur(function(){
        var cpf = $(this).val().replace(/[^\d]+/g, "");
        if(cpf.length===11) {
            var flag = validarCpf(cpf);
            if(flag) {
                consultarCpf(cpf);
            } else {
                $("#cpf").val("");
                $("#msgCpfInvalido").show();
            }
        } else {
            $("#cpf").val("");
        }
    }).focus(function(){
        $("#msgCpfInvalido").hide();
    });

    $("#rg").blur(function(){
        var rg = $(this).val().replace(/[^\d]+/g, "");
        if(rg.length>11) {
           consultarRG(rg);
        }
    }).focus(function(){
        $("#msgRgInvalido").hide();
    });



    $("#matricula").blur(function(){
        var matricula = $(this).val();
        if(matricula.length>0) {
            consultarMatricula(matricula);
        } else {
            $("#matricula").val("");
        }
    }).focus(function(){
        $("#msgMatriculaInvalido").hide();
    });


    $("#email").blur(function(){
        var email = $(this).val();
        if(email.length>0) {
            validarEmail(email);
        }
    }).focus(function(){
        $("#msgEmailInvalido").hide();
    });

    $("#cep").mask("99999-999");

    $("#secretaria").change(function(){
        var dados = {
            acao:'lst1',
            token:$("#token").val(),
            secretaria:$(this).val()
        };
        $.ajax({
            url:"./ajax/cadastro.ajax.php",
            method:"post",
            data:dados,
            dataType:"json",
            beforeSend:function(){

            },
            complete:function(){

            },
            success:function(resposta) {
                if(resposta!=='no') {
                    var lista = '<option value="0">Escolha</option>';
                    resposta.forEach(function(obj,chave){
                        var row = '<option value="'+obj.codigo+'">'+obj.nome+'</option>';
                            lista += row;
                    });
                    $("#setores").children().remove();
                    $("#setores").append(lista);
                }
            },
            error:function(resposta) {

            }
        });
    });

    function validar() {
        var flag = true;
        $(".help-block").hide();

        if($("#nome").val()==='') {
            $("#msgNomeInvalido").show();
            flag &= false;
        }

        if($("#sobrenome").val()==='') {
            $("#msgSobrenomeInvalido").show();
            flag &= false;
        }

        if($("#cpf").val()==='') {
            $("#msgCpfFaltando").show();
            flag &= false;
        }

        if($("#aniversario").val()==='') {
            $("#msgNiverInvalido").show();
            flag &= false;
        }

        if($("#rg").val()==='') {
            $("#msgRgFaltando").show();
            flag &= false;
        }

        if($("#emissao").val()==='') {
            $("#msgEmissaoInvalido").show();
            flag &= false;
        }

        if($("#orgao").val()==='') {
            $("#msgOrgaoInvalido").show();
            flag &= false;
        }

        if($("#telefone").val()==='') {
            $("#msgTelefoneInvalido").show();
            flag &= false;
        }

        if($("#celular").val()==='') {
            $("#msgCelularInvalido").show();
            flag &= false;
        }

        if($("#sexo").val()===0) {
            $("#msgSexoInvalido").show();
            flag &= false;
        }

        if($("#vinculo").val()===0) {
            $("#msgVinculoInvalido").show();
            flag &= false;
        }

        if($("#escolaridade").val()===0) {
            $("#msgEscolaridadeInvalido").show();
            flag &= false;
        }

        if($("#logradouro").val()==='') {
            $("#msgEnderecoInvalido").show();
            flag &= false;
        }

        if($("#cep").val()==='') {
            $("#msgCepInvalido").show();
            flag &= false;
        }

        if($("#bairro").val()===0) {
            $("#msgBairroInvalido").show();
            flag &= false;
        }

        if($("#escolaridade").val()===0) {
            $("#msgEscolaridadeInvalido").show();
            flag &= false;
        }

        if($("#secretaria").val()===0) {
            $("#msgSecretariaInvalido").show();
            flag &= false;
        }

        if($("#setores").val()===0) {
            $("#msgSetoresInvalido").show();
            flag &= false;
        }

        if($("#matricula").val()===0) {
            $("#msgMatriculaInvalido").show();
            flag &= false;
        }

        return flag;
    }

    function salvar() {
        var dados = {
            token:$("#token").val(),
            acao:'novo',
            nome:$("#nome").val(),
            sobrenome:$("#sobrenome").val(),
            cpf:$("#cpf").val().replace(/[^\d]+/g, ""),
            aniversario:$("#aniversario").val(),
            rg:$("#rg").val(),
            emissao:$("#emissao").val(),
            orgao:$("#orgao").val(),
            email:$("#email").val(),
            telefone:$("#telefone").val(),
            celular:$("#celular").val(),
            sexo:$("#sexo").val(),
            vinculo:$("#tipo").val(),
            escolaridade:$("#escolaridade").val(),
            foto:$("#foto").val(),
            endereco:$("#logradouro").val(),
            complemento:$("#complemento").val(),
            cep:$("#cep").val(),
            bairro:$("#bairro").val(),
            cidade:$("#cidade").val(),
            setor:$("#setores").val(),
            matricula:$("#matricula").val()
        };

        $.ajax({
            url:"./ajax/cadastro.ajax.php",
            method:"post",
            data:dados,
            dataType:"html",
            beforeSend:function(){
                $(".alert").hide();
            },
            success:function(response) {
                if(response==='ok') {
                    $("#msgSuccess").show();
                    $("#nome").focus();
                    limpar();
                } else {
                    $("#msgError").show();
                }
            },
            error:function(){
                alert("Ocorreu um problema durante o cadastro de suas informações.");
            }
        });
    }


    $("#btnSalvar").click(function(){
        if(validar()) {
            salvar();
        }
        return false;
    });
});