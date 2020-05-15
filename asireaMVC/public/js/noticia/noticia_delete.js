$(document).ready(function () {


    $("#form-noticia-delete").submit(function (ev) {
        ev.preventDefault();
        swal({
                title: "Está seguro?",
                text: "Se guardara esta noticia.",
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
                    var $form = $("#form-noticia-delete");
                    var $accion = "&btn_accion=Eliminar";
                    $.ajax({
                        method: $form.attr("method"),
                        url: $form.attr("action"),
                        data: $form.serialize() + $accion ,
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


    });




});