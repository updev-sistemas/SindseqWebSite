/**
 * Created by antoniojose on 16/01/17.
 */


/* Editor de Texto */
tinymce.init({
    selector: "#word",
    height: 500,
    plugins: [
        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
        "table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern"
    ],
    toolbar1: "cut copy paste | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect fontsizeselect",
    toolbar2: "table | hr removeformat | subscript superscript | charmap emoticons  | searchreplace | bullist numlist | outdent indent blockquote | undo redo",
    toolbar3: "link unlink image media | insertdatetime | forecolor backcolor",
    menubar: false,
    image_dimensions:false,
    image_class_list: [{title:'Responsive',value:'img-responsive img-rounded'}],
    content_css: [
        './vendors/tinymce/css/codepen.min.css'
    ],
    file_browser_callback:function (field_name, url, type, win) {
        var roxyFileman = '../storage/index.php';
        if (roxyFileman.indexOf("?") < 0) {
            roxyFileman += "?type=" + type;
        }
        else {
            roxyFileman += "&type=" + type;
        }
        roxyFileman += '&input=' + field_name + '&value=' + win.document.getElementById(field_name).value;
        if(tinyMCE.activeEditor.settings.language){
            roxyFileman += '&langCode=' + tinyMCE.activeEditor.settings.language;
        }
        tinyMCE.activeEditor.windowManager.open({
            file: roxyFileman,
            title: 'UPSIDE Serviços em Tecnologia da Informação LTDA',
            width: 850,
            height: 650,
            resizable: "yes",
            plugins: "media",
            inline: "yes",
            close_previous: "no"
        }, { window: win, input:field_name });
        return false;
    }
});


function salvar() {
    tinyMCE.triggerSave(false,true);
    var fd = new FormData();
    fd.append('acao','novo');
    fd.append('token',$.token);
    fd.append('titulo',$('#titulo').val());
    fd.append('subtitulo',$('#subtitulo').val());
    fd.append('previa',$('#previa').val());
    fd.append('conteudo',tinyMCE.get('word').getContent({format : 'raw'}));
    fd.append('categoria',$("#categoria").val());
    fd.append('status',$("#status").val());
    fd.append('banner',$("#banner").val());
    fd.append('galeria',$("#galeria").val());
    fd.append('anexo',$("#anexo").val());
    fd.append('destaque',$("#destaque").val());
    fd.append('autor',$("#autor").val());


    $.ajax({
        url:'./logic/publicacao.ajax.php',
        method:'POST',
        dataType:'json',
        data:fd,
        processData:false,
        contentType:false,
        success:function(r) {
            if(r.resposta==='ok') {
                $('#pubid').val(r.id);
                $('#msgSucessoNovo').show();
                $('.x_content').hide();
                if($('#galeria').val()==='s') {
                    salvarItens();
                }
                limpar();
            } else {
                $('#msgErrorNovo').show();
            }
        },error:function(response){
            console.log(response);
        }
    });
}

function validar() {

    var flag = true;

    if($("#titulo").val()===''){
        flag &= false;
        $("#msgTituloErro").show();
    }

    if($("#previa").val()===''){
        flag &= false;
        $("#msgPreviaErro").show();
    }

    if($("#secao").val()==='-'){
        flag &= false;
        $("#msgCategoria1").show();
    }

    if($("#categoria").val()==='-'){
        flag &= false;
        $("#msgCategoria2").show();
    }

    if($("#status").val()==='-'){
        flag &= false;
        $("#msgStatus").show();
    }


    return flag;

}


function limpar() {
    $(".form-control").val("");
}


$("#btnSalvar").click(function(){
    $(".help-block").hide();
    if(validar()){
        salvar();
        limpar();
        return true;
    }
    return false;
});


$('#b1').change(function(){
    var fd = new FormData();
    fd.append('acao','sb1');
    fd.append('token',$.token);
    fd.append('banner', this.files[0]);
    fd.append('anterior',$('#banner').val());
    $.ajax({
        url:'./logic/imagem.ajax.php',
        type:'POST',
        dataType:'json',
        data:fd,
        processData:false,
        contentType:false,
        beforeSend:function(){
            $('#progressbar1').show();
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
                        $('#pgb1').attr('data-transitiongoal',pc).progressbar();
                    }
                });
            }
            return xhr;
        },
        success:function(e){
            if(e.resposta==='ok') {
                $('#banner').val(e.nome);
                $('#msgOk1').show();
            } else {
                $('#msgNo1').show();
            }
        }
    });
});


$('#b2').change(function(){
    var fd = new FormData();
    fd.append('acao','sb2');
    fd.append('token',$.token);
    fd.append('banner', this.files[0]);
    fd.append('anterior',$('#banner').val());
    $.ajax({
        url:'./logic/imagem.ajax.php',
        type:'POST',
        dataType:'json',
        data:fd,
        processData:false,
        contentType:false,
        beforeSend:function(){
            $('#progressbar2').show();
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
                        $('#pgb2').attr('data-transitiongoal',pc).progressbar();
                    }
                });
            }
            return xhr;
        },
        success:function(e){
            if(e.resposta==='ok') {
                $('#thumbnail').val(e.nome);
                $('#msgOk2').show();
            } else {
                $('#msgNo2').show();
            }
        }
    });
});


$('#b3').change(function(){
    var fd = new FormData();
    fd.append('acao','sb3');
    fd.append('token',$.token);
    fd.append('banner', this.files[0]);
    fd.append('anterior',$('#thumb').val());
    $.ajax({
        url:'./logic/imagem.ajax.php',
        type:'POST',
        dataType:'json',
        data:fd,
        processData:false,
        contentType:false,
        beforeSend:function(){
            $('#progressbar3').show();
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
                        $('#pgb3').attr('data-transitiongoal',pc).progressbar();
                    }
                });
            }
            return xhr;
        },
        success:function(e){
            if(e.resposta==='ok') {
                $('#thumb').val(e.nome);
                $('#msgOk3').show();
            } else {
                $('#msgNo3').show();
            }
        }
    });
});


$("#secao").change(function(){
    var dados = {
        token: $("#token").val(),
        acao:'lstcat',
        secao:$(this).val()
    };
    $.ajax({
        url:'./logic/secao.ajax.php',
        method:'post',
        data:dados,
        dataType:'json',
        success:function(e){
            if(e==='no') {
                alert("Erro ao carregar categorias")
            } else {
                var lista = "";
                e.forEach(function(obj){
                    var item = "<option value='"+obj.id+"'>"+obj.nome+"</option>";
                    lista += item;
                });
                $("#categoria").children().remove();
                $("#categoria").append(lista);
            }
        }
    });
});
