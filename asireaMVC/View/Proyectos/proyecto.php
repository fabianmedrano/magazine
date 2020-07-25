 <?php

      include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");

      require_once CONTROLLER_PATH . "/proyectos/proyecto_controller.php";

      ?>

<!DOCTYPE html>
<html>

<head>

<!-- CSS FILES START-->
<link href="<?php echo PUBLIC_PATH ?>/css/general.css" rel="stylesheet">

<link href="<?php echo PUBLIC_PATH ?>/css/proyectos/proyectos.css" rel="stylesheet">
<!-- CSS FILES START-->
  <link href="<?php echo LIB_PATH ?>/template/css/custom.css" rel="stylesheet">
<link href="<?php echo LIB_PATH  ?>/template/css/responsive.css" rel="stylesheet">
<link href="<?php echo LIB_PATH  ?>/template/css/owl.carousel.min.css" rel="stylesheet">
<link href="<?php echo LIB_PATH ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo PUBLIC_PATH ?>/css/prettyPhoto.css" rel="stylesheet">
<link href="<?php echo LIB_PATH ?>/template/css/all.min.css" rel="stylesheet">


<link rel="stylesheet" href="<?php echo LIB_PATH ?>/fontawesome/css/fontawesome.min.css">


<!--  CSS FILES End -->

<!--   JS Files Start  -->
<script src="<?php echo LIB_PATH ?>/jquery/jquery-3.3.1.min.js"></script>
<script src="<?php echo LIB_PATH ?>/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo LIB_PATH  ?>/template/js/owl.carousel.min.js"></script>
<script src="<?php echo LIB_PATH ?>/jquery/jquery.prettyPhoto.js"></script>
<script src="<?php echo LIB_PATH  ?>/template/js/custom.js"></script>

<!--   JS Files END  -->


</head>

<body>
  <?php include(TEMPLATES_PATH . "/header.php");

  $controlador_proyecto = new proyectoController();
  $proyecto = $controlador_proyecto->getproyectoID($_GET["proyecto"]);

  ?>

  <div class="container-flex">
    <section class="wrapper news-posts ">
      <div class="row">
        <div class="col-md-7">
          <div class="page-header">
            <h2>
              <?php
              echo ($proyecto['titulo']);
              ?>
            </h1>
          </div>

          <div class="cuerpo">
            <?php
            echo ($proyecto['descripcion']);
            ?>
          </div>
          <input type="button" onclick="history.back()" name="volver atrás"  class="btn btn-success" value="volver atrás">

        </div>
      </div>
    </section>
  </div>

  </div>
  </div>

  </div>
  <?php include(TEMPLATES_PATH . "/footer.php") ?>
</body>

</html> -->