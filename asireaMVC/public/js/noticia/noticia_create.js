$(document).ready(function () {
    jQuery.validator.addMethod("sin caracteres especiales",
        function (value, element) {
            return /^[A-Za-z\d=#$%@_ -]+$/.test(value);
        },
        "Nada de caracteres especiales, por favor"
    );

    
    $("#form-noticia-create").validate({
        rules: {
            titulo_noticia: {
                required: true,
                minlength: 4,
                maxlength: 90
            },
            editor_noticia: {
                required: true,
                minlength: 100,
                maxlength: 600
            }
        },
        messages: {
            titulo_noticia: {
                required: "Necesitamos que escribas un titulo para la noticia",
                minlength: "Necesitamos por lo menos {0} caracteres",
                maxlength: "El titulo debe de ser menor a {0} caracteres"
            },
            editor_noticia: {
                required: "Necesitamos que escribas un cuero a esta noticia",
                minlength: "debe de escribir menos {0} caracteres",
                maxlength: "El titulo debe de ser menor a {0} caracteres"
            }
        },
        errorElement: "div",

        errorPlacement: function (error, element) {
            console.log(element.attr("name"));

            switch (element.attr("name")) {
                case "titulo_noticia":
                    error.appendTo("#error_titulo");
                    break;
                case "editor_noticia":
                    error.appendTo("#error_titulo");
                    break;
                default:
                    break;
            }

        },
        submitHandler: function (form) {


            swal({
                title: "Está seguro?",
                text: "Se guardara esta noticia.",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Guardar!",
                cancelButtonText: "Cancelar",
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
                closeOnCancel: false
            })
                .then((value) => {
                    if (value) {
                        var $form = $("#form-noticia-create");
                        var $accion = "&btn_accion=Guardar";
                        $.ajax({
                            method: $form.attr("method"),
                            url: $form.attr("action"),
                            data: $form.serialize() + $accion,
                            async: false,
                            dataType: "json",
                            success: function () {
                                swal("Noticia guardada de forma exitosa", {
                                    icon: "success",
                                });
                            },
                            error: function () {
                                swal("Ha ocurrido un error", "intente refrescar la pagina", "error");
                            }
                        });
                    } else {
                        swal("Cancelado", "Se ha cancelado la acción de guardar", "error");
                    }
                });




        }
    });








});