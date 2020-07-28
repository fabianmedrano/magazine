var listaDoc = [];
var listaPost = [];
var listaPag = [];
var indexPag = 1;

var post = ""+
"<div class=\"col-md-4\">\n" +
    "<div class=\"blog-small-post\">\n" +
        "<div class=\"post-txt break-word\" style=\"width: 100%; height: 300px;\">\n" +
            "<span class=\"pdate\"> <i class=\"fas fa-calendar-alt\"></i> *fecha* </span>\n" +
            "<h5><a href=\"documento.php?id=*id*\" class=\"text-justify text-break\"> *titulo* </a></h5>\n" +
            "<p class=\"text-justify\"> *contenido* </p>\n" +
        "</div>\n" +
        "<a href=\"documento.php?id=*id*\" class=\"rm ml-3\">Leer más ...</a>\n" +
    "</div>\n" +
"</div>";

$(document).ready(function () {
    getLista();
});

function getLista() {
    $.ajax({
        url: '../../Controller/biblioteca/switch_controller.php',
        type: 'POST',
        data: { accion: 'get'},
        success: function (res) {

            $('#preloader').css('visibility', 'hidden');
            $('#divContenido').css('visibility', 'visible');
            listaDoc = JSON.parse(res);
            multiplicarLista();
            initBiblio();
        }
    });
}

function multiplicarLista() {
    $.each(listaDoc, function( index, value ) {
        listaDoc.push(value);
    });
    $.each(listaDoc, function( index, value ) {
        listaDoc.push(value);
    });
    $.each(listaDoc, function( index, value ) {
        listaDoc.push(value);
    });
    $.each(listaDoc, function( index, value ) {
        listaDoc.push(value);
    });
    $.each(listaDoc, function( index, value ) {
        listaDoc.push(value);
    });
    $.each(listaDoc, function( index, value ) {
        listaDoc.push(value);
    });
}

function initBiblio() {
    // LIMPIAR DIV`S
    $('#divBiblio').empty();
    $('#divPag').empty();

    var divMaster = "<div id='*idPag*' class=\"row\">";
    var cont = 1;
    var contId = 1;

    $.each(listaDoc, function( index, value ) {
        var item = post;
        item = item.replaceAll("*id*", value.id);
        item = item.replaceAll("*fecha*", convertirFecha(value.fecha));
        item = item.replaceAll("*titulo*", value.nombre);
        item = item.replaceAll("*contenido*", value.descripcion);

        divMaster += item;
        cont += 1;

        if(cont === 7){
            divMaster += "</div>";
            cont = 1;
            divMaster = divMaster.replace("*idPag*", contId);
            listaPost.push(divMaster);
            divMaster = "<div id='*idPag*' class=\"row\">";
            listaPag.push(
                "<li class=\"page-item\" id='pag"+contId+"'>\n" +
                    "<button class=\"page-link\" onclick=\"cambiarPag("+contId+")\">"+contId+"</button>\n" +
                "</li>"
            );
            contId += 1;
        }
    });

    if(cont < 10){
        divMaster += "</div>";
        divMaster = divMaster.replace("*idPag*", contId);
        listaPost.push(divMaster);
        divMaster = "<div id='*idPag*' class=\"row\">";
        listaPag.push(
            "<li class=\"page-item\" id='pag"+contId+"'>\n" +
            "<button class=\"page-link\" onclick=\"cambiarPag("+contId+")\">"+contId+"</button>\n" +
            "</li>"
        );
    }

    $('#divBiblio').html(listaPost[0]);
    initPag();
}

function initPag() {
    $('#divPag').append(
        "<li class=\"page-item\">\n" +
            "<button class=\"page-link\" onclick='anterior()'><i class=\"fas fa-angle-left\"></i></button>\n" +
        "</li>"
    );

    if(listaPost.length < 3){
        $.each(listaPag, function( index, value ) {
            $('#divPag').append(value);
        });
    }else{
        for(var i=0; i<3; i++) {
            $('#divPag').append(listaPag[i]);
        }
    }
    activarPag(1);

    $('#divPag').append(
        "<li class=\"page-item\">\n" +
            "<button class=\"page-link\" onclick='siguiente()'><i class=\"fas fa-angle-right\"></i></button>\n" +
        "</li>"
    );
}

function cambiarPag(id) {
    indexPag = id;
    $('#divBiblio').empty();
    $('#divBiblio').html(listaPost[id]);

    $('#divPag').empty();
    $('#divPag').append(
        "<li class=\"page-item\">\n" +
        "<button class=\"page-link\" onclick='anterior()'><i class=\"fas fa-angle-left\"></i></button>\n" +
        "</li>"
    );
    if(id === 1){
        for(var i=0; i<3; i++) {
            $('#divPag').append(listaPag[i]);
        }
    }else{
        if(id === (listaPag.length-1)){
            $('#divPag').append(listaPag[id - 3]);
            $('#divPag').append(listaPag[id - 2]);
            $('#divPag').append(listaPag[id - 1]);
        }else {
            $('#divPag').append(listaPag[id - 2]);
            $('#divPag').append(listaPag[id - 1]);
            $('#divPag').append(listaPag[id]);
        }
    }
    $('#divPag').append(
        "<li class=\"page-item\">\n" +
        "<button class=\"page-link\" onclick='siguiente()'><i class=\"fas fa-angle-right\"></i></button>\n" +
        "</li>"
    );
    activarPag(id);
}

function convertirFecha(fecha) {
    const date = new Date(fecha);
    const ye = new Intl.DateTimeFormat('es', { year: 'numeric' }).format(date);
    const mo = new Intl.DateTimeFormat('es', { month: 'long' }).format(date);
    const da = new Intl.DateTimeFormat('es', { day: '2-digit' }).format(date);
    return da+" "+mo+", "+ye;
}

function activarPag(id) {
    $.each(listaPag, function( index, value ) {
        $('#pag'+(index+1)).removeClass('active');
    });
    $('#pag'+id).addClass('active');
}

function primero() {
    cambiarPag(1);
}

function ultimo() {
    cambiarPag(listaPag.length-1);
}

function anterior() {
    if(indexPag > 1){
        cambiarPag(indexPag-1);
    }
}

function siguiente() {
    if(indexPag < (listaPag.length-1)){
        cambiarPag(indexPag+1);
    }
}