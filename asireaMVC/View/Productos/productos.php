<?php
include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");
require_once CONTROLLER_PATH . "/nosotros/nosotros_controller.php";
?>
<html>


<title>Productos</title>

<head>

    <script src="../../public/js/productos/productos.js"></script>

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


    <div class="conteiner mt-5 mb-5">
        <h3 class="color-1">Registro de Productos</h3>
        <hr>
        <div id="listaProductos">
            <div class="mb-3">
                <a id="registrarProductos" class="cont-icono btn btn-outline-primary float-right" data-tooltip="tooltip" data-placement="top" title="Agregar Productos" onclick=abrirModalProductos()><i class="far fa-plus-square"></i></a>
            </div>
            <!-- se crea la tabla-->
            <div class="mb-5">
                <table id="tbProductos" class="table table-striped table-bordered dt-responsive display">
                    <thead>
                        <tr>


                        </tr>
                    </thead>

                </table>

            </div>
        </div>
    </div>

    <!-- se crea el modal para agregar productos-->
    <div class="modal fade" id="modalProductos" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="col-sm-11">
                        <h3 class="modal-title" id="tituloModalProductos"></h3>
                    </div>
                    <div class="col-sm-1">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="float:right">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <!-- se crea el contenido dentro del modal-->
                <div class="modal-body" id="contenidoModalProductos">

                    <div class="form-group">
                        <!-- boton para abrir el modal de categorias-->
                        <div class="mb-3">
                            <a id="registrarCategorias" class="cont-icono btn btn-outline-primary float-right" data-tooltip="tooltip" data-placement="top" title="Agregar Categorias de Productos" onclick=abrirModalCategorias()><i class="far fa-plus-square"></i></a>
                        </div>

                        <!-- contenido-->
                        <label for="categorias">Categorias: </label>
                        <br>
                        <select id="categoriasProductos">Categorias de productos
                            <option value="planta">Plantas Hornomentales</option>
                        </select>
                        <br>
                        <label for="nombre">Nombre: </label>
                        <input type="text" class="form-control" id="nombreProductos">
                        <br>
                        <label for="descrip">Descripción: </label>
                        <textarea id="textarea" rows="5" cols="62"></textarea>
                        <br>
                        <label for="imagen">Imagen: </label>
                        <br>
                        <div class="form-group">
                            <div id="vizualizarImagenProductos">
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
                    <button type="button" class="btn btn-primary" id="btnProductos"></button>
                </div>
            </div>
        </div>
    </div>

    <!-- se crea el modal para agregar categorias-->

    <div class="modal fade" id="modalCategoriasProductos" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="col-sm-11">
                        <h3 class="modal-title" id="tituloModalCategorias"></h3>
                    </div>
                    <div class="col-sm-1">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="float:right">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <!-- se crea el contenido dentro del modal-->
                <div class="modal-body" id="contenidoModalCategorias">

                    <div class="form-group">

                        <label for="nombreCategoria">Nombre de la Categoria: </label>
                        <input type="text" class="form-control" id="nombreCategoriasProductos">
                        <br>

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
                    <button type="button" class="btn btn-primary" id="btnCategoriasProductos"></button>
                </div>
            </div>
        </div>
    </div>



    <?php include(TEMPLATES_PATH . "/footer.php") ?>



</body>

</html>