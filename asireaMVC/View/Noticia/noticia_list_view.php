<?php
include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");


require_once CONTROLLER_PATH . "/noticia/noticia_controller.php";

?>

<!DOCTYPE html>
<html>


<head>

    <?php include(TEMPLATES_PATH . "/metadata.php") ?>

    <link href="<?php echo PUBLIC_PATH ?>/css/noticias/noticias_view.css" rel="stylesheet">
    <link href="<?php echo PUBLIC_PATH ?>/css/noticias/noticias.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo LIB_PATH ?>/fontawesome/css/fontawesome.min.css">

    <title>Acerca de RECURINFOR (v4)</title>

</head>

<body>
    <?php include(TEMPLATES_PATH . "/header.php");





    if (!$_GET) {
        header("Location:" . CURRENT_DIR . "?pagina=1");
        exit;
    }

    
    $noticias = NoticiaController::getNoticiasPaginado($_GET['pagina'], 5);


    if(count($noticias['noticias'])<=0){
        include(VIEW_PATH."/Noticia/noticia_none.php");
        include(TEMPLATES_PATH . "/footer.php") ;
        exit;
    }

    if ($_GET['pagina'] > $noticias['paginas'] || $_GET['pagina'] < 1) {
     header("Location:" . CURRENT_DIR . "?pagina=1");
    }

    ?>



    <div class="container-flex">
        <section class="wrapper news-posts">
            <div class="row list-noticias">
                <div class="col-md-8">
                    <div class="blog-list ">

                        <!--Blog Post Start-->

                        <?php

                        $noticias = NoticiaController::getNoticiasPaginado($_GET['pagina'], 3);

                        foreach ($noticias['noticias'] as $noticia) {

                            ?> <div class="blog-post">
                            <?php  
                            $folder_path = "../../public/img/noticias/noticias/";
                            $folder_path = $folder_path . $noticia["idnoticia"] . "/";
                            $num_files = glob($folder_path . "*.{JPG,jpeg,gif,png,bmp}", GLOB_BRACE);
                            $folder = opendir($folder_path);
                            $imgcargada = false;
                            if ($num_files > 0) {
                                while ((false !== ($file = readdir($folder))) && (!$imgcargada)) {
                                    $file_path = $folder_path . $file;

                                    $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                                    if ($extension == 'jpg' || $extension == 'png' || $extension == 'gif' || $extension == 'bmp') { // revisar que pasa cuando no carga imagen
                        ?>
                                            <!-- incio imagenes -->
                                            <div class="blog-thumb">
                                                <img class="tfoto" src="<?php echo $file_path; ?>" alt="Imagen" title="Imagen">
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
                                    <h6>
                                        <?php echo $noticia["titulo"] ?>
                                    </h6>
                                    <!-- Fin Titulo -->

                                    <!-- Inicio informacion de publicacion -->
                                    <ul class="post-meta">
                                        <li><span>Publicado:</span><?php echo  date("d/m/Y", strtotime($noticia['fecha'])); ?></li>
                                    </ul>
                                    <!-- Fin informacion de publicacion -->

                                    <!--Inicio Descripcion-->
                                    <div class="resumen_noticia">
                                        <?php echo trim(strip_tags($noticia["descripcion"])) ?>
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

                        <li class="page-item  <?php echo $_GET['pagina'] ==1 ? 'disabled' : '' ?>">
                            <a class="page-link" href="<?PHP echo CURRENT_DIR ?>?pagina=<?php echo (intval($_GET['pagina'])  - 1);  ?>" tabindex="-1">anterior</a>
                        </li>

                        <?php for ($i = 0; $i < $noticias['paginas']; $i++) { ?>

                            <li class="page-item <?php echo $_GET['pagina'] == ($i + 1) ? 'active' : '' ?>">
                                <a class="page-link" href="<?PHP echo CURRENT_DIR ?>?pagina=<?php echo $i + 1  ?> "><?php echo $i + 1 ?> <span class="sr-only"></span></a>
                            </li>

                        <?php } ?>

                        <li class="page-item  <?php echo $_GET['pagina'] >= $noticias['paginas'] ? 'disabled' : '' ?>">
                            <a class="page-link" href="<?PHP echo CURRENT_DIR ?>?pagina=<?php echo (intval($_GET['pagina']) + 1);  ?>">siguiente</a>
                        </li>

                    </ul>

                </nav>
            </div>

        </section>
    </div>


    <?php include(TEMPLATES_PATH . "/footer.php") ?>
</body>

</html>