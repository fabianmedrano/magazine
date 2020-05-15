<?php
include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");


require_once CONTROLLER_PATH . "/noticia/noticia_controller.php";

?>

<!DOCTYPE html>
<html>


<head>
<link href="../../public/css/general.css" rel="stylesheet">
  <link href="../../public/css/custom.css" rel="stylesheet">
  <link href="../../public/css/responsive.css" rel="stylesheet">
  <link href="../../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="../../lib/jquery/jquery-3.3.1.min.js"></script>
  <script src="../../lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="../../public/js/custom.js"></script>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="../../public/js/noticia/noticia_delete.js"></script>
  <script src="../../lib/ckeditor/ckeditor.js"></script>



    <?php include(TEMPLATES_PATH . "/metadata.php") ?>

    <title>Acerca de RECURINFOR (v4)</title>

</head>

<body>
    <?php include(TEMPLATES_PATH . "/header.php") ?>







<div class="container-flex">





    <div class="wrapper home2">


        <section class="news-posts p80">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">

                        <div class="blog-list ">
                            <!--Blog Post Start-->
                            <?php

                            $src_img = "../../public/img/noticias/nosticias/";
                            $noticias = NoticiaController::getNoticias();
                            foreach ($noticias as $noticia) {
                                //  echo$src_img_new;
                                $images = glob($src_img); // carga la las rutas de las imagenes que estan en la carpeta carrusel
                                var_dump($images);
                            ?>

                                <div class="blog-post">
                                    
                                <!-- inicio Acciones eliminar, editar-->
                                    <div class="btn-group">
                                        <div class="px-1">
                                        <button type="button" onclick="location.href='<?php echo BASE_URL ?>/View/Noticia/noticia_edit_admin.php?noticia=<?php echo $noticia['idnoticia'] ?>'">   www.example.coms<i class="fas fa-pencil-alt "></i></button>
                                        </div>
                                        <form id="form-noticia-delete" method="post"  action="<?php echo BASE_URL ?>/Controller/noticia/switch_controller.php" >
                                            <input type="hidden" value="<?php echo $noticia["idnoticia"] ?>" name="id_noticia">
                                             <input class="button btn-danger" id="btn-actualizar" name="btn_accion" type="submit" value="Eliminar" />
                                        </form>
                                    </div>
                                    <!-- fin Acciones eliminar, editar-->



                                    <div class="blog-thumb"> <a href="#"><i class="fas fa-link"></i></a> <img src='<?php echo ($images[0]); ?>' alt=""></div>
                                    <div class="blog-txt">
                                        <h5><?php echo $noticia["titulo"] ?>
                                        </h5>
                                        <ul class="post-meta">
                                            <li><span>Por:</span> Daniel</li>
                                            <li><span>Publicado:</span> 29 Setiembre, 2018</li>
                                        </ul>
                                        <div class="resumen_noticia">
                                        <?php echo strip_tags($noticia["descripcion"] )?> 

                                        </div>
                                      
                                    </div>
                                </div>
                            <?php } ?>
                            <!--Blog Post End-->
                        </div>

                    </div>
                </div>
            </div>
        </section>


    </div>
    </div>

    <?php include(TEMPLATES_PATH . "/footer.php") ?>
</body>

</html>