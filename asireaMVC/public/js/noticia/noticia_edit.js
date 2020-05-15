$(document).ready(function () {


    $("#form-noticia-edit").submit(function (ev) {
        ev.preventDefault();
        swal({
                title: "Está seguro?",
                text: "Se modificara esta noticia. Esta acción es irreversible!",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Actualizar!",
                cancelButtonText: "Cancelar",
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
                closeOnCancel: false
            })
            .then((value) => {
                if (value) {
                    var $form = $("#form-noticia-edit");
                    var $accion = "&btn_accion=Actualizar";
                    var $id = "&id_noticia=" + $form.attr("name")

                    $.ajax({
                        method: $form.attr("method"),
                        url: $form.attr("action"),
                        data: $form.serialize() + $accion + $id,
                        async: false,
                        dataType: "json",
                        success: function () {
                            swal("Noticia actualizada de forma exitosa", {
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