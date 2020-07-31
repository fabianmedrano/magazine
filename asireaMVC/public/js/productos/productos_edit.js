$listaProductos = {};

$(document).ready(function () {
    obtener_productos();
});

function obtener_productos() {
    $('#divCargando').css('visibility', 'visible');
    $.ajax({
        url: "../../Controller/productos/switch_controller.php",
        type: "POST",
        data: {accion: 'get'},
        success: function (result) {
            $('#divCargando').css('visibility', 'hidden');
            console.log(result);
            $listaProductos = jQuery.parseJSON(result);
            iniciar_Tabla();
        }
    });
}

function abrirModal(id) {
    var item = $listaProductos.filter(x => x.id === id)[0];

    $('#modalBody').html(
        '<img src="../../public/img/productos/'+item.img+'" alt="Foto" style="height: 100%; width: 100%;">'
    );

    $('#modalImg').modal('show');
}

function eliminarProducto(id) {
    alert(id);
    Swal.fire({
        title: 'Eliminar',
        text: "Esta acción no es reversible",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: 'btn btn-success',
        cancelButtonColor: 'btn btn-secondary',
        confirmButtonText: 'OK',
        cancelButtonText: 'Cancelar'
    }).then((result) => {

        if (result.value) {
            var item = $listaProductos.filter(x => x.id === id)[0];
            $.ajax({
                url: '../../Controller/productos/switch_controller.php',
                type: 'POST',
                data: { accion: 'delete', 'id': id, 'archivo':item.img},
                success: function (res) {
                    console.log(res);
                    var result = JSON.parse(res);
                    alertas(result);
                }
            });

        }
    });
}

function iniciar_Tabla() {

    $('#tbproducto').DataTable({
        destroy: true,
        "scrollx": true,
        "lengthMenu": [ 5 ],
        data: $listaProductos,
        columns: [

            { title: "Nombre", data: "nombre"  },
            { title: "Descripcion", data: "descripcion"  },
            { title: "Categoria", data: "cate"  },
            { title: "Foto" },
            { title: "Editar" },
            { title: "Eliminar" },

        ],
        "language": {"url": "../../public/configDatatable.json"},
        "columnDefs": [
            {
                "targets": 3,
                "width": "5%",
                "orderable": false,
                "className": "text-center",
                "mData": function (data, type, val) {
                    return (
                        '<button class="btn btn-outline-secondary" onclick="abrirModal('+data.id+')">' +
                        '<i class="fas fa-images"></i>' +
                        '</button>'
                    );
                }
            },
            {
                "targets": 4,
                "width": "5%",
                "orderable": false,
                "className": "text-center",
                "mData": function (data, type, val) {
                    return (
                        '<a class="btn btn-outline-primary" href="producto_edit_admin.php?producto='+data.id+'">' +
                        '<i class="fas fa-edit"></i>' +
                        '</a>'
                    );
                }
            },
            {
                "targets": 5,
                "orderable": false,
                "width": "5%",
                "className": "text-center",
                "mData": function (data, type, val) {
                    return (
                        '<button class="btn btn-outline-danger" onclick="eliminarProducto('+data.id+')">' +
                        '<i class="fas fa-trash-alt"></i>' +
                        '</button>'
                    );
                }
            }
        ],
        "order": [[0, "desc"]],
        "autoWidth": false
    });
}

function alertas(result) {
    if(result.status === 1){
        alertify.success(result.mensaje);
        obtener_productos();
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