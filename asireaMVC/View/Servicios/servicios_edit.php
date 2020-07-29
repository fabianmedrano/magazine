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
    <script src="../../public/js/servicios/servicios_edit.js"></script>
    <title>Servicios</title>
</head>
<body>
<?php include(TEMPLATES_PATH . "/nav.php") ?>


<!-- tabla -->
<div class="container mt-5 mb-5">
    
    <div id="listadoServicios">
        <div class="mb-3">
            <button id="registarServicios" class="cont-icono btn btn-outline-primary float-right" data-tooltip="tooltip" data-placement="top" title="Agregar Servicios" onclick="abrirModal()"><i class="far fa-plus-square"></i></button>
        </div>
        <div class="mb-5">
            <table id="tbservis" class="table table-striped table-bordered dt-responsive display">
                <thead>
               
                </thead>
            </table>
        </div>
    </div>
</div>


<!-- modal -->
<div class="modal fade" id="modalServicios" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col-sm-11">
                    <h3 class="modal-title" id="tituloModal"></h3>
                </div>
                <div class="col-sm-1">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="float:right">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="modal-body" id="contenidoModalServicios">
                
                <div class="form-group">
                    <label for="nombre">Nombre: </label>
                    <input type="text" class="form-control" id="nombre" >
                    <br>
                    <label for="iden">Descripcion: </label>
                    <textarea id="textarea" rows="5" cols="62" class="form-control" ></textarea>
                    


                </div>
                

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btnServicios"></button>
            </div>
        </div>
    </div>
</div>



<!-- modal editar-->
<div class="modal fade" id="modalServiciosEditar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col-sm-11">
                    <h3 class="modal-title" id="tituloModalEditar"></h3>
                </div>
                <div class="col-sm-1">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="float:right">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="modal-body" id="contenidoModalServiciosEditar">
               
                <div class="form-group">
                    <label for="iden">Identificación: </label>
                    <input class="form-control" type="text"  id="txt_id">
                    <br>
                    <label for="nombre">Nombre: </label>
                    <input type="text" class="form-control" id="nombreEditar" >
                    <br>
                    <label for="iden">Descripcion: </label>
                    <textarea id="textareaEditar" rows="5" cols="62"></textarea>
                    


                </div>
                <div class="form-group">

                </div>
                <div class="form-group">
                    <div class="custom-control custom-switch">

                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btnServiciosEditar"></button>
            </div>
        </div>
    </div>
</div>

    
</body>
</html>