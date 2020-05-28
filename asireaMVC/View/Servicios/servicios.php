<?php
include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");
require_once CONTROLLER_PATH . "/nosotros/nosotros_controller.php";
?>
<html>


<title>Servicios</title>

<head>

    <script src="../../public/js/servicios/servicios.js"></script>

    <link href="../../public/css/general.css" rel="stylesheet">
    <link href="../../public/css/nosotros/nosotros.css" rel="stylesheet">

    <link href="../../public/css/custom.css" rel="stylesheet">
    <link href="../../public/css/responsive.css" rel="stylesheet">
    <link href="../../lib//bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../public/css/prettyPhoto.css" rel="stylesheet">
    <link href="../../lib/fontawesome/css/all.min.css" rel="stylesheet">


    <script src="../../lib/jquery/jquery-3.3.1.min.js"></script>
    <script src="../../lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../lib/jquery/jquery.prettyPhoto.js"></script>
    <script src="../../lib/template/js/custom.js"></script>

</head>

<body>


    <?php include(TEMPLATES_PATH . "/header.php") ?>

    <div class="container mt-5 mb-5">
        <h3 class="color-1">Registro de Servicios</h3>
        <hr>
        </hr>
        <div id="listadoServicios">
            <div class="mb-3">
                <a id="registarServicios" class="cont-icono btn btn-outline-primary float-right" data-tooltip="tooltip" data-placement="top" title="Agregar servicios" onclick=abrirModal()><i class="far fa-plus-square"></i></a>
            </div>
            <div class="mb-5">
                <table id="tbServicios" class="table table-striped table-bordered dt-responsive display">
                    <thead>
                        <tr>


                        </tr>
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
                <form id="form-sevicios-create" method="post" action="../../Controller/servicios/switch_controller.php">
                    <div class="modal-body" id="contenidoModalServicios">
                        <!--
                <div class="form-group">

                    <input type="hidden" class="form-control" id="CodigoCategoria" onkeypress="return soloLetras(event);">
                </div>
                -->
                        <div class="form-group">
                            <label for="nombre">Nombre: </label>
                            <input type="text" class="form-control" name="nombre" id="nombre">
                            <br>
                            <label for="descrip">Descripción: </label>
                            <textarea name="descripcion" id="textarea" rows="5" cols="62"></textarea>
                            <br>
                            <label for="imagen">Imagen: </label>
                            <br>
                            <div class="form-group">
                                <div id="vizualizarImagenServicios">
                                </div>
                            </div>


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
                        <input class="btn btn-primary" id="btn-guardar" name="btn_accion" type="submit" value="Guardar" />
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include(TEMPLATES_PATH . "/footer.php") ?>

</body>

</html>