
$(document).ready(function () {


    CKEDITOR.replace('editor_nosotros', {
        filebrowserBrowseUrl: '/asirea/asireaMVC/lib/filemanager/filemanager/dialog.php?type=2&editor=ckeditor&fldr=nosotros/principal/',
        filebrowserUploadUrl: '/asirea/asireaMVC/lib/filemanager/filemanager/dialog.php?type=2&editor=ckeditor&fldr=nosotros/principal/',
        filebrowserImageBrowseUrl: '/asirea/asireaMVC/lib/filemanager/filemanager/dialog.php?type=1&editor=ckeditor&fldr=nosotros/principal/'

    });

var $rule = [
        {
        error: "required_content",
        msg: "Debe ingresar más contenido para la pagina"
    },
    {
        error: "max_content",
        msg: "Excedio el tamaño de la para el contenido de la pagina"
    },
    {
        error: "min_img",
        msg: "Debe de agregar almenos una imagen"
    },
];


    var $texto ="";

    var instance = CKEDITOR.instances.editor_nosotros;
    instance.on('change', function (evt) {
       $texto = CKEDITOR.instances.editor_nosotros.getData().replace(/<[^>]*>/gi, '').trim();
        $texto = $texto.replace(/(\r\n|\n|\r)/gm, "");
        validado = validarCkeditor($texto,$rule, $('#error_nosotros'));
    });




    $("#form-nosotros-edit").submit(function (ev) {

        ev.preventDefault();
        $texto = CKEDITOR.instances.editor_nosotros.getData().replace(/<[^>]*>/gi, '').trim();
        $texto = $texto.replace(/(\r\n|\n|\r)/gm, "");

        if(validarCkeditor($texto,$rule, $('#error_nosotros')) /* &&  validarFileInput($('.file-preview-initial') , $rule , $('#error_fileinput'))*/){

            Swal.fire({
                title: '¿Está seguro?',
                text: "¡Se modificara la informacion. Esta acción es irreversible!!",
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

                    var $form = $("#form-nosotros-edit");
                    var $accion = "&btn_accion=Actualizar";
                    $.ajax({
                        method: $form.attr("method"),
                        url: $form.attr("action"),
                        data: $form.serialize() + $accion,
                        async: false,
                        dataType: "json",

                        success: function () {
                            Swal.fire(
                                'Guardada!',
                                'Infomacion guardada de forma exitosa',
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
                } else {Swal.fire(
                    'Cancelado',
                    'Se ha cancelado la acción de guardar',
                    'error'
                )}
            });

        }
    });


});









