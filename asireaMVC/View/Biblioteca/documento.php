<?php

include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");

require_once CONTROLLER_PATH . "/nosotros/nosotros_controller.php";

?>
<!doctype html>
<html lang="es">
<head>
    <?php include(TEMPLATES_PATH . "/metadata.php") ?>

    <link rel="stylesheet" href="../../public/font-awesome/fontawesome-free-5.10.2-web/css/all.min.css">
    <link rel="stylesheet" href="../../public/css/preloader.css">

    <script src="../../public/js/biblioteca/documento.js"></script>

    <title>Documento</title>

    <style>
        .doc{
            width: 100%;
            height: 100vh;
        }
    </style>
</head>
<body>

<div id="preloader">
    <div id="loader"></div>
</div>

<div id="divDocumento" style="visibility: hidden">
    <?php include(TEMPLATES_PATH . "/header.php")
    ?>

    <br>
    <div class="container mt-3">
        <h3 class="color-1" id="docTitulo"></h3>
        <hr>
        <ul class="post-meta">
            <li id="docFecha"></li>
            <li id="docAutor"></li>
        </ul>
        <br>
        <p class="text-justify" id="docContenido"></p>
        <div id="docArchivo">
        </div>

    </div>

</div>
</body>
</html>
