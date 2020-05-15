<?php
include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");


require_once CONTROLLER_PATH . "/noticia/noticia_controller.php";

?>

<!DOCTYPE html>
<html>


<head>

  <!-- CSS FILES START-->
  <link href="../../public/css/general.css" rel="stylesheet">

  <!-- CSS FILES START-->
  <link href="../../public/css/custom.css" rel="stylesheet">
  <link href="../../public/css/responsive.css" rel="stylesheet">
  <link href="../../public/css/owl.carousel.min.css" rel="stylesheet">
  <link href="../../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../public/css/prettyPhoto.css" rel="stylesheet">
   <link href="../../lib/bootstrap/css/all.min.css" rel="stylesheet">

  <!-- FILE INPUT-->
  <!--  <link rel="stylesheet" href="../.../lib/fontawesome/css/fontawesome.min.css">-->


  <!--  CSS FILES End -->

  <!--   JS Files Start  -->
  <script src="../../lib/jquery/jquery-3.3.1.min.js"></script>
  <script src="../../lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="../../public/js/owl.carousel.min.js"></script>
  <script src="../../lib/jquery/jquery.prettyPhoto.js"></script>
  <script src="../../public/js/custom.js"></script>

  <!-- FILE INPUT-->


  <!--   JS Files END  -->



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
                                      <a href="<?php echo BASE_URL ?>/View/Noticia/noticia.php?noticia=<?php echo $noticia['idnoticia'] ?>" >Leer más</a>
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