var listaCate = [];

$(document).ready(function () {
    getLista();
});

function getLista() {
    $('#divCargando').css('visibility', 'visible');
    $.ajax({
        url: '../../Controller/galeria/switch_controller.php',
        type: 'POST',
        data: { accion: 'get'},
        success: function (res) {
            $('#divCargando').css('visibility', 'hidden');
            listaCate = JSON.parse(res);
            initTable();
        }
    });
}

function abrirAlertaRegistro(id) {
    var list = listaCate.filter(x => x.id === id);
    var nombre = "";
    if(list.length > 0 ){
        nombre = list[0].nombre;
    }
    Swal.fire({
        title: 'Ingrese el nombre de la Categoria',
        html: '<input type="text" class="form-control" id="nombreCate" value="'+nombre+'" placeholder="Nombre"><br>',
        inputAttributes: {
            autocapitalize: 'off'
        },
        showCancelButton: true,
        confirmButtonText: 'Guardar',
        cancelButtonText: 'Cancelar',
        showLoaderOnConfirm: true,
        preConfirm: () => {
            var name = $('#nombreCate').val();
            if(name !== ""){
                if(id === 0){
                    guardar('insert', 0, name);
                }else{
                    guardar('update', id, name);
                }
            }else{
                Swal.showValidationMessage(
                    `No se aceptan campos vacios`
                )
            }

        },
        allowOutsideClick: () => !Swal.isLoading()
    })
}

async function guardar(accion, id, nombre) {
    var data = new FormData();

    data.append('accion', accion);
    data.append('id', id);
    data.append('name', nombre);

    $.ajax({
        url: '../../Controller/galeria/switch_controller.php',
        type: 'POST',
        data: data,
        contentType: false,
        processData: false,
        success: function (res) {
            console.log(res);
            var result = JSON.parse(res);
            getLista();
            alertas(result);
        }
    });
}

async function eliminarCategoria(id) {
    Swal.fire({
        title: 'Eliminar',
        text: "Esta acción no es reversible",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: 'btn btn-success',
        cancelButtonColor: 'btn btn-secondary',
        confirmButtonText: 'OK',
        cancelButtonText: 'Cancelar',
        allowOutsideClick: () => !Swal.isLoading()
    }).then((result) => {

        if (result.value) {

            $.ajax({
                url: '../../Controller/galeria/switch_controller.php',
                type: 'POST',
                data: { accion: 'delete', 'id': id},
                success: function (res) {
                    console.log(res);
                    getLista();
                    var result = JSON.parse(res);
                    alertas(result);
                }
            });

        }

    });
}

function abrirModalFotos(id) {
    var nombre = listaCate.filter(x => x.id === id)[0].nombre;

    $('#titleModalFotos').text("Fotos "+nombre);
    $('#modalBody').empty();
    $.ajax({
        url: '../../Controller/galeria/switch_controller.php',
        type: 'POST',
        data: { accion: 'name', 'id': id},
        success: function (res) {
            $('#modalBody').append('<input id="fotosCate" name="imagenes[]" type="file" multiple=true class="file-loading">');
            initDrop(id, JSON.parse(res));
            $('#modalFotos').modal('show');
        }
    });
}

function initDrop(id, lista) {
    $("#fotosCate").fileinput({
        language: "es",
        theme: 'fas',
        uploadUrl: "../../Controller/galeria/guardar_Img.php?carpeta="+id,
        //Todos se suben igual
        uploadAsync: false,
        showUpload: false,
        showRemove: false,
        overwriteInitial: false,
        initialPreview: lista.initialPreview,
        initialPreviewConfig: lista.initConfig,
        allowedFileExtensions: ['jpg', 'png']
    }).on("filebatchselected", function(event, file) {
        //Para guardarlo automaticamente
        $("#fotosCate").fileinput("upload");
    });
}

function initTable() {
    $('#tbCategorias').DataTable({
        destroy: true,
        "scrollx": true,
        data: listaCate,
        columns: [
            { title: "Nombre", data: "nombre" },
            { title: "Fotos" },
            { title: "Editar" },
            { title: "Eliminar" }
        ],
        "columnDefs": [
            {
                "targets": 1,
                "width": "5%",
                "orderable": false,
                "className": "text-center",
                "mData": function (data, type, val) {
                    return (
                        "<button class='btn btn-info' onclick='abrirModalFotos("+data.id+")'><i class=\"fas fa-images\"></i></button>"
                    );
                }
            },
            {
                "targets": 2,
                "width": "5%",
                "className": "text-center",
                "orderable": false,
                "mData": function (data, type, val) {
                    return (
                        "<button class='btn btn-primary' onclick='abrirAlertaRegistro("+data.id+")'><i class=\"fas fa-edit\"></i></button>"
                    );
                }
            },
            {
                "targets": 3,
                "width": "5%",
                "orderable": false,
                "className": "text-center",
                "mData": function (data, type, val) {
                    return (
                        "<button class='btn btn-danger' onclick='eliminarCategoria("+data.id+")'><i class=\"fas fa-trash-alt\"></i></button>"
                    );
                }
            }
        ],
        "language": {"url": "../../public/configDatatable.json"},
        "autoWidth": false
    });
}

function alertas(result) {
    if(result.status === 1){
        alertify.success(result.mensaje);
    }else if(result.status === 0){
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            text: result.mensaje
        });
    }else{
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: result.mensaje
        })
    }
}
