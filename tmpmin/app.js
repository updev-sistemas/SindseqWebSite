$(function(){function d(){var d=c.getDay();if(6===d){console.log("Hoje é sábado!");var e=c.getHours();e>=12&&e<=14?(console.log("Coloquei no ar!"),$("#areaRadio").children().remove(),$("#areaRadio").append(a)):($("#areaRadio").children().remove(),$("#areaRadio").append(b))}}function e(){$(".nwl").hide();var a=$("#nome").val(),b=$("#email").val();return""===a?($("#msgNwl1").show(),$("#nome").focus(),!1):""!==b||($("#msgNwl2").show(),$("#email").focus(),!1)}function f(){$(".nwl").hide(),$("#nome,#email").val("")}var a='<iframe src="//player.sejaguia.com.br/player-barra/12770/000000"  frameborder="0" width="100%" height="32"></iframe>',b='<img src="assets/images/radio.png" class="img-responsive" title="Não estamos no ar neste momento, somente aos sábados de 12:00 às 13:00 na rádio Campo Maior de Quixeramobim" alt="Banner Rádio" / >',c=new Date;$("#form-submit").click(function(){if(e()){var a={token:$("#token").val(),nome:$("#nome").val(),email:$("#email").val()};$.ajax({url:"./ajax/newsletter.ajax.php",method:"post",data:a,dataType:"html",beforeSend:function(){$("#areaFormulario").hide(),$("#areaLoad").show()},complete:function(){$("#areaLoad").hide(),$("#areaFormulario").show()},success:function(a){"ok"===a?(f(),alert("Registrado")):"dup"===a?(f(),alert("Você já está cadastrado em nosso site")):alert("Não foi possível registrar")},error:function(a){f()}})}return!1}),$.post("./ajax/contato.json",{},function(a){$("#contatoLogradouro").html(a.logradouro),$("#contatoBairro").html(a.bairro),$("#contatoCidade").html(a.cidade),$("#contatoCep").html(a.cep),$("#contatoTelefone").html(a.telefone),$("#contatoEmail").html(a.email)}),$("#destaques").carousel({interval:5e3}),d()});