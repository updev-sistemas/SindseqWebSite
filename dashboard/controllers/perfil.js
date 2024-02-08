/**
 * Created by Antonio José on 05/09/2016.
 */

function validarForm() {
    $('.help-block').hide();
    if($('#nome').val()==='') {
        $('#nome').focus();
        $('#msgNomeVazio').show();
        return false;
    }

    if($('#email').val()==='') {
        $('#email').focus();
        $('#msgEmailVazio').show();
        return false;
    }

    if($('#login').val()==='') {
        $('#login').focus();
        $('#msgLoginVazio').show();
        return false;
    }
    return true;
}

function getRandomChar() {
    var ascii = [[48, 57],[64,90],[97,122]];
    var i = Math.floor(Math.random()*ascii.length);
    return String.fromCharCode(Math.floor(Math.random()*(ascii[i][1]-ascii[i][0]))+ascii[i][0]);
}

function geradorSenha() {
    var pass = "";
    for (var i= 0; i < 10; i++) {
        pass += this.getRandomChar();
    }
    return pass;
}

$('#btnNovo').click(function () {
    $('#nsenha,#rsenha').val($('#senhaGerada').val());
    $('#dialog').modal('hide');
});


$('#btnRefreshNovaSenha').click(function(){
    senha = geradorSenha();
    $('#senhaGerada').val( senha );
});

$('#btnAtualizarSenha').click(function(){
    $('.alert, .help-block').hide();
    if($('#asenha').val()==='') {
        $('#asenha').focus();
        $('#msgSenhaAtualVazia').show();
        return false;
    }

    var s = $('#nsenha').val();
    var r = $('#rsenha').val();

    if(s==='' || r===''){
        $('#asenha').focus();
        $('#nsenha,#rsenha').val('');
        $('#msgSenhaNovaVazia').show();
        return false;
    }

    if(s!==r) {
        $('#asenha').focus();
        $('#nsenha,#rsenha').val('');
        $('#msgSenhaRepeteVazia').show();
        return false;
    }

    var dados = {
        acao:'uppw',
        token:$.token,
        s:$('#asenha').val(),
        n:$('#nsenha').val(),
        id:$('#meuid').val()
    };
    $.ajax({
        url:'./logic/usuario.ajax.php',
        method:'post',
        data:dados,
        dataType:'html',
        success:function(e) {
            if(e==='ok') {
                $('#msgUpSucesso').show();
            } else {
                $('#msgUpError').show();
            }
        }
    });
});

$('#btnAtualizar').click(function(){
    if(validarForm()) {
        var dados = {
            acao:'upps',
            token:$.token,
            nome:$('#nome').val(),
            sobrenome:$('#sobrenome').val(),
            id:$('#meuid').val()
        };


        $.ajax({
            url:'./logic/usuario.ajax.php',
            method:'post',
            data:dados,
            dataType:'html',
            success:function(e) {
                if(e==='ok') {
                    $('#msgUpSucesso').show();
                } else {
                    $('#msgUpError').show();
                }
            }
        });
    } else {
        $('#msgFormInvalido').show();
        return false;
    }
});

$('#novaFoto').change(function() {

    var fd = new FormData();
    fd.append('foto', this.files[0]);
    fd.append('acao', 'avatar');
    fd.append('token', $.token);
    fd.append('usuario', $("#usuariocod").val());

    $.ajax({
        url: './logic/imagem.ajax.php',
        method: 'post',
        data: fd,
        dataType:'json',
        processData: false,
        contentType: false,
        success:function(e) {
            if(e.resposta==='ok') {
                var path = '../storage/perfil/' + e.nome;
                $('#minhaFoto').attr('src',path);
                $('#minhaFoto').attr('display','block');
                $('#foto').val(e.nome);
                $('#msgFotoSucesso').show();
                window.setInterval(function(){$('#msgFotoSucesso').hide()},6000);
            } else {
                this.files[0] = null;
                $('#msgFotoError').show();
                window.setInterval(function(){$('#msgFotoError').hide()},6000);
            }
        }
    });
});

$('#btnRemoveFoto').click(function(){
    var dados = {
        acao:'rmfotoatual',
        token:$.token,
        id:$(this).attr('admin')
    };
    $.ajax({
        url:'./logic/imagem.ajax.php',
        method:'post',
        data:dados,
        dataType:'text',
        success:function(e) {
            if(e==='ok') {
                var path = '../storage/perfil/default.png';
                $('#minhaFoto').attr('src',path);
                $('#minhaFoto').attr('display','block');
                $('#msgFotoSucesso').show();
            } else {
                this.files[0] = null;
                $('#msgFotoError').show();
            }
        }
    });
});

