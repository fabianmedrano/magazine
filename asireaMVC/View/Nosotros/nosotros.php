<?php

include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");

require_once CONTROLLER_PATH . "/nosotros/nosotros_controller.php";

?>

<!DOCTYPE html>
<html>

<head>


  <!-- CSS FILES START
  <link href="../../public/css/general.css" rel="stylesheet">
-->

  
<link rel="stylesheet" href="../../lib/fontawesome/css/fontawesome.min.css">
    <link href="../../lib/fontawesome/css/all.min.css" rel="stylesheet">
  <link href="../../public/css/nosotros/nosotros.css" rel="stylesheet">
  <!-- CSS FILES START-->
  <link href="../../lib/template/css/custom.css" rel="stylesheet">
  <link href="../../lib/template/css/responsive.css" rel="stylesheet">
  <link href="../../lib/template/css/owl.carousel.min.css" rel="stylesheet">
  <link href="../../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../lib/template/css/prettyPhoto.css" rel="stylesheet">
  <link href="../../lib/bootstrap/css/all.min.css" rel="stylesheet">
  <!--  CSS FILES End -->


  <!--   JS Files Start  -->
  <script src="../../lib/jquery/jquery-3.2.1.min.js"></script>
  <script src="../../lib/jquery/jquery-migrate-1.4.1.min.js"></script> 
  <script src="../../lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="../../lib/template/js/owl.carousel.min.js"></script>
  <script src="../../lib/jquery/jquery.prettyPhoto.js"></script>
  <script src="../../lib/template/js/custom.js"></script>
  <script src="../../lib/template/js/popper.min.js"></script> 
  <script src="../../lib/template/js/isotope.min.js"></script>
  <!--   JS Files END  -->
  

  <?php include(TEMPLATES_PATH . "/metadata.php") ?>
  <title>Nosotros</title>

</head>

<body>
  <?php include(TEMPLATES_PATH . "/header.php") 
  ?>

  <div class="container_principal">

    <!-- INICIO CARRUSEL -->

    <section id="home-slider" class=" carusel owl-carousel owl-theme wf100 owl-loaded owl-drag">
      <div class="owl-stage-outer">
        <div class="owl-stage" style="transform: translate3d(-4062px, 0px, 0px); transition: all 0.25s ease 0s; width: 9478px;">

          <?php
          $folder_path = '../../public/img/nosotros/nosotros_carrusel/';
          $num_files = glob($folder_path . "*.{JPG,jpeg,gif,png,bmp}", GLOB_BRACE);
          $folder = opendir($folder_path);
          $index=0;
          if ($num_files > 0) {
            while (false !== ($file = readdir($folder))) {
              $file_path = $folder_path . $file;
              $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
              if ($extension == 'jpg' || $extension == 'png' || $extension == 'gif' || $extension == 'bmp') {
          ?>

                <div class="owl-item <?php if($index == 0) echo("active");  ?>" style="width: 1354px;">
                  <div class="item">
                    <div class="slider-caption h2slider">
            
                    </div>
                    <img class="tfoto" src="<?php echo $file_path; ?>" alt="Imagen de ejemplo" title="Imagen de ejemplo">
                      
                  </div>
                </div>
          <?php
          $index++;
              }
            }
          }
          closedir($folder);
          ?>
        </div>
      </div>
      <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span><i class="fas fa-chevron-left"></i></button>
      <button type="button" role="presentation" class="owl-next"><span aria-label="Next"></span><i class="fas fa-chevron-right"></i></button></div>
      <div class="owl-dots disabled"></div>
    </section>





    <!-- FIN CARRUSEL -->


    <!-- INICIO CUERPO INFORMACION NOSOTROS-->

    <div class="nosotros-cuerpo">
      <?php
      $controlador_nosotros = new NosotrosController();
      echo ($controlador_nosotros->getNosotros());
      ?>
    </div>

    <!-- INICIO CUERPO INFORMACION NOSOTROS-->

  </div>
  <?php include(TEMPLATES_PATH . "/footer.php") 
  ?>
</body>

</html>