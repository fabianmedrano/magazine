<?php
include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");


require_once CONTROLLER_PATH . "/proyectos/proyecto_controller.php";

?>

<!DOCTYPE html>
<html>


<head>

    <?php include(TEMPLATES_PATH . "/metadata.php") ?>

    <link href="<?php echo PUBLIC_PATH ?>/css/proyectos/proyectos_view.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo LIB_PATH ?>/fontawesome/css/fontawesome.min.css">

    <title>Acerca de RECURINFOR (v4)</title>

</head>

<body>
    <?php include(TEMPLATES_PATH . "/header.php");





    if (!$_GET) {
        header("Location:" . CURRENT_DIR . "?pagina=1");
        exit;
    }


    $proyectos = ProyectoController::getproyectosPaginado($_GET['pagina'], 5);


    if (count($proyectos['proyectos']) <= 0) {
        include(VIEW_PATH . "/proyectos/proyecto_none.php");
        include(TEMPLATES_PATH . "/footer.php");
        exit;
    }

    if ($_GET['pagina'] > $proyectos['paginas'] || $_GET['pagina'] < 1) {
        header("Location:" . CURRENT_DIR . "?pagina=1");
    }

    ?>



    <div class="container ">
        <div class="row">
                <div class="blog-list ">

                    <!--Blog Post Start-->

                    <?php

                    $proyectos = ProyectoController::getproyectosPaginado($_GET['pagina'], 3);

                    foreach ($proyectos['proyectos'] as $proyecto) {

                    ?>
                    <div class="card">
                        <div class="blog-post">
                            <?php
                            $folder_path = "../../public/img/proyectos/proyectos/";
                            $folder_path = $folder_path . $proyecto["idproyecto"] . "/";
                            $num_files = glob($folder_path . "*.{JPG,jpeg,gif,png,bmp}", GLOB_BRACE);
                            $folder = opendir($folder_path);
                            $imgcargada = false;
                            if ($num_files > 0) {
                                while ((false !== ($file = readdir($folder))) && (!$imgcargada)) {
                                    $file_path = $folder_path . $file;

                                    $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                                    if ($extension == 'jpg' || $extension == 'png' || $extension == 'gif' || $extension == 'bmp') { // revisar que pasa cuando no carga imagen
                            ?>
                            <div class="col">
                                        <!-- incio imagenes -->
                                        <div class="blog-thumb ">
                                            <img class="tfoto  rounded float-left img-thumbnail" src="<?php echo $file_path; ?>" alt="Imagen" title="Imagen">
                                        </div>
                                        <!-- Fin imagenes -->
                            </div>
                            <?php
                                        $imgcargada = true;
                                    }
                                }
                                closedir($folder);
                            }

                            ?>
                            <div class="col">
                            
                            <div class="blog-txt ">

                                <!-- Inicio Titulo -->
                                <h7>
                                    <strong >

                                    <?php echo $proyecto["titulo"] ?>
                                    </strong>
                                </h7>
                                <!-- Fin Titulo -->

                                <!-- Inicio informacion de publicacion -->
                                <ul class="post-meta">
                                    <li><span>Publicado:</span><?php echo  date("d/m/Y", strtotime($proyecto['fecha'])); ?></li>
                                </ul>
                                <!-- Fin informacion de publicacion -->

                                <!--Inicio Descripcion-->
                                <div class="resumen_proyecto">
                                    <?php echo trim(strip_tags($proyecto["descripcion"])) ?>
                                </div>
                                <!-- Fin Descripcion-->

                                <!-- Inicio Leer mas-->
                                <a  class="float-right" href="<?php echo BASE_URL ?>/View/proyecto/proyecto.php?proyecto=<?php echo $proyecto['idproyecto'] ?>">Leer más</a>
                                <!-- Fin Leer mas-->

                            </div>
                        </div>
                        </div>
                    </div>
                    <?php } ?>

                    <!--Blog Post End-->
                </div>
        </div>

<div class="row">

        <div id="pagination">
            <nav>
                <ul class="pagination">

                    <li class="page-item  <?php echo $_GET['pagina'] == 1 ? 'disabled' : '' ?>">
                        <a class="page-link" href="<?PHP echo CURRENT_DIR ?>?pagina=<?php echo (intval($_GET['pagina'])  - 1);  ?>" tabindex="-1">anterior</a>
                    </li>

                    <?php for ($i = 0; $i < $proyectos['paginas']; $i++) { ?>

                        <li class="page-item <?php echo $_GET['pagina'] == ($i + 1) ? 'active' : '' ?>">
                            <a class="page-link" href="<?PHP echo CURRENT_DIR ?>?pagina=<?php echo $i + 1  ?> "><?php echo $i + 1 ?> <span class="sr-only"></span></a>
                        </li>

                    <?php } ?>

                    <li class="page-item  <?php echo $_GET['pagina'] >= $proyectos['paginas'] ? 'disabled' : '' ?>">
                        <a class="page-link" href="<?PHP echo CURRENT_DIR ?>?pagina=<?php echo (intval($_GET['pagina']) + 1);  ?>">siguiente</a>
                    </li>

                </ul>

            </nav>
        </div>

    </div>



    </div>


    

    <?php include(TEMPLATES_PATH . "/footer.php") ?>
</body>

</html>