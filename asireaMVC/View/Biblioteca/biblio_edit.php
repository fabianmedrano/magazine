<?php

include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");

require_once CONTROLLER_PATH . "/nosotros/nosotros_controller.php";

?>

<!doctype html>
<html lang="es">
<head>
    <?php include(TEMPLATES_PATH . "/metadata.php") ?>

    <link rel="stylesheet" href="../../lib/DataTables/DataTables-1.10.21/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="../../public/font-awesome/fontawesome-free-5.10.2-web/css/all.min.css">
    <link rel="stylesheet" href="../../lib/bootstrap/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="../../lib/sweetalert2/dist/sweetalert2.css">
    <link rel="stylesheet" href="../../lib/alertifyjs/css/alertify.min.css">

    <script src="../../lib/DataTables/DataTables-1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="../../lib/bootstrap/bootstrap-tagsinput/dist/bootstrap-tagsinput.js"></script>
    <script src="../../lib/sweetalert2/dist/sweetalert2.js"></script>
    <script src="../../lib/alertifyjs/alertify.min.js"></script>

    <script src="../../public/js/biblioteca/biblio_edit.js"></script>

    <title>Biblioteca</title>

    <style>
        .custom-file-input ~ .custom-file-label::after {
            content: "Buscar";
        }
    </style>
</head>
<body>

<?php include(TEMPLATES_PATH . "/nav.php")
?>

<br>

<div class="container mt-5 mb-5">
    <h3 class="color-1">Biblioteca</h3>
    <hr>
    <div>
        <button class="btn btn-success" onclick="abrirModalRegistro()"><i class="fas fa-plus-square"></i> Documento</button>
        <div class="mt-3">
            <table id="tbDocumentos" class="table table-striped table-bordered dt-responsive display">
            </table>
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

<!--- START MODAL DESCRIPCION-->
<div class="modal" tabindex="-1" role="dialog" id="modalInfo">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Descripción</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="textModal" class="text-justify"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!--- END MODAL DESCRIPCION-->
<!--- START MODAL REGISTRO-->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="modalRegistro">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Documento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- START FORM -->
                <form id="formDoc" >

                    <input type="text" class="form-control" placeholder="Nombre del Documento" name="nombreDoc" id="nombreDoc"
                           maxlength="200">
                    <br>
                    <input type="text" class="form-control" placeholder="Nombre del Autor" name="autorDoc" id="autorDoc"
                           data-role="tagsinput" maxlength="200">
                    <br>
                    <textarea name="desDoc" id="desDoc" cols="30" rows="10" class="form-control mt-4"></textarea>
                    <br>
                    <div class="custom-file" id="customFile" lang="es">
                        <input type="file" class="custom-file-input" id="fileDoc" aria-describedby="fileHelp"
                               accept="application/pdf"
                               onchange="nombreFile()">
                        <label class="custom-file-label" for="fileDoc" id="nameFileDoc">
                            Seleccione un archivo...
                        </label>
                    </div>

                </form>
                <!-- END FORM -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success" id="btnGuardar">
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
<!--- END MODAL REGISTRO-->
</body>
</html>
