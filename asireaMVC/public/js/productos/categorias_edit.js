/*$listaCategorias = {};


$(document).ready(function() {
    alert("hola");
    obtener_categorias();
});

function obtener_categorias() {
    $.ajax({
        url: "../../Controller/productos/categorias_controller.php",
        type: "POST",
        data: {obtener_categoria: "true"},
        success: function (result) {
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

            { title: "ID", data: "id"  },
            { title: "Nombre", data: "nombre"  },
           
            { title: "Editar" },
            { title: "Eliminar" },

        ],
        "language": {"url": "json/configDatatable.json"},
        "columnDefs": [
            {
                "targets": 2,
                "data": null,
                "orderable": false,
                "width": "5%",
                "className": "text-center bg-white",
                "mData": function (data, type, val) {
                    return "<button id='modificarCategoria' type='button' data-toggle='tooltip' data-placement='top' title='Modificar selección' class='cont-icono btn btn-outline-succes'><i class='fas fa-edit' onclick='abrirEditarCategoria(" + data.id + ")' ></i></button>";
                }
            },
            {
                "targets": 3,
                "data": null,
                "orderable": false,
                "width": "5%",
                "className": "text-center bg-white",
                "mData": function (data, type, val) {
                    return "<button id='eliminarCategoria' type='button' data-toggle='tooltip' data-placement='top' title='Eliminar selección' class='cont-icono btn btn-outline-danger'><i class='far fa-trash-alt' onclick='eliminar_servicios(" + data.id + ")'></i></button>";
                }
            }
        ],
        "order": [[0, "asc"]],
        "autoWidth": false,
        "preDrawCallback": function(settings) {
            $("#tbcategorias tbody tr").removeClass("seleccionado");
            $("#tbcategorias tbody tr td").removeClass("selected");
        },
        "drawCallback": function(settings) {
        
            $("#tbcategorias tbody tr").removeClass("selected");
            $('[data-toggle="tooltip"]').tooltip({ trigger: "hover" });
        }
    });


}

function abrirModalCategoria() {
    $('#tituloModalCategoria').text('Registrar Categorias');
    $('#btnCategorias').text('Agregar');
    $('#btnCategorias').attr('onclick', 'registrar_categorias()');
    $('#modalCategorias').modal('show');
    
}


function abrirEditarCategoria($id) {
    $('#tituloModalEditarCategoria').text('Editar Categoria');
    $('#btnCategoriasEditar').text('Guardar Edición');


    for (var i=0; i < $listaCategorias.length; i++){
        if($listaCategorias[i].id == $id){
            $("#idEditar").val($listaCategorias[i].id);
            $("#idEditar").attr("disabled", true);
            $("#catEditar").val($listaCategorias[i].nombre);
            

            i = $listaCategorias.length;
        }

    }


    $('#btnCategoriasEditar').attr('onclick', 'editar_categoria()');
    $('#modalEditarCategorias').modal('show');


}

function editar_categoria() {
    var nombre =$ ("#catEditar").val()
    var id =$ ("#idEditar").val()
    

    $.ajax({
        url:"../../Controller/productos/categorias_controller.php",
        type: "POST",
        data: {editar_categoria: "true",id: id, nombre: nombre},
        success: function (result) {
            if (result == 1){
                alert("edición exitoso!");
                $("#catEditar").val("");
                $("#idEditar").val("");
                $("#idEditar").attr("disabled", false);

                obtener_categorias();
            }else{
                alert("error al editar");
            }

        }
    })

}

function registrar_categorias() {
    var nombre =$ ("#cat").val()


    $.ajax({
        url:"../../Controller/productos/categorias_controller.php",
        type: "POST",
        data: {registrar_categoria: "true", nombre: nombre},
        success: function (result) {
            if (result == 1){
                alert("registro exitoso!");
                $("#cat").val("");
                
                obtener_categorias();
            }else{
                alert("error al insertar");
            }

        }
    })

}*/

$(document).ready(function(){
    alert("Hola");
});