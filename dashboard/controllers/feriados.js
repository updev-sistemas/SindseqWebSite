
$("#tbLista").DataTable();

function limpar() {
    $(".form-control").val("");
}

function validar() {
    var flag = true;

    if($("#nome").val()==='') { flag &= false; }
    if($("#dia").val()==='0'){ flag &= false; }
    if($("#mes").val()==='0'){ flag &= false; }
    if($("#ano").val()===''){ flag &= false; }

    return flag;
}

function informarError() {
    if($("#nome").val()==='') { $("#msgTitulo").show(); }
    if($("#dia").val()==='0'){ $("#msgDia").show(); }
    if($("#mes").val()==='0'){ $("#msgMes").show(); }
    if($("#ano").val()===''){ $("#msgAno").show(); }

}

function verMes(m) {
    switch(m) {
        case "1" : { return "Janeiro"; }
        case "2" : { return "Fevereiro"; }
        case "3" : { return "Março"; }
        case "4" : { return "Abril"; }
        case "5" : { return "Maio"; }
        case "6" : { return "Junho"; }
        case "7" : { return "Julho"; }
        case "8" : { return "Agosto"; }
        case "9" : { return "Setembro"; }
        case "10" : { return "Outubro"; }
        case "11" : { return "Novembro"; }
        case "12" : { return "Dezembro"; }
    }
}

function carregar() {
    // areaFeriados
    $.ajax({
        url:"./logic/feriado.ajax.php",
        method:"post",
        data:{acao:'lista',token: $("#token").val()},
        dataType:"json",
        success:function(response){
            var lista = "";

            response.forEach(function(item){
                var linha = "<tr id='linha"+item.id+"'>";
                    linha += "<td>"+item.titulo+"</td>";
                    linha += "<td>"+item.dia+" de " +verMes(item.mes)+"</td>";
                    linha += "<td><button type='button' class='btn btn-danger btn-excluir' feriado='"+item.id+"'>Remover</button></td>";
                    linha += "</tr>";
                lista += linha;
            });

            $("#areaFeriados").children().remove();
            $("#areaFeriados").append(lista);
            $("#tbLista").DataTable();
        },
        error:function(e){}
    });


}

function remover(item) {
    var dados = {
        token:$("#token").val(),
        acao:'rm',
        item:item
    };

    $.ajax({
        url:'./logic/feriado.ajax.php',
        method:'post',
        data:dados,
        dataType:"html",
        success:function(resposta) {
            if(resposta==='ok') {
                var linha = "#linha" + dados.item;
                $(linha).remove();
                alert("Feriado Removido");
            } else {
                alert("Não foi possível remover o feriado");
            }
        },
        error:function(r) {

        }
    });

}

function salvar() {

    var dados = {
        token:$("#token").val(),
        acao:'novo',
        titulo:$("#nome").val(),
        dia:$("#dia").val(),
        mes:$("#mes").val(),
        ano:$("#ano").val(),
        repete:$("#repete").val()
    }


    $.ajax({
        url:'./logic/feriado.ajax.php',
        method:'post',
        data:dados,
        dataType:"html",
        success:function(resposta) {
            if(resposta==='ok') {
                limpar();
                carregar();
                $("#msgs").show();
            } else {
                $("#msge").show();
            }
        },
        error:function(r) {

        }
    });
}


$(".btn-excluir").click(function(){
    var item = $(this).attr("feriado");
    if(confirm("Remover Este Feriado?")) {
        remover(item);
        return true;
    }
    return false;
});

$("#ano").blur(function(){
    if($(this).val()!=='') {
        var number = +$(this).val();

        if(!Number.isInteger(number)) {
            $(this).val("");
        }

        if(number<2016) {
            $(this).val("");
        }
    }
});


$("#btnRegistro").click(function(){
    $(".help-block").hide();
    if(validar()) {
        salvar();
        carregar();
    }
    informarError();
});
