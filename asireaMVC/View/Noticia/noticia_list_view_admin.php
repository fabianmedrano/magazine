<?php
include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");


require_once CONTROLLER_PATH . "/noticia/noticia_controller.php";

?>

<!DOCTYPE html>
<html>


<head>

    <link href="../../public/css/general.css" rel="stylesheet">
    <link href="../../public/css/noticias/noticias.css" rel="stylesheet">
    <link rel="stylesheet" href="../../lib/fontawesome/css/fontawesome.min.css">
    


    <!-- CSS FILES START-->
    <link href="../../lib/template/css/custom.css" rel="stylesheet">
    <link href="../../lib/template/css/responsive.css" rel="stylesheet">
    <link href="../../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../lib/template/css/prettyPhoto.css" rel="stylesheet">
    <link href="../../lib/fontawesome/css/all.min.css" rel="stylesheet">
    <!--  CSS FILES End -->

    <!--   JS Files Start  -->
    <script src="../../lib/jquery/jquery-3.2.1.min.js"></script>
    <script src="../../lib/jquery/jquery-migrate-1.4.1.min.js"></script>
    <script src="../../lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../lib/jquery/jquery.prettyPhoto.js"></script>
    <script src="../../lib/template/js/custom.js"></script>
    <script src="../../lib/template/js/popper.min.js"></script>
    <script src="../../lib/template/js/isotope.min.js"></script>
    <!--   JS Files END  -->



    <?php include(TEMPLATES_PATH . "/metadata.php") ?>

    <title>Acerca de RECURINFOR (v4)</title>

</head>

<body>
    <?php include(TEMPLATES_PATH . "/header.php") ?>







    <div class="container-flex">
        <section class="wrapper news-posts p80">
            <div class="row">
                <div class="col-md-8">
                    <div class="blog-list ">

                        <!--Blog Post Start-->

                        <?php

                        $folder_path="../../public/img/noticias/noticias/";
                        $noticias = NoticiaController::getNoticias();
                        foreach ($noticias as $noticia) {
                            $folder_path = $folder_path.$noticia["idnoticia"]."/";
                            var_dump($folder_path);

                            $num_files = glob($folder_path . "*.{JPG,jpeg,gif,png,bmp}", GLOB_BRACE);
                            $folder = opendir($folder_path);

                            $imgcargada = false;
                            if ($num_files > 0) {
                                while ((false !== ($file = readdir($folder))) && (!$imgcargada)) {
                                    $file_path = $folder_path .$file;
                                    echo($file_path);
                                    $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                                    if ($extension == 'jpg' || $extension == 'png' || $extension == 'gif' || $extension == 'bmp') {
                        ?>
                                        <div class="blog-post">
                                            <!-- incio imagenes -->
                                            <div class="blog-thumb">
                                                <a href="#"><i class="fas fa-link"></i></a> <img class="tfoto" src="<?php echo $file_path; ?>" alt="Imagen de ejemplo" title="Imagen de ejemplo">
                                            </div>
                                            <!-- Fin imagenes -->

                                <?php
                                        $imgcargada = true;
                                    }
                                }
                            }
                            closedir($folder);
                                ?>
                                <div class="blog-txt">

                                    <!-- Inicio Titulo -->
                                    <h5>
                                        <?php echo $noticia["titulo"] ?>
                                    </h5>
                                    <!-- Fin Titulo -->

                                    <!-- Inicio informacion de publicacion -->
                                    <ul class="post-meta">
                                        <li><span>Por:</span> Daniel</li>
                                        <li><span>Publicado:</span> 29 Setiembre, 2018</li>
                                    </ul>
                                    <!-- Fin informacion de publicacion -->

                                    <!--Inicio Descripcion-->
                                    <div class="resumen_noticia">
                                        <?php echo strip_tags($noticia["descripcion"]) ?>
                                    </div>
                                    <!-- Fin Descripcion-->


                                          <!-- inicio Acciones eliminar, editar-->
                                          <div class="btn-group">
                                    <div class="px-1">
                                    <button type="button"class="btn btn-success" onclick="location.href='<?php echo BASE_URL ?>/View/Noticia/noticia_edit_admin.php?noticia=<?php echo $noticia['idnoticia'] ?>'">  <i class="fas fa-pencil-alt "></i></button>
                                    </div>
                                    <form id="form-noticia-delete" method="post"  action="<?php echo BASE_URL ?>/Controller/noticia/switch_controller.php" >
                                        <input type="hidden" value="<?php echo $noticia["idnoticia"] ?>" name="id_noticia">
                                            <button class="btn btn-danger" id="btn-eliminar" name="btn_accion" type="submit" value="Eliminar" > <i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </div>
                                
                                <!-- fin Acciones eliminar, editar-->
                                </div>

                                        </div>

                                    <?php } ?>

                                    <!--Blog Post End-->
                    </div>
                </div>
            </div>
        </section>
    </div>


    <?php include(TEMPLATES_PATH . "/footer.php") ?>
</body>

</html>




