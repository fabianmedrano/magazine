$(document).ready(function () {

    iniciarTabla();




});


function iniciarTabla() {
    $('#proyectos_list').dataTable({
        data: getproyectos(),
        language: { "url": "../../lib/DataTables/es.json" },
        select: false,
        columns: [
            { title: "Titulo", data: "titulo" },
            { title: "Fecha", data: "fecha" },

            { title: "Editar" },
            { title: "Eliminar" },
        ],
        columnDefs: [
            {
                targets: 2,
                data: null,
                orderable: false,
                width: "5%",
                className: "text-center bg-white",
                data: function (data, type, val) {
                    return "<button  type='button' data-toggle='tooltip' data-placement='top' title='Modificar proyecto' class='btn btn-outline-success'   onclick='goEditproyecto(" + data.idProyecto + ")'><i class='fas fa-edit' ></i></button>";
                }
            },
            {
                targets: 3,
                data: null,
                orderable: false,
                width: "5%",
                className: "text-center bg-white",
                data: function (data, type, val) {
                    return "<button id='"+data.idproyecto+"' type='button' data-toggle='tooltip' data-placement='top' title='Eliminar proyecto' onclick='deleteproyecto(" + data.idProyecto + ")' class='btn btn-outline-danger'><i class='far fa-trash-alt' ></i></button>";
                }
            }
        ],
    });
}


function getproyectos() {
    respuesta = [];
    $.ajax({
        url: "../../Controller/proyectos/switch_controller.php",
        type: "POST",
        dataType: "json",
        data: { "btn_accion": "Obtener" },
        async: false,
        success: function (data) {
            respuesta = data;
        },
        error: function (error) {
            console.log("Error:");
            console.log(error);
        }
    });
    return respuesta;
}



function goEditproyecto(id) {
    location.href = "http://localhost/asirea/asireaMVC/View/proyectos/proyecto_edit_admin.php?proyecto=" + id
}

function deleteproyecto(id) {

    Swal.fire({
        title: '¿Está seguro?',
        text: "¡Se eliminara este proyecto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Eliminar!',
        cancelButtonText: "Cancelar",
    }).then((result) => {
        if (result.value) {
            $.ajax({
                method: "POST",
                url: "../../Controller/proyectos/switch_controller.php",
                data: { "btn_accion": "Eliminar", "id_proyecto": id },
                async: false,
                dataType: "json",
                success: function () {
                    Swal.fire(
                        'Eliminada!',
                        'proyecto ha sido eliminada',
                        'success'
                    )
                    $('#'+id).parent().parent().remove();

                },
                error: function () {
                    Swal.fire(
                        'Ha ocurrido un error',
                        'intente refrescar la pagina',
                        'error'
                    )

                }
            });
        }
        else {
            Swal.fire(
                'Cancelado',
                'Se ha cancelado la acción de eliminar',
                'error'
            )
        }
    });

}