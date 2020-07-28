var documento;

$(document).ready(function () {
    var doc = getParameterByName('id', window.location.href);

    $.ajax({
        url: '../../Controller/biblioteca/switch_controller.php',
        type: 'POST',
        data: { accion: 'one', 'id': doc},
        success: function (res) {
            documento = JSON.parse(res)[0];
            initDocumento();
        }
    });
});

function initDocumento() {
    $('#docTitulo').text(documento.nombre);
    $('#docAutor').append("<i class=\"fas fa-user-tie\"></i> "+documento.autor);
    $('#docFecha').append("<i class=\"fas fa-calendar-alt\"></i> "+convertirFecha(documento.fecha));
    $('#docContenido').text(documento.descripcion);
    $('#docArchivo').append(
        '<iframe class="doc" src="../../public/documentos/'+documento.archivo+'"></iframe>'
    )


    $('#preloader').css('visibility', 'hidden');
    $('#divDocumento').css('visibility', 'visible');
}







function convertirFecha(fecha) {
    const date = new Date(fecha);
    const ye = new Intl.DateTimeFormat('es', { year: 'numeric' }).format(date);
    const mo = new Intl.DateTimeFormat('es', { month: 'long' }).format(date);
    const da = new Intl.DateTimeFormat('es', { day: '2-digit' }).format(date);
    return da+" "+mo+", "+ye;
}

function getParameterByName(name, href) {
    name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
    var regexS = "[\\?&]"+name+"=([^&#]*)";
    var regex = new RegExp(regexS);
    var result = regex.exec(href);
    if(result == null){
        return "";
    }else{
        return decodeURIComponent(result[1].replace(/\+/g, " "));
    }
}