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
  <link href="../../public/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../public/css/all.min.css" rel="stylesheet">
  <!--  CSS FILES End -->

  <!--   JS Files Start  -->
  <script src="../../public/js/jquery-3.3.1.min.js"></script>
  <script src="../../public/js/bootstrap.min.js"></script>
  <script src="../../public/js/custom.js"></script>

  <!--   JS Files END  -->


  <?php include(TEMPLATES_PATH . "/metadata.php") ?>
  <title>Nosotros</title>

</head>

<body>
  <?php include(TEMPLATES_PATH . "/header.php");

  $controlador_noticia = new NoticiaController();
  $noticia = $controlador_noticia->getNoticiaID($_GET["noticia"]);

  ?>

  <div class="container-flex">
    <div class="row">
      <div class="col-md-12">
    <!-- INICIO CUERPO INFORMACION NOSOTROS-->
    <div class="page-header">
      <h1>
        <?php
        echo ($noticia['titulo']);
        ?>
      </h1>
    </div>

    <div class="cuerpo">
      <?php
      echo ($noticia['descripcion']);
      ?>
    </div>


    <!-- INICIO CUERPO INFORMACION NOSOTROS-->

    </div>
    </div>

  </div>
  <?php include(TEMPLATES_PATH . "/footer.php") ?>
</body>

</html>