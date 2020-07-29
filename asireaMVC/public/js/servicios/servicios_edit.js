$listaServicios = {};

$(document).ready(function() {
    obtener_servicios();
});


function obtener_servicios() {
    $.ajax({
        url: "../../Controller/servicios/servicios_controller.php",
        type: "POST",
        data: {obtener_servicio: "true"},
        success: function (result) {
            $listaServicios = jQuery.parseJSON(result);
            iniciar_Tabla();
        }
    });
}

function iniciar_Tabla() {
    

    $('#tbservis').DataTable({
        destroy: true,
        "scrollx": true,
        "lengthMenu": [ 5 ],
        data: $listaServicios,
        columns: [

            { title: "ID", data: "id"  },
            { title: "Nombre", data: "nombre"  },
            { title: "Descripcion", data: "descripcion"  },


            { title: "Editar" },
            { title: "Eliminar" },

        ],
        "language": {"url": "json/configDatatable.json"},
        "columnDefs": [
            {
                "targets": 3,
                "data": null,
                "orderable": false,
                "width": "5%",
                "className": "text-center bg-white",
                "mData": function (data, type, val) {
                    return "<button id='modificarServicio' type='button' data-toggle='tooltip' data-placement='top' title='Modificar selección' class='cont-icono btn btn-outline-succes'><i class='fas fa-edit' onclick='abrirEditar(" + data.id + ")' ></i></button>";
                }
            },
            {
                "targets": 4,
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
            $("#tbservis tbody tr").removeClass("seleccionado");
            $("#tbservis tbody tr td").removeClass("selected");
        },
        "drawCallback": function(settings) {
            //$("#eliminarUsuario").prop("disabled", true);
            $("#tbservis tbody tr").removeClass("selected");
            $('[data-toggle="tooltip"]').tooltip({ trigger: "hover" });
        }
    });


}

function abrirModal() {
    $('#tituloModal').text('Registrar Servicios');
    $('#btnServicios').text('Agregar');
    $('#btnServicios').attr('onclick', 'registrar_servicios()');
    $('#modalServicios').modal('show');
}

function abrirEditar($id) {
    $('#tituloModalEditar').text('Editar Servicio');
    $('#btnServiciosEditar').text('Guardar Edición');


    for (var i=0; i < $listaServicios.length; i++){
        if($listaServicios[i].id == $id){
            $("#txt_id").val($listaServicios[i].id);
            $("#txt_id").attr("disabled", true);
            $("#nombreEditar").val($listaServicios[i].nombre);
            $("#textareaEditar").append($listaServicios[i].descripcion);

            i = $listaServicios.length;
        }

    }


    $('#btnServiciosEditar').attr('onclick', 'editar_datos()');
    $('#modalServiciosEditar').modal('show');


}

function editar_datos() {
    var nombre = $("#nombreEditar").val()
    var descripcion = $("#textareaEditar").val()
    var ids = $("#txt_id").val()

    $.ajax({
        url:"../../Controller/servicios/servicios_controller.php",
        type: "POST",
        data: {editar_servicio: "true",id: ids, nombre: nombre, descripcion: descripcion},
        success: function (result) {
            if (result == 1){
                alert("edición exitoso!");
                $("#nombreEditar").val("");
                $("#textareaEditar").val("");
                $("#txt_id").val("");
                $("#txt_id").attr("disabled", false);

                obtener_servicios();
            }else{
                alert("error al editar");
            }

        }
    })

}

function registrar_servicios() {
    var nombre =$ ("#nombre").val()
    var descripcion =$ ("#textarea").val()
    

    $.ajax({
        url:"../../Controller/servicios/servicios_controller.php",
        type: "POST",
        data: {registrar_servicio: "true", nombre: nombre, descripcion: descripcion},
        success: function (result) {
            if (result == 1){
                alert("registro exitoso!");
                $("#nombre").val("");
                $("#textarea").val("");
                obtener_servicios();
            }else{
                alert("error al insertar");
            }

        }
    })

}

function eliminar_servicios(id) {

    $.ajax({
        url:"../../Controller/servicios/servicios_controller.php",
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