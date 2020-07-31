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

            <button id="registarCategorias" class="btn btn-success" data-tooltip="tooltip"
                    data-placement="top" title="Agregar Productos" onclick="abriModalRegistrar() ">
                <i class="far fa-plus-square"></i> Producto
            </button>

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

    <!-- Modal Producto-->

    <div class="modal fade bd-example-modal-lg" id="modalProductos" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="col-sm-11">
                        <h3 class="modal-title"> Producto</h3>
                    </div>
                    <div class="col-sm-1">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="float:right">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <div class="modal-body" id="contenidoModalProductosEditar">

                    <label for="categorias">Categorias: </label>
                    <select id="catePro" class="form-control"></select>
                    <br>
                    <label for="nombre">Nombre: </label>
                    <input type="text" class="form-control" id="nombrePro" >
                    <br>
                    <label for="iden">Descripcion: </label>
                    <textarea id="desPro" rows="5" cols="62" class="form-control"></textarea>
                    <br>
                    <label>Foto del Producto</label>
                    <div class="custom-file" id="customFile" lang="es">

                        <input type="file" class="custom-file-input" id="fileDoc" aria-describedby="fileHelp"

                               onchange="nombreFile()">
                        <label class="custom-file-label" for="fileDoc" id="nameFileDoc">
                            Seleccione un archivo...
                        </label>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-success" id="btnGuardarPro">
                        <span class="spinner-border spinner-border-sm"
                              role="status" aria-hidden="true"
                              id="btnGuardarSpinner"
                              style="visibility: hidden"
                        ></span>
                        Guardar
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>