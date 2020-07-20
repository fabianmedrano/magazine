$(document).ready(function () {


    jQuery.validator.addMethod("noSpecialCarter",
        function (value, element) {
            return /^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/.test(value);
        },
        "Nada de caracteres especiales, por favor"
    );
    jQuery.validator.addMethod("ckrequired", function (value, element) {
        var idname = $(element).attr('id');
        var editor = CKEDITOR.instances[idname];
        var ckValue = GetTextFromHtml(editor.getData()).replace(/<[^>]*>/gi, '').trim();
        if (ckValue.length === 0) {
            $(element).val(ckValue);
        } else {
            $(element).val(editor.getData());
        }
        return $(element).val().length > 0;
    }, "This field is required");

    jQuery.validator.addMethod("ckrequired", function (value, element) {
        var idname = $(element).attr('id');
        var editor = CKEDITOR.instances[idname];
        var ckValue = GetTextFromHtml(editor.getData()).replace(/<[^>]*>/gi, '').trim();
        if (ckValue.length === 0) {
            $(element).val(ckValue);
        } else {
            $(element).val(editor.getData());
        }
        return $(element).val().length > 0;
    }, "This field is required");

    function GetTextFromHtml(html) {
        var dv = document.createElement("DIV");
        dv.innerHTML = html;
        return dv.textContent || dv.innerText || "";
    }





    $("#form-noticia-edit").validate({
        rules: {
            titulo_noticia: {
                required: true,
                minlength: 4,
                maxlength: 90,
                noSpecialCarter: true
            },
            editor_noticia: {

                ckrequired: true,

            }

        },
        messages: {
            titulo_noticia: {
                required: "Necesitamos que escribas un titulo para la noticia",
                minlength: "Necesitamos por lo menos {0} caracteres",
                maxlength: "El titulo debe de ser menor a {0} caracteres",
                noSpecialCarter: "No se permiten caracteres especiales"
            },
            editor_noticia: {
                ckrequired: "Necesitamos que escribas la noticia",
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
                    error.appendTo("#error_noticia");
                    break;
                default:
                    break;
            }

        },
        submitHandler: function (form) {

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







        }
    });

});
