
$("#tbListAdmin").DataTable();


$(".btn-excluir").click(function(){
    $("#msgSuccessRm,#msgErrorRm").hide();
    if(confirm("Deseja remover este usuário?")) {
        var dados = {
            token: $.token,
            admin: $(this).attr("usuario"),
            acao:"rm"
        };

        $.ajax({
            url:"./logic/usuario.ajax.php",
            method:'post',
            data:dados,
            dataType:"html",
            success:function(response){
                if(response==='ok') {
                    $("#msgSuccessRm").show();
                    var row = "#u" + dados.admin;
                    $(row).remove();
                } else {
                    $("#msgErrorRm").show();
                }
            }
        });

    }
    return false;
});