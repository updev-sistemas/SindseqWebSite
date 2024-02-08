


function validar() {

    var flag = true;

    if($("#nome").val()==='') {
        flag = false;
        $("#msgErrorNome").show();
    }

    if($("#cargo").val()==='') {
        flag = false;
        $("#msgErrorCargo").show();
    }

    if($("#email").val()==='') {
        flag = false;
        $("#msgErrorEmail").show();
    }


    if($("#sobre").val()==='') {
        flag = false;
        $("#msgErrorSobre").show();
    }


    return flag;
}


$("#fotoperfil").change(function(){
    var fd = new FormData();
    fd.append('membro', this.files[0]);
    fd.append('acao', 'ftdir');
    fd.append('token', $.token);
    fd.append('usuario', $("#usuariocod").val());

    $.ajax({
        url: './logic/imagem.ajax.php',
        method: 'post',
        data: fd,
        dataType:'json',
        processData: false,
        contentType: false,
        beforeSend:function(){
            $(".msgpht").hide();
        },
        success:function(e) {
            if(e.resposta==='ok') {
                $('#foto').val(e.nome);
                $("#msgFotoDefinida").show();
            } else {
                $('#foto').val("default.png");
                $("#msgFotoNaoDefinida").show();
            }
        }
    });
});

function salvar() {
    var dados = {
        token:$("#token").val(),
        acao:'novo',
        nome:$("#nome").val(),
        cargo:$("#cargo").val(),
        email:$("#email").val(),
        sobre:$("#sobre").val(),
        dataInicio:$("#data1").val(),
        dataFinal:$("#data2").val(),
        facebook:$("#facebook").val(),
        instagram:$("#instagram").val(),
        googleplus:$("#googleplus").val(),
        twitter:$("#twitter").val(),
        foto:$("#foto").val()
    };

    $.ajax({
        url:"./logic/membros.ajax.php",
        method:"post",
        data:dados,
        dataType:"html",
        success:function(r){
            if(r==='ok') {
                limpar();
                $("#msgSuccessReg").show();
            }
            else {
                $("#msgErrorReg").show();
            }
        }
    });
}


function limpar() {
    $(".form-control").val("");
    $("#foto").val("default.png");
    $(".help-block").hide();
}


$("#btnRegistro").click(function(){
    if(validar()) {
        salvar();
        limpar();
        return true;
    }
    return false;
});