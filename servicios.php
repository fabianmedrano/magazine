<!DOCTYPE html lang="es">
<html lang="es">
<?php
require_once("../public/head_Admin.php");
?>


<title>Servicios</title>
</head>
<body style="background-color:#d6dd87;">

<header class="header-style-2">
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="index.html"><img src="images/h2logo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <i class="fas fa-bars"></i> </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <a class="nav-link " href="index.html"  > INICIO </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link " href="producto.php"  > PRODUCTOS </a>

                    </li>

                    <li class="nav-item ">
                        <a class="nav-link " href="servicios.php"  > SERVICIOS </a>

                    </li>
                    <li class="nav-item ">
                        <a class="nav-link " href="Noticia.html"  > NOTICIAS </a>

                    </li>
                    <li class="nav-item ">
                        <a class="nav-link " href="Proyectos.html"  > PROYECTOS </a>

                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="Galeria.html" > GALERIA </a>

                    </li>

                    <li class="nav-item ">
                        <a class="nav-link " href="#"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> BIBLIOTECA </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

<div class="container mt-5 mb-5">
    <h3 class="color-1">Registro de Servicios</h3>
    <hr></hr>
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
            <div class="modal-body" id="contenidoModalServicios">
                <!--
                <div class="form-group">

                    <input type="hidden" class="form-control" id="CodigoCategoria" onkeypress="return soloLetras(event);">
                </div>
                -->
                <div class="form-group">
                    <label for="nombre">Nombre: </label>
                    <input type="text" class="form-control" id="nombreServicio" >
                    <br>
                    <label for="descrip">Descripción: </label>
                    <textarea id="textarea" rows="5" cols="62"></textarea>
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
                <button type="button" class="btn btn-primary" id="btnServicios"></button>
            </div>
        </div>
    </div>
</div>


</body>
</html>
