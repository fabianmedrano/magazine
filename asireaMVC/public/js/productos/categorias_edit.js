$listaCategorias = {};

$(document).ready(function() {
    obtener_categorias();
});

function obtener_categorias() {
    $('#divCargando').css('visibility', 'visible');
    $.ajax({
        url: "../../Controller/productos/Categorias_controller.php",
        type: "POST",
        data: {obtener_categoria: "true"},
        success: function (result) {
            $('#divCargando').css('visibility', 'hidden');
            $listaCategorias = jQuery.parseJSON(result);
            iniciar_TablaCategorias();
        }
    });
}

function iniciar_TablaCategorias() {

    $('#tbcategorias').DataTable({
        destroy: true,
        "scrollx": true,
        "lengthMenu": [ 5 ],
        data: $listaCategorias,
        columns: [
            { title: "Nombre", data: "nombre"  },
            { title: "Editar" },
            { title: "Eliminar" },
        ],
        "language": {"url": "../../public/configDatatable.json"},
        "columnDefs": [
            {
                "targets": 1,
                "width": "5%",
                "orderable": false,
                "className": "text-center",
                "mData": function (data, type, val) {
                    return (
                        '<button class="btn btn-outline-primary" onclick="abrirEditarCategoria('+data.id+')">' +
                        '<i class="fas fa-edit"></i>' +
                        '</button>'
                    );
                }
            },
            {
                "targets": 2,
                "orderable": false,
                "width": "5%",
                "className": "text-center",
                "mData": function (data, type, val) {
                    return (
                        '<button class="btn btn-outline-danger" onclick="eliminarCategoria('+data.id+')">' +
                            '<i class="fas fa-trash-alt"></i>' +
                        '</button>'
                    );
                }
            }
        ],
        "order": [[0, "desc"]],
        "autoWidth": false,
    });


}

function abrirModalCategoria() {
    $('#tituloModalCategoria').text('Registrar Categorias');
    $('#btnCategorias').text('Agregar');
    $('#cat').val('');
    $('#btnCategorias').attr('onclick', 'registrar_categorias()');
    $('#modalCategorias').modal('show');
}

function abrirEditarCategoria(id) {
    $('#tituloModalCategoria').text('Editar Categorias');
    $('#btnCategorias').text('Guardar');
    $('#cat').val($listaCategorias.filter(x => x.id === id)[0].nombre);
    $('#btnCategorias').attr('onclick', 'editar_categoria('+id+')');
    $('#modalCategorias').modal('show');
}

function editar_categoria(id) {
    var nombre = $("#cat").val();
    $('#spinerCargar').css('visibility', 'visible');
    $.ajax({
        url:"../../Controller/productos/Categorias_controller.php",
        type: "POST",
        data: {editar_categoria: "true",id: id, nombre: nombre},
        success: function (result) {
            if (result == 1){
                $('#spinerCargar').css('visibility', 'hidden');
                $('#modalCategorias').modal('hide');

                alertify.success("Categoría editada exitosamente.");

                obtener_categorias();
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Error al editar la categoría'
                })
            }
        }
    })
}

function registrar_categorias() {
    var nombre = $("#cat").val();
    $('#spinerCargar').css('visibility', 'visible');
    $.ajax({
        url:"../../Controller/productos/Categorias_controller.php",
        type: "POST",
        data: {registrar_categoria: "true", nombre: nombre},
        success: function (result) {
            if (result == 1){

                $('#spinerCargar').css('visibility', 'hidden');
                $('#modalCategorias').modal('hide');

                alertify.success("Categoría registrada exitosamente.");

                obtener_categorias();
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Error al registrar la categoría.'
                })
            }

        }
    })
}

function eliminarCategoria(id) {
    Swal.fire({
        title: 'Eliminar',
        text: "Esta acción no es reversible.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'OK',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url:"../../Controller/productos/Categorias_controller.php",
                type: "POST",
                data: {eliminar_producto: "true", id: id},
                success: function (result) {
                    console.log(result);
                    if (result === 1){

                        alertify.success("Categoría eliminada exitosamente.");

                        obtener_categorias();
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Error al eliminar la categoría.'
                        })
                    }

                }
            })
        }
    })
}