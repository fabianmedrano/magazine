<?php
include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");


require_once CONTROLLER_PATH ."/servicios/servicios_controller.php";


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include(TEMPLATES_PATH . "/metadata.php") ?>

    <link href="<?php echo PUBLIC_PATH ?>/css/servicios/servicios_view.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo LIB_PATH ?>/fontawesome/css/fontawesome.min.css">

    <title>Servicios</title>
</head>
<body>

    <?php include(TEMPLATES_PATH . "/header.php");

if (!$_GET) {
    header("Location:" . CURRENT_DIR . "?pagina=1");
    exit;
}


$servicios = ServiciosController::getServiciosPaginado($_GET['pagina'], 3);


if (count($servicios['servicios']) <= 0) {
    include(VIEW_PATH . "/Servicios/servicios_none.php");
    include(TEMPLATES_PATH . "/footer.php");
    exit;
}

if ($_GET['pagina'] > $servicios['paginas'] || $_GET['pagina'] < 1) {
    header("Location:" . CURRENT_DIR . "?pagina=1");
}

?>



<div class="container ">
    <div class="row">

        <!--Blog Post Start-->

        <?php

        $servicios = ServiciosController::getServiciosPaginado($_GET['pagina'], 3);

        foreach ($servicios['servicios'] as $servicio) {

        ?>

            <div class="col-md-4">
                <div class="card shadow p-3 mb-5 bg-white ">
                    
                    <!-- incio imagenes -->
                    <img class="" src="../../public/img/servicios/servicios/<?php echo $servicio["imagen"]?>" alt="Generic placeholder image" height="150">
                                    <br>

                     <!-- Fin imagenes -->
                    <h5> <?php echo $servicio["nombre"] ?> </h5>
                    <div class="contenedor_resumen_servicio wrapper ">
                        <p class="resumen_servicio "><?php echo  trim(strip_tags($servicio["descripcion"])); ?>...</p>
                    </div>
                    <a href="<?php echo BASE_URL ?>/View/Servicios/servicios.php?servicio=<?php echo $servicio['id'] ?>" role="button">Leer más...</a>



                </div>
            </div>
        <?php } ?>

        <!--Blog Post End-->


    </div>




    <div class="row">

        <div class="gt-pagination">
            <nav>
                <ul class="pagination">

                    <li class="page-item  <?php echo $_GET['pagina'] == 1 ? 'disabled' : '' ?>">
                        <a class="page-link" href="<?PHP echo CURRENT_DIR ?>?pagina=<?php echo 1;  ?>" tabindex="-1"><i class="fas fa-angle-double-left"></i></a>
                    </li>
                </ul>
                <ul class="pagination">

                    <li class="page-item  <?php echo $_GET['pagina'] == 1 ? 'disabled' : '' ?>">
                        <a class="page-link" href="<?PHP echo CURRENT_DIR ?>?pagina=<?php echo (intval($_GET['pagina'])  - 1);  ?>" tabindex="-1"><i class="fas fa-angle-left"></i></a>
                    </li>
                </ul>

                <?php for ($i = 0; $i < $servicios['paginas']; $i++) { ?>
                    <ul class="pagination">
                        <li class="page-item <?php echo $_GET['pagina'] == ($i + 1) ? 'active' : '' ?>">
                            <a class="page-link" href="<?PHP echo CURRENT_DIR ?>?pagina=<?php echo $i + 1  ?> "><?php echo $i + 1 ?> <span class="sr-only"></span></a>
                        </li>
                    </ul>
                <?php } ?>
                <ul class="pagination">
                    <li class="page-item  <?php echo $_GET['pagina'] >= $servicios['paginas'] ? 'disabled' : '' ?>">
                        <a class="page-link" href="<?PHP echo CURRENT_DIR ?>?pagina=<?php echo (intval($_GET['pagina']) + 1);  ?>"><i class="fas fa-angle-right"></i></a>
                    </li>
                </ul>
                <ul class="pagination">

                    <li class="page-item  <?php echo $_GET['pagina'] == $servicios['paginas'] ? 'disabled' : '' ?>">
                        <a class="page-link" href="<?PHP echo CURRENT_DIR ?>?pagina=<?php echo $servicios['paginas'];  ?>" tabindex="-1"><i class="fas fa-angle-double-right"></i></a>
                    </li>
                </ul>
            </nav>
        </div>

    </div>



</div>




<?php include(TEMPLATES_PATH . "/footer.php") ?>
    
</body>
</html>