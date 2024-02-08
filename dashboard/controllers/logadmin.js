
$("#usuario").change(function(){

    var dados = {
        token : $.token,
        acao:'log',
        admin:$(this).val()
    };

    $.ajax({
        url:"./logic/logs.ajax.php",
        method:"post",
        data:dados,
        dataType:"json",
        success:function(response){
            if(response==='no') {

            } else {
                var table = "";

                response.forEach(function(obj){
                    var linha  = "<tr>";
                        linha += "<td>" + obj.session + "</td>";
                        linha += "<td>" + obj.data_ocorrencia + "</td>";
                        linha += "<td>" + obj.ip + "</td>";
                        linha += "<td>" + obj.acao + "</td>";
                    table += linha;
                });

                $("#painel").children().remove();
                $("#painel").append(table);
                $("#tbLogs").DataTable();
            }
        }
    });

});