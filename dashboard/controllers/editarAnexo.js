
$('#fileSend').change(function(){
    $('#msgUpOK,#msgUpNO,#msgObrigatorio').hide();
    var fd = new FormData();
    fd.append('acao','anexo');
    fd.append('relativo',$("#referente").val());
    fd.append('token',$.token);
    fd.append('arquivo', this.files[0]);
    $.ajax({
        url:'./logic/midia.ajax.php',
        type:'POST',
        dataType:'json',
        data:fd,
        processData:false,
        contentType:false,
        beforeSend:function(){
            $('#progressbar').show();
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
                        $('#pgb').attr('data-transitiongoal',pc).progressbar();
                    }
                });
            }
            return xhr;
        },
        success:function(e){
            if(e.resposta==='ok') {
                $("#arquivo").val(e.nome);
                $('#msgUpOK').show();
            } else {
                $("#arquivo").val('-');
                $('#msgUpNO').show();
            }
        },
        error:function(r){},
        complete:function(){

        }
    });
});


function validar() {
    $(".help-block").hide();
    var flag = true;

    if($("#titulo").val()==='') {
        flag &= false;
    }

    if($("#descricao").val()==='') {
        flag &= false;
    }

    if($("#arquivo").val()==='-') {
        flag &= false;
    }

    return flag;
}

function informarError() {
    if($("#titulo").val()==='') {
        $("#msgErrorTitulo").show();
    }

    if($("#descricao").val()==='') {
        $("#msgErrorDescricao").show();
    }

    if($("#arquivo").val()==='-') {
        $("#msgErrorTipo").show();
    }
}

function limpar() {
    $(".form-control").val("");
    $(",#arquivo").val("-");
}


$("#btnRegistro").click(function(){
    if(validar()) {
        var dados = {
            token: $.token,
            acao:'update',
            anexo:$("#anexo").val(),
            titulo:$("#titulo").val(),
            descricao:$("#descricao").val(),
            arquivo:$("#arquivo").val(),
            autor:$("#autor").val()
        }
        $.ajax({
            url:'./logic/midia.ajax.php',
            method:'post',
            data:dados,
            dataType:'html',
            beforeSend:function(){
                $(".alert").hide();
            },
            success:function(e){
                if(e==='ok') {
                    $("#btnRegistro").attr("disabled","true");
                    $("#msgSuccessReg").show();
                } else {
                    $("#msgErrorReg").show();
                }
            }
        });
    }
    else {
        informarError();
    }
});


/**/
$("#tipo").change(function(){
    $(".rrr").hide();
    var escolhido = $(this).val();

    if(escolhido==='-') {
        $("#referente").val('-');
        $("#areaUpload").hide();
    } else {

        if(escolhido==='d') { $("#td").show(); }
        if(escolhido==='a') { $("#ta").show(); }
        if(escolhido==='f') { $("#tq").show(); }

        $("#referente").val(escolhido);
        $("#areaUpload").show();
    }

});
/**/