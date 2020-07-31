$listaProductos = {};
$listaCate = [];

$(document).ready(function () {
    obtener_categorias();
    obtener_productos();
});

function obtener_productos() {
    $('#divCargando').css('visibility', 'visible');
    $.ajax({
        url: "../../Controller/productos/switch_controller.php",
        type: "POST",
        data: {accion: 'get'},
        success: function (result) {
            $('#divCargando').css('visibility', 'hidden');
            console.log(result);
            $listaProductos = jQuery.parseJSON(result);
            iniciar_Tabla();
        }
    });
}

function obtener_categorias() {
    $.ajax({
        url: "../../Controller/productos/Categorias_controller.php",
        type: "POST",
        data: {obtener_categoria: "true"},
        success: function (result) {
            $listaCate = jQuery.parseJSON(result);
        }
    });
}

function abriModalRegistrar() {
    $('#catePro').html('<option value="-1"> --- SELECCIONE UNA OPCIÓN ---</option>');
    $('#nombrePro').val('');
    $('#desPro').val('');

    $.each($listaCate, function( index, value ) {
        $('#catePro').append('<option value="'+value.id+'">'+value.nombre+'</option>')
    });

    $('#btnGuardarPro').attr('onclick', "registrarProducto()");
    $("#modalProductos").modal('show');
}

function abrirModalEditar(id) {
    var item = $listaProductos.filter(x => x.id === id)[0];

    $('#catePro').html('<option value="-1"> --- SELECCIONE UNA OPCIÓN ---</option>');
    $.each($listaCate, function( index, value ) {
        $('#catePro').append('<option value="'+value.id+'">'+value.nombre+'</option>')
    });

    $('#nombrePro').val(item.nombre);
    $('#desPro').val(item.descripcion);

    document.getElementById('fileDoc').value = "";

    $('#btnGuardarPro').attr('onclick', "editarDoc("+id+",'"+item.img+"')");
    $('#modalProductos').modal('show');
}

function registrarProducto() {
    $('#btnGuardarSpinner').css('visibility', 'visible');
    var nombre = $('#nombrePro').val();
    var cate = $('#catePro').val();
    var descrip = $('#desPro').val();
    var file = document.getElementById('fileDoc');

    if(nombre !== "" && cate !== "-1" && descrip !== "" && file.value !== ""){
        var data = new FormData();
        data.append('accion', 'insert');
        data.append('nombrePro', nombre);
        data.append('catePro', cate);
        data.append('descripPro', descrip);
        data.append('file', file.files[0]);

        $.ajax({
            url: '../../Controller/productos/switch_controller.php',
            type: 'POST',
            data: data,
            contentType: false,
            processData: false,
            success: function (res) {
                $('#btnGuardarSpinner').css('visibility', 'hidden');

                $('#modalProductos').modal('hide');

                var result = JSON.parse(res);
                alertas(result);
            }
        });
    }else{
        $('#btnGuardarSpinner').css('visibility', 'hidden');
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            text: 'Tiene datos vacios!!'
        })
    }
}

function iniciar_Tabla() {

    $('#tbproducto').DataTable({
        destroy: true,
        "scrollx": true,
        "lengthMenu": [ 5 ],
        data: $listaProductos,
        columns: [

            { title: "Nombre", data: "nombre"  },
            { title: "Descripcion", data: "descripcion"  },
            { title: "Categoria", data: "cate"  },
            { title: "Editar" },
            { title: "Eliminar" },

        ],
        "language": {"url": "../../public/configDatatable.json"},
        "columnDefs": [
            {
                "targets": 3,
                "width": "5%",
                "orderable": false,
                "className": "text-center",
                "mData": function (data, type, val) {
                    return (
                        '<button class="btn btn-outline-primary" onclick="abrirModalEditar('+data.id+')">' +
                        '<i class="fas fa-edit"></i>' +
                        '</button>'
                    );
                }
            },
            {
                "targets": 4,
                "orderable": false,
                "width": "5%",
                "className": "text-center",
                "mData": function (data, type, val) {
                    return (
                        '<button class="btn btn-outline-danger" onclick="eliminarCategoria('+data.id+')">' +
                        '<i class="fas fa-trash-alt"></i>' +
                        '</button>'
                    );
                }
            }
        ],
        "order": [[0, "desc"]],
        "autoWidth": false
    });
}

function nombreFile() {
    var name = document.getElementById("fileDoc").value.split("\\").pop();

    $('#nameFileDoc').text(name);
}

function alertas(result) {
    if(result.status === 1){
        alertify.success(result.mensaje);
        obtener_productos();
    }else if(result.status === 0){
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            text: result.mensaje
        });
    }else{
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: result.mensaje
        })
    }
}