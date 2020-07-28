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

    <script src="../../public/js/galeria/galeria.js"></script>

    <title>Galeria</title>
</head>
<body>

<div id="preloader">
    <div id="loader"></div>
</div>

<div id="divContenido" style="visibility: hidden">

    <?php include(TEMPLATES_PATH . "/header.php")
    ?>

    <!--Contact Start-->
    <div class="gallery wf100 p80-40">
        <div class="container">
            <div class="portfolio filter-gallery">
                <div id="filters" class="button-group pull-right"></div>
                <div class="clearfix"></div>
                <div id="divGaleria">

                </div>
            </div>
            <!-- START PAG -->
            <div class="gt-pagination">
                <nav>
                    <ul class="pagination">
                        <il class="page-item">
                            <button class="page-link" onclick="primero()"><i class="fas fa-angle-double-left"></i></button>
                        </il>
                    </ul>
                    <ul class="pagination" id="divPag"></ul>
                    <ul class="pagination">
                        <il class="page-item">
                            <button class="page-link" onclick="ultimo()"><i class="fas fa-angle-double-right"></i></button>
                        </il>
                    </ul>
                </nav>
            </div>
            <!-- END PAG -->
        </div>
    </div>
    <!--Contact End-->
</div>

</body>
</html>