var listaDoc = [];

$(document).ready(function () {
    getLista();
});

function getLista() {
    $('#divCargando').css('visibility', 'visible');
    $.ajax({
        url: '../../Controller/biblioteca/switch_controller.php',
        type: 'POST',
        data: { accion: 'get'},
        success: function (res) {

            $('#divCargando').css('visibility', 'hidden');
            listaDoc = JSON.parse(res);
            initTable();
        }
    });
}

function abrirModalRegistro() {

    $('#nombreDoc').val('');
    $('#desDoc').val('');
    document.getElementById('fileDoc').value = "";
    $('#nameFileDoc').text('Seleccione un archivo...');
    $('#autorDoc').tagsinput('removeAll');

    $('#btnGuardar').attr('onclick', 'registrarDoc()')

    $('#modalRegistro').modal('show');
}

function abrirModalEditar(id) {
    var item = listaDoc.filter(x => x.id === id)[0];

    $('#nombreDoc').val(item.nombre);
    $('#desDoc').val(item.descripcion);
    $('#nameFileDoc').text(item.archivo);
    $('#autorDoc').tagsinput('removeAll');
    var autor = (item.autor).split(',');
    $.each(autor, function( index, value ) {
        $('#autorDoc').tagsinput('add', value);
    });

    document.getElementById('fileDoc').value = "";

    $('#btnGuardar').attr('onclick', "editarDoc("+id+",'"+item.archivo+"')");

    $('#modalRegistro').modal('show');
}

function registrarDoc() {
    $('#btnGuardarSpinner').css('visibility', 'visible');
    var nombre = $('#nombreDoc').val();
    var autor = $('#autorDoc').val();
    var descrip = $('#desDoc').val();
    var file = document.getElementById('fileDoc');

    if(nombre !== "" && autor !== "" && descrip !== "" && file.value !== ""){
        var data = new FormData();
        data.append('accion', 'insert');
        data.append('nombreDoc', nombre);
        data.append('autorDoc', autor);
        data.append('descrip', descrip);
        data.append('file', file.files[0]);

        $.ajax({
            url: '../../Controller/biblioteca/switch_controller.php',
            type: 'POST',
            data: data,
            contentType: false,
            processData: false,
            success: function (res) {
                $('#btnGuardarSpinner').css('visibility', 'hidden');
                getLista();
                //console.log(res);
                $('#modalRegistro').modal('hide');
                var result = JSON.parse(res);
                alertas(result);
            }
        });
    }else{
        $('#btnGuardarSpinner').css('visibility', 'hidden');
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            text: 'Tiene datos vacios!!'
        })
    }
}

function editarDoc(id, archivoAnt) {
    $('#btnGuardarSpinner').css('visibility', 'visible');
    var nombre = $('#nombreDoc').val();
    var autor = $('#autorDoc').val();
    var descrip = $('#desDoc').val();
    var file = document.getElementById('fileDoc');

    if(nombre !== "" && autor !== "" && descrip !== ""){
        var data = new FormData();
        data.append('accion', 'update');
        data.append('id', id);
        data.append('nombreDoc', nombre);
        data.append('autorDoc', autor);
        data.append('descrip', descrip);
        data.append('archivoAnt', archivoAnt);

        if(archivoAnt === $('#nameFileDoc').text()){
            data.append('update', 0);
        }else{
            data.append('update', 1);
        }

        data.append('file', file.files[0]);

        $.ajax({
            url: '../../Controller/biblioteca/switch_controller.php',
            type: 'POST',
            data: data,
            contentType: false,
            processData: false,
            success: function (res) {
                $('#btnGuardarSpinner').css('visibility', 'hidden');
                getLista();
                //console.log(res);
                $('#modalRegistro').modal('hide');
                var result = JSON.parse(res);
                alertas(result);
            }
        });
    }else{
        $('#btnGuardarSpinner').css('visibility', 'hidden');
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            text: 'Tiene datos vacios!!'
        })
    }
}

function eliminarDoc(id) {

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
            $('#divCargando').css('visibility', 'visible');
            var item = listaDoc.filter(x => x.id === id)[0];
            $.ajax({
                url: '../../Controller/biblioteca/switch_controller.php',
                type: 'POST',
                data: { accion: 'delete', 'id': id, 'archivo': item.archivo},
                success: function (res) {
                    getLista();
                    //console.log(res);
                    var result = JSON.parse(res);
                    alertas(result);
                }
            });

        }
    });
}

function getDescripcion(id) {
    var item = listaDoc.filter(x => x.id === id)[0];

    $('#textModal').text(item.descripcion);

    $('#modalInfo').modal('show');
}

function initTable() {
    $('#tbDocumentos').DataTable({
        destroy: true,
        "scrollx": true,
        data: listaDoc,
        columns: [
            { title: "Nombre", data: "nombre" },
            { title: "Autor(es)", data: "autor" },
            { title: "Última Actualización" },
            { title: "Descripción" },
            { title: "Archivo" },
            { title: "Editar" },
            { title: "Eliminar" }
        ],
        "columnDefs": [
            {
                "targets": 2,
                "width": "10%",
                "className": "text-center",
                "mData": function (data, type, val) {
                    return (
                        "<p>"+convertirFecha(data.fecha)+"</p>"
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
                        "<button class='btn btn-outline-secondary' onclick='getDescripcion("+data.id+")'><i class=\"fas fa-info-circle\"></i></button>"
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
                        "<button class='btn btn-outline-info' ><i class=\"fas fa-file\"></i></button>"
                    );
                }
            },
            {
                "targets": 5,
                "width": "5%",
                "orderable": false,
                "className": "text-center",
                "mData": function (data, type, val) {
                    return (
                "<button class='btn btn-outline-primary' onclick='abrirModalEditar("+data.id+")'><i class=\"fas fa-edit\"></i></button>"
                    );
                }
            },
            {
                "targets": 6,
                "width": "5%",
                "orderable": false,
                "className": "text-center",
                "mData": function (data, type, val) {
                    return (
                        "<button class='btn btn-outline-danger' onclick='eliminarDoc("+data.id+")'><i class=\"fas fa-trash-alt\"></i></button>"
                    );
                }
            }
        ],
        "language": {"url": "../../public/configDatatable.json"},
        "autoWidth": false
    });
}

function nombreFile() {
    var name = document.getElementById("fileDoc").value.split("\\").pop();

    $('#nameFileDoc').text(name);
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

function convertirFecha(fecha) {
    const date = new Date(fecha);
    const ye = new Intl.DateTimeFormat('es', { year: 'numeric' }).format(date);
    const mo = new Intl.DateTimeFormat('es', { month: 'long' }).format(date);
    const da = new Intl.DateTimeFormat('es', { day: '2-digit' }).format(date);
    return da+"-"+mo+"-"+ye;
}