$listaProductos = {};
$tablaProductos = null;
$listaCategoriasProductos = {};
$Imagen_N = "http://localhost/asirea/codigo/data/img_o/hknqas9srqutqedzmv1r9yurrwl0u9ad878wss10.jpg";

$( document ).ready(function() {
    obtener_productos();
});

function obtener_productos() {
    $.ajax({
        url: "../data/BDProductos.php",
        type: "POST",
        data: {obtener_producto: "true"},
        success: function (result) {
            $listaProductos = jQuery.parseJSON(result);
            iniciar_Tabla();
        }
    });
}

function iniciar_Tabla() {
    if($tablaProductos != null){
        $tablaProductos.clear().destroy();
        $tablaProductos = null
    }

    $('[data-toggle="tooltip"]').tooltip({ trigger: "hover" });

    $tablaProductos = $('#tbProductos').DataTable({
        destroy: true,
        "scrollx": true,
        "lengthMenu": [ 5 ],
        data: $listaProductos,
        columns: [
            { title: "Categoria", data: "categoria"  },
            { title: "Imagen", data: "imagen"  },
            { title: "Nombre", data: "nombre"  },
            { title: "Descripcion", data: "descrip"  },


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
                    return "<button id='eliminarProducto' type='button' data-toggle='tooltip' data-placement='top' title='Eliminar selección' class='cont-icono btn btn-outline-danger'><i class='far fa-trash-alt' onclick='eliminar_producto(" + data.id + ")'></i></button>";
                }
            }
        ],
        "order": [[0, "asc"]],
        "autoWidth": false,
        "preDrawCallback": function(settings) {
            $("#tbProductos tbody tr").removeClass("seleccionado");
            $("#tbProductos tbody tr td").removeClass("selected");
        },
        "drawCallback": function(settings) {
            //$("#eliminarUsuario").prop("disabled", true);
            $("#tbProductos tbody tr").removeClass("selected");
            $('[data-toggle="tooltip"]').tooltip({ trigger: "hover" });
        }
    });

}

function abrirModalProductos() {
    $('#tituloModalProductos').text('Registrar Productos');
    $('#btnProductos').text('Agregar');
    $('#btnProductos').attr('onclick', 'registrar_productos()');
    $('#modalProductos').modal('show');


    // imagen
    $('#vizualizarImagenProductos').html(html);

    if($Imagen_N == ""){

        $("#input-b6").fileinput({
            language: "es",
            theme: 'fas',
            showUpload: false,
            uploadUrl:"data/procesarImagenes.php",
            autoReplace: true,
            dropZoneEnabled: true,
            maxFileCount: 1
        }).on('fileuploaded', function(event, previewId, index, fileId) {
            $Imagen_N = previewId.response.location;
            console.log($Imagen_N);
        });

    }else{

        $llave = $Imagen_N.replace("http://localhost/asirea/codigo/data/img_o/", "");
        $listaUrl = [];
        $listaPreview = [];

        var preview =  { caption : "visualizar.jpg", url : "data/borrarImagen.php" , key :  $llave  };
        $listaUrl.push($Imagen_N);
        $listaPreview.push(preview);

        var html =  "<input id='input-b6' name='input-b6' type='file' multiple>";

        $('#vizualizarImagenProductos').html(html);

        $("#input-b6").fileinput({
            theme: 'fas',
            showUpload: false,
            uploadUrl:"data/procesarImagenes.php",
            dropZoneEnabled: true,
            maxFileCount: 1,
            mainClass: "input-group-lg",
            initialPreviewAsData: true,
            initialPreview:
            //Previsualizar la imagen seleccionada
            $listaUrl,
            initialPreviewConfig : $listaPreview
        }).on('fileuploaded', function(event, previewId, index, fileId) {
            $Imagen_N = previewId.response.location;
        }).on('filebeforedelete', function(event, key, data) {

            swal( "Eliminó", "La imagen seleccionada fue eliminada", "success" );

        });

    }

    $('#modalProductos').modal('show');
}

function abrirModalCategorias() {
    $('#tituloModalCategorias').text('Registrar Categorias');
    $('#btnCategoriasProductos').text('Agregar');
    $('#btnCategoriasProductos').attr('onclick', 'registrar_Servicios()');
    $('#modalCategoriasProductos').modal('show');

}
