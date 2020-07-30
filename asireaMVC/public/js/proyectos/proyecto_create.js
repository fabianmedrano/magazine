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
    var $titulo ="";

    var instance = CKEDITOR.instances.editor_proyecto;
    instance.on('change', function (evt) {
       $texto = CKEDITOR.instances.editor_proyecto.getData().replace(/<[^>]*>/gi, '').trim();
        $texto = $texto.replace(/(\r\n|\n|\r)/gm, "");

        validado = validarCkeditor($texto,$ruleck, $('#error_proyecto'));
    });


    $("#titulo_proyecto").bind(" change click keyup input paste", function(event){
        $titulo =  $("#titulo_proyecto").val().trim();
        validado = validarTitle($titulo,$ruleti, $('#error_titulo'));
    });
    

    $("#form-proyecto-create").submit(function (ev) {
        ev.preventDefault();

        $texto = CKEDITOR.instances.editor_proyecto.getData().replace(/<[^>]*>/gi, '').trim();
        $texto = $texto.replace(/(\r\n|\n|\r)/gm, "");
        $titulo =  $("#titulo_proyecto").val().trim();
        
        if(validarCkeditor($texto,$ruleck, $('#error_proyecto')) &&  validarTitle($titulo,$ruleti, $('#error_titulo'))  ){




            Swal.fire({
                title: '¿Está seguro?',
                text: "¡Se guardara este proyecto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Guardar!',
                cancelButtonText: "Cancelar",
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
                closeOnCancel: false
            }).then((result) => {
                if (result.value) {
                        var $form = $("#form-proyecto-create");
                        var $accion = "&btn_accion=Guardar";
                        $.ajax({
                            method: $form.attr("method"),
                            url: $form.attr("action"),
                            data: $form.serialize() + $accion,
                            async: false,
                            dataType: "json",
                            success: function () {
                      
                                Swal.fire(
                                    'Guardada!',
                                    'proyecto guardada de forma exitosa',
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
                            'Se ha cancelado la acción de guardar',
                            'error'
                        )
                    }
                });






        }
    });










});