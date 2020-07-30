$listaProductos = {};
$listaCate = [
    {"id": 1, "nombre": "Peces"},
    {"id": 2, "nombre": "Animales"},
    {"id": 3, "nombre": "Plantas"},
];

$(document).ready(function () {
    //obtener_productos();
});

function obtener_productos() {
    $.ajax({
        url: "../../Controller/productos/switch_controller.php",
        type: "POST",
        data: {accion: 'get'},
        success: function (result) {
            $listaProductos = jQuery.parseJSON(result);
            iniciar_Tabla();
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

            { title: "ID", data: "id"  },
            { title: "Nombre", data: "nombre"  },
            { title: "Descripcion", data: "descripcion"  },
            { title: "Categoria", data: "categoria"  },


            { title: "Editar" },
            { title: "Eliminar" },

        ],
        "language": {"url": "json/configDatatable.json"},
        "columnDefs": [
            {
                "targets": 4,
                "data": null,
                "orderable": false,
                "width": "5%",
                "className": "text-center bg-white",
                "mData": function (data, type, val) {
                    return "<button id='modificarProducto' type='button' data-toggle='tooltip' data-placement='top' title='Modificar selección' class='cont-icono btn btn-outline-succes'><i class='fas fa-edit' onclick='abrirEditar(" + data.id + ")' ></i></button>";
                }
            },
            {
                "targets": 5,
                "data": null,
                "orderable": false,
                "width": "5%",
                "className": "text-center bg-white",
                "mData": function (data, type, val) {
                    return "<button id='eliminarProducto' type='button' data-toggle='tooltip' data-placement='top' title='Eliminar selección' class='cont-icono btn btn-outline-danger'><i class='far fa-trash-alt' onclick='eliminar_servicios(" + data.id + ")'></i></button>";
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