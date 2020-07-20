<?php

include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");

require_once CONTROLLER_PATH . "/nosotros/nosotros_controller.php";

?>

<!DOCTYPE html>
<html>

<head>

  <?php include(TEMPLATES_PATH . "/metadata.php") ?>
  <title>Nosotros</title>

</head>

<body>
  <?php include(TEMPLATES_PATH . "/header.php")
  ?>


  <div class="container_principal">


    <!-- INICIO CARRUSEL -->

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <?php
        $folder_path = '../../public/img/nosotros/nosotros_carrusel/';
        $num_files = glob($folder_path . "*.{JPG,jpeg,gif,png,bmp}", GLOB_BRACE);
        $folder = opendir($folder_path);
        $index = 0;
        if ($num_files > 0) {
          while (false !== ($file = readdir($folder))) {
            $file_path = $folder_path . $file;
            $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
            if ($extension == 'jpg' || $extension == 'png' || $extension == 'gif' || $extension == 'bmp') {
        ?>
              <div class="carousel-item  <?php if ($index == 0) echo ("active");  ?>">
                <img class="d-block w-100" src="<?php echo $file_path; ?>" alt="First slide">

              </div>
        <?php
              $index++;
            }
          }
        }
        closedir($folder);
        ?>

        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>







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