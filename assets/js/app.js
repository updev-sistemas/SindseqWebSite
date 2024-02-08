/**
 * Created by antoniojose on 16/01/17.
 */
$(function(){

    var linkRadio = '<iframe src="//player.sejaguia.com.br/player-barra/12770/000000"  frameborder="0" width="100%" height="32"></iframe>';
    var linkImgRadio = '<img src="assets/images/radio.png" class="img-responsive" title="Não estamos no ar neste momento, somente aos sábados de 12:00 às 13:00 na rádio Campo Maior de Quixeramobim" alt="Banner Rádio" / >';

    var horaCliente = new Date();

    function verificarHorario() {
        var dia = horaCliente.getDay();
        if(dia===6) {
            console.log("Hoje é sábado!");
            var hora = horaCliente.getHours();
            if(hora>=12 && hora <=14) {
                console.log("Coloquei no ar!");
                $("#areaRadio").children().remove();
                $("#areaRadio").append( linkRadio );
            } else {
                $("#areaRadio").children().remove();
                $("#areaRadio").append( linkImgRadio );
            }
        }
    }


    function validar() {

        $(".nwl").hide();

        var nome  = $("#nome").val(),
            email = $("#email").val();

        if(nome==='') {
            $("#msgNwl1").show();
            $("#nome").focus();
            return false;
        }

        if(email==='') {
            $("#msgNwl2").show();
            $("#email").focus();
            return false;
        }
        return true;
    }

    function limpar() {
        $(".nwl").hide();
        $("#nome,#email").val("");
    }

    $("#form-submit").click(function(){
        if(validar()){
            var dados = {
                token: $("#token").val(),
                nome:$("#nome").val(),
                email:$("#email").val()
            };
            $.ajax({
                url:'./ajax/newsletter.ajax.php',
                method:'post',
                data:dados,
                dataType:'html',
                beforeSend:function(){
                    $("#areaFormulario").hide();
                    $("#areaLoad").show();
                },
                complete:function(){
                    $("#areaLoad").hide();
                    $("#areaFormulario").show();
                },
                success:function(response){
                    if(response==='ok') {
                        limpar();
                        alert("Registrado");
                    } else if(response==='dup') {
                        limpar();
                        alert("Você já está cadastrado em nosso site");
                    } else {
                        alert("Não foi possível registrar");
                    }
                },
                error:function(e){
                    limpar();
                }
            });
        }
        return false;
    });


    /* Carrega as informações do Rodape */
    $.post('./ajax/contato.json',{},function(response){
        $('#contatoLogradouro').html(response.logradouro);
        $('#contatoBairro').html(response.bairro);
        $('#contatoCidade').html(response.cidade);
        $('#contatoCep').html(response.cep);
        $('#contatoTelefone').html(response.telefone);
        $('#contatoEmail').html(response.email);
    });

    $('#destaques').carousel({interval:5000});

    verificarHorario();
});