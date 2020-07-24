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
            $texto = CKEDITOR.instances.editor_noticia.getData().replace(/<[^>]*>/gi, '').trim();
            $texto = $texto.replace(/(\r\n|\n|\r)/gm, "");
            $titulo =  $("#titulo_noticia").val().trim();
            
        if(validarCkeditor($texto,$ruleck, $('#error_noticia')) &&  validarTitle($titulo,$ruleti, $('#error_titulo'))  ){


            Swal.fire({
                title: '¿Está seguro?',
                text: "Se modificara esta noticia. Esta acción es irreversible!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Actualizar!',
                cancelButtonText: "Cancelar",
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
                closeOnCancel: false
            }).then((result) => {
                if (result.value) {

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

                                     
                                Swal.fire(
                                    'Actualizada!',
                                    'Noticia actualizada con exito',
                                    'success'
                                )
                            
                            },
                            error: function () {
                                Swal.fire(
                                    "Ha ocurrido un error",
                                    "intente refrescar la pagina", 
                                    "error"
                                    );
                            }
                        });
                    } else {
                        Swal.fire(
                            'Cancelado',
                            'Se ha cancelado la acción de Actualizar',
                            'error'
                        )  }


                });
            }
       
    });

});
