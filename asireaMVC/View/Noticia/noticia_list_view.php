<?php
include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");


require_once CONTROLLER_PATH . "/noticia/noticia_controller.php";

?>

<!DOCTYPE html>
<html>


<head>


    <link href="<?php echo PUBLIC_PATH ?>/css/noticias/noticias_view.css" rel="stylesheet">
    <link href="<?php echo PUBLIC_PATH ?>/css/noticias/noticias.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo LIB_PATH ?>/fontawesome/css/fontawesome.min.css">



    <!-- CSS FILES START-->
    <link href="<?php echo LIB_PATH ?>/template/css/custom.css" rel="stylesheet">
    <link href="<?php echo LIB_PATH ?>/template/css/responsive.css" rel="stylesheet">
    <link href="<?php echo LIB_PATH ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo LIB_PATH ?>/template/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo LIB_PATH ?>/fontawesome/css/all.min.css" rel="stylesheet">
    <!--  CSS FILES End -->

    <!--   JS Files Start  -->
    <script src="<?php echo LIB_PATH ?>/jquery/jquery-3.2.1.min.js"></script>
    <script src="<?php echo LIB_PATH ?>/jquery/jquery-migrate-1.4.1.min.js"></script>
    <script src="<?php echo LIB_PATH ?>/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo LIB_PATH ?>/jquery/jquery.prettyPhoto.js"></script>
    <script src="<?php echo LIB_PATH ?>/template/js/custom.js"></script>
    <script src="<?php echo LIB_PATH ?>/template/js/popper.min.js"></script>
    <script src="<?php echo LIB_PATH ?>/template/js/isotope.min.js"></script>
    <!--   JS Files END  -->



    <?php include(TEMPLATES_PATH . "/metadata.php") ?>

    <title>Acerca de RECURINFOR (v4)</title>

</head>

<body>
    <?php include(TEMPLATES_PATH . "/header.php");


    $noticias = NoticiaController::getNoticiasPaginado($_GET['pagina'], 5);

    $extra = 'noticia_list_view.php?pagina=1';
    echo (HOST_DIR);

    echo ('---');
    echo (CONCURRENT_DIR . 'noticia_list_view.php?pagina=1');

    if (!$_GET) {

        header("Location: http://$host$uri/$extra");
        exit;

        //header("Location:index.php?pagina=1");
    }
    if ($_GET['pagina'] > $noticias['paginas'] || $_GET['pagina'] < 1) {

        header("Location: http://$host$uri/$extra");
        //   header("Location:index.php?pagina=1");
    }
    /* 
    $archivos_por_pagina = 5;
    $cantidad_noticias = 2;
    $paginas = ceil($cantidad_noticias / $archivos_por_pagina);

    
    $inicio = ($_GET['pagina'] -1)*$archivos_por_pagina;
    $fin = $archivos_por_pagina;*/

    ?>







    <div class="container-flex">
        <section class="wrapper news-posts p80">
            <div class="row">
                <div class="col-md-8">
                    <div class="blog-list ">

                        <!--Blog Post Start-->

                        <?php

                        $noticias = NoticiaController::getNoticiasPaginado($_GET['pagina'], 5);

                        foreach ($noticias['noticias'] as $noticia) {

                            $folder_path = "../../public/img/noticias/noticias/";
                            $folder_path = $folder_path . $noticia["idnoticia"] . "/";


                            $num_files = glob($folder_path . "*.{JPG,jpeg,gif,png,bmp}", GLOB_BRACE);

                            $folder = opendir($folder_path);

                            $imgcargada = false;
                            if ($num_files > 0) {
                                while ((false !== ($file = readdir($folder))) && (!$imgcargada)) {
                                    $file_path = $folder_path . $file;

                                    $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                                    if ($extension == 'jpg' || $extension == 'png' || $extension == 'gif' || $extension == 'bmp') {
                        ?>
                                        <div class="blog-post">
                                            <!-- incio imagenes -->
                                            <div class="blog-thumb">
                                                <img class="tfoto" src="<?php echo $file_path; ?>" alt="Imagen de ejemplo" title="Imagen de ejemplo">
                                            </div>
                                            <!-- Fin imagenes -->

                                <?php
                                        $imgcargada = true;
                                    }
                                }
                                closedir($folder);
                            }

                                ?>
                                <div class="blog-txt">

                                    <!-- Inicio Titulo -->
                                    <h5>
                                        <?php echo $noticia["titulo"] ?>
                                    </h5>
                                    <!-- Fin Titulo -->

                                    <!-- Inicio informacion de publicacion -->
                                    <ul class="post-meta">
                                        <li><span>Publicado:</span><?php echo  date("d/m/Y", strtotime($noticia['fecha'])); ?></li>
                                    </ul>
                                    <!-- Fin informacion de publicacion -->

                                    <!--Inicio Descripcion-->
                                    <div class="resumen_noticia">
                                        <?php echo strip_tags($noticia["descripcion"]) ?>
                                    </div>
                                    <!-- Fin Descripcion-->

                                    <!-- Inicio Leer mas-->
                                    <a href="<?php echo BASE_URL ?>/View/Noticia/noticia.php?noticia=<?php echo $noticia['idnoticia'] ?>">Leer más</a>
                                    <!-- Fin Leer mas-->

                                </div>

                                        </div>

                                    <?php } ?>

                                    <!--Blog Post End-->
                    </div>

                </div>

            </div>
            <div id="pagination">
                <nav>
                    <ul class="pagination">
                        <li class="page-item  <?php echo $_GET['pagina'] > 0 ? 'disabled' : '' ?>">
                            <a class="page-link" href="index.php?pagina=<?php echo (intval($_GET['pagina'])  - 1);  ?>" tabindex="-1">anterior</a>
                        </li>

                        <?php for ($i = 0; $i < $noticias['paginas']; $i++) {
                        ?>

                            <li class="page-item <?php echo $_GET['pagina'] == ($i + 1) ? 'active' : '' ?>">
                                <a class="page-link" href="index.php?pagina=<?php echo $i + 1  ?> "><?php echo $i + 1 ?> <span class="sr-only"></span></a>
                            </li>



                        <?php
                        }
                        ?>
                        <li class="page-item  <?php echo $_GET['pagina'] <= $noticias['paginas'] ? 'disabled' : '' ?>">
                            <a class="page-link" href="index.php?pagina=<?php echo (intval($_GET['pagina']) + 1);  ?>">siguiente</a>
                        </li>
                    </ul>

                </nav>
            </div>

        </section>
    </div>


    <?php include(TEMPLATES_PATH . "/footer.php") ?>
</body>

</html>