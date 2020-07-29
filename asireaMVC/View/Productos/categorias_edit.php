<?php
include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include(TEMPLATES_PATH . "/metadata.php") ?>

    <link rel="stylesheet" href="../../lib/DataTables/DataTables-1.10.21/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="../../public/font-awesome/fontawesome-free-5.10.2-web/css/all.min.css">

    <script src="../../lib/DataTables/DataTables-1.10.21/js/jquery.dataTables.min.js"></script>
    <script scr="../../public/js/productos/categorias_edit.js"></script>

    <title>Categorias</title>
</head>
<body>
<?php include(TEMPLATES_PATH . "/nav.php") ?>



     <div class="container mt-5 mb-5">
      
        <div id="listadoCategorias">
        <div class="mb-3">
            <button id="registarCategorias" class="cont-icono btn btn-outline-primary float-right" data-tooltip="tooltip" data-placement="top" title="Agregar Productos" onclick="abrirModalCategoria() "><i class="far fa-plus-square"></i></button>
        </div>                     
            <div class="mb-5">
                <table id="tbcategorias" class="table table-striped table-bordered dt-responsive display">
                    <thead>
                        
                     </thead>
                </table>
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
                
                <div class="form-group">
                    
                    <label for="nombre">Nombre: </label>
                    <input type="text" class="form-control" id="cat" >
   
                </div>   

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btnCategorias"></button>
            </div>

            

        </div>
    </div>
</div>



    
</body>
</html>