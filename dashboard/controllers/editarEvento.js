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



$('#calendario').daterangepicker({
    timePicker: false,
    timePickerIncrement: 30,
    singleDatePicker: true,
    showDropdowns: true,
    singleDatePicker: true,
    locale: { format: 'DD/MM/YYYY' }
}, function(start, end, label) {
    console.log(start.toISOString(), end.toISOString(), label);
});


function validar() {
    var flag = true;

    if($("#titulo").val()==='') {
        flag = false;
        $("#msgTituloErro").show();
    }

    if($("#calendario").val()==='') {
        flag = false;
        $("#msgDataErro").show();
    }

    return flag;
}

function salvar() {

    tinyMCE.triggerSave(false,true);
    var fd = new FormData();
    fd.append('acao','editar');
    fd.append('token',$.token);
    fd.append('status',$("#status").val());
    fd.append('evento',$("#evento").val());
    fd.append('titulo',$('#titulo').val());
    fd.append('conteudo',tinyMCE.get('word').getContent({format : 'raw'}));
    fd.append('calendario',$("#calendario").val());

    $.ajax({
        url:'./logic/agenda.ajax.php',
        method:'POST',
        dataType:'html',
        data:fd,
        processData:false,
        contentType:false,
        success:function(r) {
            if(r==='ok') {
                alert("Evento atualizado");
            } else {
                alert("não foi possível atualizar este evento")
            }
        },error:function(response){
            console.log(response);
        }
    });
}



$("#btnSalvar").click(function(){
    if(validar()) {
        salvar();
    }
    return false;
});