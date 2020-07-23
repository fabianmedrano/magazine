$(document).ready(function () {


var $ruleti = [
    {
    error: "required_title",
    msg: "Debe ingresar un titulo"
},
{
    error: "max_title",
    msg: "Excedio el tamaño para el titulo"
},

];

    var $ruleck = [
        {
        error: "required_content",
        msg: "Debe ingresar más contenido para la pagina"
    },
    {
        error: "max_content",
        msg: "Excedio el tamaño de la para el contenido de la pagina"
    },
];


    var $texto ="";

    var instance = CKEDITOR.instances.editor_noticia;
    instance.on('change', function (evt) {
       $texto = CKEDITOR.instances.editor_noticia.getData().replace(/<[^>]*>/gi, '').trim();
        $texto = $texto.replace(/(\r\n|\n|\r)/gm, "");

        validado = validarCkeditor($texto,$ruleck, $('#error_noticia'));
    });


    $("#titulo_noticia").bind(" change click keyup input paste", function(event){
        $titulo =  $("#titulo_noticia").val().trim();
        validado = validarTitle($titulo,$ruleti, $('#error_titulo'));
    });
    

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
