/*$listaServicios = {};
$tablaServicios = null;
$Imagen_N = "http://localhost/asirea/codigo/data/img_o/hknqas9srqutqedzmv1r9yurrwl0u9ad878wss10.jpg";
*/
$(document).ready(function() {

    $('#tbServicios').DataTable({
        paging: true,
        
    });

    


});

    //validarSesion();
   // obtener_servicios();

   $("#form-sevicios-create").submit(function (ev) {
    ev.preventDefault();
    // var imagen =$ ("#imagen").val()
    var $form = $("form-sevicios-create");
    var $accion = "&btn_accion=Guardar";

    $.ajax({
        method: $form.attr("method"),
        url: $form.attr("action"),
        data: $form.serialize() + $accion ,
        success: function (result) {
            if (result == 1){
                alert("registro exitoso!");
                $("#nombreServicio").val("");
                $("#textarea").val("");
                obtener_servicios();
            }else{
                alert("error al insertar");
            }
        }
    })
});


function obtener_servicios() {
    $.ajax({
        url: "DataServicios.php",
        type: "POST",
        data: {getServicios: "true"},
        success: function (result) {
            $listaServicios = jQuery.parseJSON(result);
            iniciar_Tabla();
        }
    });
}

function iniciar_Tabla() {
    if($tablaServicios != null){
        $tablaServicios.clear().destroy();
        $tablaServicios = null
    }

    $('[data-toggle="tooltip"]').tooltip({ trigger: "hover" });

    $tablaServicios = $('#tbServicios').DataTable({
        destroy: true,
        "scrollx": true,
        "lengthMenu": [ 5 ],
        data: $listaServicios,
        columns: [

            { title: "Nombre", data: "nombre"  },
            { title: "Descripcion", data: "descrip"  },


            { title: "Editar" },
            { title: "Eliminar" },

        ],
        "language": {"url": "json/configDatatable.json"},
        "columnDefs": [
            {
                "targets": 2,
                "data": null,
                "orderable": false,
                "width": "5%",
                "className": "text-center bg-white",
                "mData": function (data, type, val) {
                    return "<button id='modificarServicio' type='button' data-toggle='tooltip' data-placement='top' title='Modificar selección' class='cont-icono btn btn-outline-succes'><i class='fas fa-edit' onclick='abrirEditar(" + data.id + ")' ></i></button>";
                }
            },
            {
                "targets": 3,
                "data": null,
                "orderable": false,
                "width": "5%",
                "className": "text-center bg-white",
                "mData": function (data, type, val) {
                    return "<button id='eliminarServicio' type='button' data-toggle='tooltip' data-placement='top' title='Eliminar selección' class='cont-icono btn btn-outline-danger'><i class='far fa-trash-alt' onclick='eliminar_servicios(" + data.id + ")'></i></button>";
                }
            }
        ],
        "order": [[0, "asc"]],
        "autoWidth": false,
        "preDrawCallback": function(settings) {
            $("#tbServicios tbody tr").removeClass("seleccionado");
            $("#tbServicios tbody tr td").removeClass("selected");
        },
        "drawCallback": function(settings) {
            //$("#eliminarUsuario").prop("disabled", true);
            $("#tbServicios tbody tr").removeClass("selected");
            $('[data-toggle="tooltip"]').tooltip({ trigger: "hover" });
        }
    });


}

function abrirModal() {
    $('#tituloModal').text('Registrar Servicio');
    $('#btnServicios').text('Agregar');
    $('#btnServicios').attr('onclick', 'registrar_Servicios()');
    $('#modalServicios').modal('show');


    // imagen
    $('#vizualizarImagenServicios').html(html);

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

        $('#vizualizarImagenServicios').html(html);

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

    $('#modalServicios').modal('show');
}

function abrirEditar($id) {
    $('#tituloModal').text('Editar Servicio');
    $('#btnServicios').text('Guardar Edición');


    for (var i=0; i < $listaServicios.length; i++){
        if($listaServicios[i].id == $id){
           //imagen  $("#")
            $("#nombreServicio").val($listaServicios[i].nombre);

            $("#textarea").val($listaServicios[i].carrera);

            i = $listaServicios.length;
        }

    }


    $('#btnServicios').attr('onclick', 'editar_datos()');
    $('#modalServicios').modal('show');


}

function editar_datos() {

    // var imagen =$("#imagen").val()
    var nombreServicios =$ ("#nombreServicio").val()
    var descrip =$ ("#textarea").val()


    $.ajax({
        url:"servicios.php",
        type: "POST",
        data: {editar_servicio: "true", nombre: nombreServicios, descrip: descrip},
        success: function (result) {
            if (result == 1){
                alert("edición exitoso!");
                $("#nombreServicio").val("");
                $("#textarea").val("");

                obtener_servicios();
            }else{
                alert("error al editar");
            }

        }
    })

}


function eliminar_servicios(id) {

    $.ajax({
        url:"servicios.php",
        type: "POST",
        data: {eliminar_servicio: "true",id: id},
        success: function (result) {
            if (result == 1){
                alert("eliminación exitosa!");

                obtener_servicios();
            }else{
                alert("error al eliminar");
            }

        }
    })

}
