 <?php

      include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");

      require_once CONTROLLER_PATH . "/noticia/noticia_controller.php";

      ?>

<!DOCTYPE html>
<html>

<head>

<!-- CSS FILES START-->
<link href="../../public/css/general.css" rel="stylesheet">

<link href="../../public/css/noticias/noticias.css" rel="stylesheet">
<!-- CSS FILES START-->
<link href="../../public/css/custom.css" rel="stylesheet">
<link href="../../public/css/responsive.css" rel="stylesheet">
<link href="../../public/css/owl.carousel.min.css" rel="stylesheet">
<link href="../../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../../public/css/prettyPhoto.css" rel="stylesheet">
<link href="../../public/css/all.min.css" rel="stylesheet">


 <link rel="stylesheet" href="../.../lib/fontawesome/css/fontawesome.min.css">


<!--  CSS FILES End -->

<!--   JS Files Start  -->
<script src="../../lib/jquery/jquery-3.3.1.min.js"></script>
<script src="../../lib/bootstrap/js/bootstrap.min.js"></script>
<script src="../../public/js/owl.carousel.min.js"></script>
<script src="../../lib/jquery/jquery.prettyPhoto.js"></script>
<script src="../../public/js/custom.js"></script>

<!--   JS Files END  -->


</head>

<body>
  <?php include(TEMPLATES_PATH . "/header.php");

  $controlador_noticia = new NoticiaController();
  $noticia = $controlador_noticia->getNoticiaID($_GET["noticia"]);

  ?>

  <div class="container-flex">
    <section class="wrapper news-posts ">
      <div class="row">
        <div class="col-md-8">
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