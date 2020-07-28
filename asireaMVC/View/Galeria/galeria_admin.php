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
    <link rel="stylesheet" href="../../lib/sweetalert2/dist/sweetalert2.css">
    <link rel="stylesheet" href="../../lib/alertifyjs/css/alertify.min.css">
    <link rel="stylesheet" href="../../lib/fileinput/css/fileinput.min.css"/>

    <script src="../../lib/DataTables/DataTables-1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="../../lib/bootstrap/bootstrap-tagsinput/dist/bootstrap-tagsinput.js"></script>
    <script src="../../lib/sweetalert2/dist/sweetalert2.js"></script>
    <script src="../../lib/alertifyjs/alertify.min.js"></script>

    <script src="../../lib/fileinput/js/plugins/piexif.js"></script>
    <script src="../../lib/fileinput/js/plugins/sortable.js"></script>
    <script src="../../lib/fileinput/js/fileinput.min.js"></script>
    <script src="../../lib/fileinput/js/locales/es.js"></script>
    <script src="../../lib/fileinput/themes/fas/theme.min.js"></script>

    <script src="../../public/js/galeria/galeria_edit.js"></script>

    <title>Galeria</title>
</head>
<body>

<?php include(TEMPLATES_PATH . "/nav.php")
?>

<div class="container mt-5 mb-5">
    <h3 class="color-1">Galeria de Fotos</h3>
    <hr>
    <div>
        <button class="btn btn-success" onclick="abrirAlertaRegistro(0)"><i class="fas fa-plus-square"></i> Categoría</button>
        <div class="mt-3">
            <table id="tbCategorias" class="table table-striped table-bordered dt-responsive display">
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

<!-- START MODAL FOTOS-->
<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" id="modalFotos">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleModalFotos"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalBody"></div>
        </div>
    </div>
</div>
<!-- END MODAL FOTOS-->

</body>
</html>