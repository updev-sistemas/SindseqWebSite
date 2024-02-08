$("#tbAgenda").DataTable();


$(".btn-remove").click(function(){
    if(confirm("Deseja remover este evento?")) {
        var dados = {
            token: $.token,
            acao:'remove',
            evento:$(this).attr("evento")
        };

        $.ajax({
            url:'./logic/agenda.ajax.php',
            method:'post',
            data:dados,
            dataType:'html',
            success:function(r){
                if(r==='ok') {
                    var linha = "#evento" + dados.evento;
                    $(linha).remove();
                    alert("Evento Removido");
                } else {
                    alert("Não foi possível remover este evento");
                }
            }
        });
    }
    return false;
});