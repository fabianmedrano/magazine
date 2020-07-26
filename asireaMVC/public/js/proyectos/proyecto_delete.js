$(document).ready(function () {


    $("#form-proyecto-delete").submit(function (ev) {
        ev.preventDefault();

        Swal.fire({
            title: '¿Está seguro?',
            text: "¡Se eliminara esta proyecto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Eliminar!',
            cancelButtonText: "Cancelar",
        }).then((result) => {
            if (result.value) {

                var $form = $("#form-proyecto-delete");
                var $accion = "&btn_accion=Eliminar";
                $.ajax({
                    method: $form.attr("method"),
                    url: $form.attr("action"),
                    data: $form.serialize() + $accion,
                    async: false,
                    dataType: "json",
                    success: function () {

                        Swal.fire(
                            'Eliminada!',
                            'proyecto ha sido eliminada',
                            'success'
                        )

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


    });









});