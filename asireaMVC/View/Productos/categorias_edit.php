<?php
include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");

?>
<!DOCTYPE html>
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

    <script src="../../public/js/productos/categorias_edit.js"></script>

    <title>Categorias</title>
</head>
<body>
    <?php include(TEMPLATES_PATH . "/nav.php") ?>

     <div class="container mt-5">

         <button id="registarCategorias" class="btn btn-success" data-tooltip="tooltip"
                 data-placement="top" title="Agregar Productos" onclick="abrirModalCategoria() ">
             <i class="far fa-plus-square"></i> Categoría
         </button>

         <div class="mt-3">
             <table id="tbcategorias" class="table table-striped table-bordered dt-responsive display"></table>
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

    <!--Modal Categorias-->
    <div class="modal fade" id="modalCategorias" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="col-sm-11">
                        <h3 class="modal-title" id="tituloModalCategoria"></h3>
                    </div>
                    <div class="col-sm-1">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="float:right">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <div class="modal-body" id="contenidoModalCategoria">
                    <label for="nombre">Nombre: </label>
                    <input type="text" class="form-control" id="cat" >
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btnCategorias"></button>
                    <span class="spinner-border spinner-border-sm"
                          role="status" aria-hidden="true"
                          id="spinerCargar"
                          style="visibility: hidden"
                    ></span>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>