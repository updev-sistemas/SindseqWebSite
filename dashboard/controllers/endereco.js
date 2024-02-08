

function carregar() {
    $.ajax({
        url:'./logic/template.ajax.php',
        method:'post',
        data:{token: $('#token').val(),acao:'ler',arquivo:'contato.json'},
        dataType:'json',
        success:function(r) {
            montar(r);
        },
        error:function(){
            alert("Erro na requisição AJAX");
        }
    });
}

function montar( r ) {
    $("#logradouro").val(r.logradouro);
    $("#bairro").val(r.bairro);
    $("#cidade").val(r.cidade);
    $("#cep").val(r.cep);
    $("#telefone").val(r.telefone);
    $("#email").val(r.email);
}

function salvar() {

    var dados = {
        token:$("#token").val(),
        acao:'escrever',
        arquivo:'contato.json',
        logradouro:$("#logradouro").val(),
        bairro:$("#bairro").val(),
        cep:$("#cep").val(),
        cidade:$("#cidade").val(),
        telefone:$("#telefone").val(),
        email:$("#email").val()
    }


    $.ajax({
        url:'./logic/template.ajax.php',
        method:'post',
        data:dados,
        dataType:'html',
        success:function(r) {
            alert("Feito")
        },
        error:function(){
            alert("Erro na requisição AJAX");
        }
    });
}

$(".form-control").focus(function(){
    $(".oculto").hide();
});

function validar() {

    var flag = true;

    if($("#logradouro").val()==='') {
        $("#msgErrorLogradouro").show();
        flag = false;
    }
    if($("#bairro").val()==='') {
        $("#msgErrorBairro").show();
        flag = false;
    }
    if($("#cidade").val()==='') {
        $("#msgErrorCidade").show();
        flag = false;
    }
    if($("#cep").val()==='') {
        $("#msgErrorCep").show();
        flag = false;
    }
    if($("#telefone").val()==='') {
        $("#msgErrorTelefone").show();
        flag = false;
    }
    if($("#email").val()==='') {
        $("#msgErrorEmail").show();
        flag = false;
    }

    return flag;

}

$("#btnSalvar").click(function(){
    if(validar()) {
        salvar();
        return true;
    }
    return false;
});

carregar();