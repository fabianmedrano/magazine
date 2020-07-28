var listaGaleria = [];
var listaDiv = [];
var listaPag = [];
var indexPag = 0;
var idAnt = -1;

var foto =
'<div class="item f*id*">\n' +
    '<div class="gallery-img">' +
        '<a href="../../public/img/galeria/*id*/*foto*"><i class="fas fa-search"></i></a>' +
        '<img src="../../public/img/galeria/*id*/*foto*" alt="foto de *cate*">' +
    '</div>\n' +
'</div>'

$(document).ready(function () {
    getLista();
});

function getLista() {

    $.ajax({
        url: '../../Controller/galeria/switch_controller.php',
        type: 'POST',
        data: { accion: 'getAll'},
        success: function (res) {

            listaGaleria = JSON.parse(res);
            multiplicarLista();
            initGaleria(-1);

            $('#preloader').css('visibility', 'hidden');
            $('#divContenido').css('visibility', 'visible');
        }
    });
}

function multiplicarLista() {
    $.each(listaGaleria, function( index, value ) {
        listaGaleria.push(value);
    });
}

function initGaleria(id){

    $('#divGaleria').empty();
    $('#filters').empty();
    $('#divPag').empty();
    $('#filters').append('<button class="button is-checked" onclick="initGaleria(-1)" id="M-1">Todos</button>');

    listaDiv = [];
    listaPag = [];
    indexPag = 0;

    var contenido = "";

    $.each(listaGaleria, function( index, value ) {

        $('#filters').append('<button class="button" onclick="initGaleria('+value.id_Cate+')" id="M'+value.id_Cate+'">' +
            ''+value.nombre_Cate+'</button>');

        if(id === -1){
            contenido += crearFoto(index, value);
        }else if(value.id_Cate === id){
            contenido += crearFoto(index, value);
        }
    });

    armarGaleria(contenido.split(','));
    activarMenu(id)
    $('#divGaleria').append(listaDiv[0]);
    initPag();
}

function crearFoto(index ,value) {

    var divs = "";

    $.each(listaGaleria[index].fotos_Cate, function( i, nameFoto ) {
        var item = foto;
        item = item.replaceAll('*id*', value.id_Cate);
        item = item.replaceAll('*cate*', value.nombre_Cate);
        item = item.replaceAll('*foto*', nameFoto);
        divs += item+",";

    });

    return divs;
}

function armarGaleria(lista) {
    var div = '<div class="isotope items">';
    var cont = 0;
    var contId = 0;

    for(var i=0; i<lista.length-1; i++){
        div += lista[i];
        cont += 1;

        if(cont === 6){
            div += '</div>';
            listaDiv.push(div);
            div = '<div class="isotope items">';
            cont = 0;
            listaPag.push(
                "<li class=\"page-item\" id='pag"+contId+"'>\n" +
                "<button class=\"page-link\" onclick=\"cambiarPag("+contId+")\">"+(contId+1)+"</button>\n" +
                "</li>"
            );
            contId += 1;
        }
    }
    if(cont !== 0){
        div += '</div>';
        listaDiv.push(div);
        listaPag.push(
            "<li class=\"page-item\" id='pag"+contId+"'>\n" +
            "<button class=\"page-link\" onclick=\"cambiarPag("+contId+")\">"+(contId+1)+"</button>\n" +
            "</li>"
        );
    }
}

function initPag() {
    $('#divPag').append(
        "<li class=\"page-item\">\n" +
        "<button class=\"page-link\" onclick='anterior()'><i class=\"fas fa-angle-left\"></i></button>\n" +
        "</li>"
    );

    if(listaDiv.length < 3){
        $.each(listaPag, function( index, value ) {
            $('#divPag').append(value);
        });
    }else{
        for(var i=0; i<3; i++) {
            $('#divPag').append(listaPag[i]);
        }
    }

    $('#divPag').append(
        "<li class=\"page-item\">\n" +
        "<button class=\"page-link\" onclick='siguiente()'><i class=\"fas fa-angle-right\"></i></button>\n" +
        "</li>"
    );

    activarPag(0);
}

function cambiarPag(id) {
    indexPag = id;
    $('#divGaleria').empty();
    $('#divGaleria').html(listaDiv[id]);

    $('#divPag').empty();
    $('#divPag').append(
        "<li class=\"page-item\">\n" +
        "<button class=\"page-link\" onclick='anterior()'><i class=\"fas fa-angle-left\"></i></button>\n" +
        "</li>"
    );
    if(id === 0){
        for(var i=0; i<3; i++) {
            $('#divPag').append(listaPag[i]);
        }
    }else{
        if(id === listaPag.length){
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

function activarPag(id) {
    $.each(listaPag, function( index, value ) {
        $('#pag'+index).removeClass('active');
    });
    $('#pag'+id).addClass('active');
}

function activarMenu(id) {
    $('#M-1').removeClass('is-checked');
    $('#M'+idAnt).removeClass('is-checked');
    $('#M'+id).addClass('is-checked');

    idAnt = id;
}

function primero() {
    cambiarPag(0);
}

function ultimo() {
    cambiarPag(listaPag.length-1);
}

function anterior() {
    if(indexPag > 0){
        cambiarPag(indexPag-1);
    }
}

function siguiente() {
    if(indexPag < (listaPag.length-1)){
        cambiarPag(indexPag+1);
    }
}