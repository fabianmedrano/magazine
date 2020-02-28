<?php

include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");

require_once CONTROLLER_PATH . "/nosotros/nosotros_controller.php";
//require_once(CONTROLLER_PATH . "/template_controller.php");

//$Template = new templateController();
//$Template->getBase();
?>

<!DOCTYPE html>
<html>

<head>


  <!-- CSS FILES START-->
  <link href="../../public/css/general.css" rel="stylesheet">

  <!-- CSS FILES START-->
  <link href="../../public/css/custom.css" rel="stylesheet">
  <link href="../../public/css.css" rel="stylesheet">
  <link href="../../public/css/responsive.css" rel="stylesheet">
  <link href="../../public/css/owl.carousel.min.css" rel="stylesheet">
  <link href="../../public/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../public/css/prettyPhoto.css" rel="stylesheet">
  <link href="../../public/css/all.min.css" rel="stylesheet">
  <link href="../../public/css/slick.css" rel="stylesheet">
  <!--  CSS FILES End -->

  <!--   JS Files Start  -->
  <script src="../../public/js/jquery-3.3.1.min.js"></script>
  <script src="../../public/js/jquery-migrate-1.4.1.min.js"></script>
  <script src="../../public/js/popper.min.js"></script>
  <script src="../../public/js/bootstrap.min.js"></script>
  <script src="../../public/js/owl.carousel.min.js"></script>
  <script src="../../public/js/jquery.prettyPhoto.js"></script>
  <script src="../../public/js/isotope.min.js"></script>
  <script src="../../public/js/custom.js"></script>

  <!--   JS Files END  -->

  <link rel="stylesheet" type="text/css" href="../lib/sweetalert/sweetalert.css">
  <link rel="stylesheet" href="../lib/alertifyjs/css/alertify.min.css">

  <script src="../lib/alertifyjs/alertify.min.js"></script>

  <?php include(TEMPLATES_PATH . "/metadata.php") ?>
  <title>Acerca de RECURINFOR (v4)</title>

</head>

<body>
  <?php include(TEMPLATES_PATH . "/header.php") ?>

  <div class="container_principal">




    <section id="home-slider" class=" carusel owl-carousel owl-theme wf100 owl-loaded owl-drag">



      <div class="owl-stage-outer">
        <div class="owl-stage" style="transform: translate3d(-4062px, 0px, 0px); transition: all 0.25s ease 0s; width: 9478px;">

        

          <?php

          
          $images = glob( "../../public/img/event/nosotros_carusel/*.*");
echo $images;
          foreach ($images as $image) { ?>



            <div class="owl-item " style="width: 1354px;">
              <div class="item">
                <div class="slider-caption h2slider">
                  <div class="container">

                  </div>
                </div>
                <img src='<?php echo $image; ?>' alt="">
              </div>
            </div>

          <?php } ?>

        </div>

      </div>
      <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div>
      <div class="owl-dots disabled"></div>
    </section>




    <section>
      <div class="container">

        <?php

        $controlador_nosotros = new NosotrosController();
        echo ($controlador_nosotros->getNosotros());
        ?>

      </div>


    </section>
  </div>
  <?php include(TEMPLATES_PATH . "/footer.php") ?>
</body>

</html>