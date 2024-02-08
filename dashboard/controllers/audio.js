
$("#tbMidias").DataTable();


$(".autoriza").change(function(){
    var item = $(this).attr("arquivo");
    if(item==='-'){
        return false;
    } else {
        var dados = {
            token: $.token,
            acao:'alt',
            documento:item,
            valor:$(this).val()
        };
        $.ajax({
            url:'./logic/midia.ajax.php',
            method:'post',
            data:dados,
            dataType:'html',
            success:function(e) {
                if(e==='ok'){
                    $("#msgSuccessReg").show();
                    window.setTimeout(function(){
                        $("#msgSuccessReg").hide();
                    },4000);
                } else {
                    $("#msgErrorReg").show();
                    window.setTimeout(function(){
                        $("#msgErrorReg").hide();
                    },4000);
                }
            }
        });
    }
});