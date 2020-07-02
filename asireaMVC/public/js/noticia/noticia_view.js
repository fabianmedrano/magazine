$(document).ready( function () {
 
    iniciarTabla() ;




} );  


function iniciarTabla() {
    $('#noticias_list').dataTable( {
        data : getNoticias() ,
        language: {"url": "../../lib/DataTables/es.json"}  ,
        select: false,
        columns : [
            {title :"ID"    , data: "idnoticia" },
            {title :"Titulo", data: "titulo" },
           
            
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
                    return "<button id='modificarServicio' type='button' data-toggle='tooltip' data-placement='top' title='Modificar noticia' class='btn btn-outline-succes'   onclick='goEditNoticia(" + data.idnoticia + ")'><i class='fas fa-pencil-alt' ></i></button>";
                }
            },
            {
                targets: 3,
                data: null,
                orderable: false,
                width: "5%",
                className: "text-center bg-white",
                data: function (data, type, val) {
                    return "<button id='eliminarServicio' type='button' data-toggle='tooltip' data-placement='top' title='Eliminar noticia' onclick='deleteNoticia(" + data.idnoticia + ")' class='btn btn-outline-danger'><i class='far fa-trash-alt' ></i></button>";
                }
            }
        ],
    });
}


function getNoticias() {
    respuesta=[];
    $.ajax({
        url: "../../Controller/noticia/switch_controller.php",
        type: "POST",
        dataType: "json",
        data: {"btn_accion": "Obtener"},
        async:false,
        success: function(data){
            respuesta=data;
        },
        error: function(error){
             console.log("Error:");
             console.log(error);
        }
    });
   return respuesta;
}



function goEditNoticia(id) {
    location.href="http://localhost/asirea/asireaMVC/View/Noticia/noticia_edit_admin.php?noticia="+id
}

function deleteNoticia(id) {
    swal({
        title: "Está seguro?",
        text: "Se eliminara esta noticia.",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "eliminar!",
        cancelButtonText: "Cancelar",
        closeOnConfirm: false,
        showLoaderOnConfirm: true,
        closeOnCancel: false
    })
    .then((value) => {
        if (value) {
            //var $form = $("#form-noticia-delete"); solo el id
            var $accion = "&btn_accion=Eliminar";
            $.ajax({
                method:  "POST",
                url: "../../Controller/noticia/switch_controller.php",
                data:  {"btn_accion": "Eliminar","id_noticia":id},
                async: false,
                dataType: "json",
                success: function () {
                    swal("Noticia eliminada de forma exitosa", {
                        icon: "success",
                    });
                },
                error: function () {
                    swal("Ha ocurrido un error", "intente refrescar la pagina", "error");
                }
            });
        } else {
            swal("Cancelado", "Se ha cancelado la acción de eliminar", "error");
        }
    });

}