<?php
include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");
?>

<!doctype html>
<html lang="es">
<head>
    <?php include(TEMPLATES_PATH . "/metadata.php") ?>

    <link rel="stylesheet" href="../../lib/DataTables/DataTables-1.10.21/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="../../public/font-awesome/fontawesome-free-5.10.2-web/css/all.min.css">
    <link rel="stylesheet" href="../../lib/alertifyjs/css/alertify.min.css">
    <link rel="stylesheet" href="../../lib/sweetalert2/dist/sweetalert2.min.css">

    <script src="../../lib/DataTables/DataTables-1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="../../lib/alertifyjs/alertify.min.js"></script>
    <script src="../../lib/sweetalert2/dist/sweetalert2.min.js"></script>

    <script src="../../public/js/productos/productos_edit.js"></script>

    <title>Productos</title>

    <style>
        .custom-file-input ~ .custom-file-label::after {
            content: "Buscar";
        }
    </style>
</head>
<body>

    <?php include(TEMPLATES_PATH . "/nav.php") ?>

    <br>
    <div class="container">
        <div id="listadoProductos">

            <a class="btn btn-success" data-tooltip="tooltip"
                    data-placement="top" title="Agregar Productos" href="producto_create_admin.php">
                <i class="far fa-plus-square"></i> Producto
            </a>

            <div class="mt-5">
                <table id="tbproducto" class="table table-striped table-bordered dt-responsive display"></table>
                <div id="divCargando" style="visibility: hidden">
                    <div class="spinner-grow" role="status">
                        <span class="sr-only">Cargando...</span>
                    </div>
                    <div class="spinner-grow" role="status">
                        <span class="sr-only">Cargando...</span>
                    </div>
                    <div class="spinner-grow" role="status">
                        <span class="sr-only">Cargando...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="modalImg">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Foto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modalBody">

                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

</body>
</html>