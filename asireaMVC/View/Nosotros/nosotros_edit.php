<?php
include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");



require_once CONTROLLER_PATH . "/nosotros/nosotros_controller.php";
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

  <!--CKEDITOR START  -->

  <script src="../../ckeditor/ckeditor.js"></script>


  <?php include(TEMPLATES_PATH . "/metadata.php") ?>

  <title>Acerca de RECURINFOR (v4)</title>

</head>

<body>
  <?php include(TEMPLATES_PATH . "/header.php") ?>

  <div class="container">


    <section id="home-slider" class="owl-carousel owl-theme wf100 owl-loaded owl-drag">



      <div class="owl-stage-outer">
        <div class="owl-stage" style="transform: translate3d(-4062px, 0px, 0px); transition: all 0.25s ease 0s; width: 9478px;">



          <?php
          $images = glob($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/public/img/event/nosotros_carusel/*.*");

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




       <!--   Carusel END  -->
    <!--   SECCION CKEDITOR START  -->






    <section>



      <form method="post" action="../../Controller/nosotros/switch_controller.php">
        <textarea name="editor_nosotros" id="editor_nosotros" rows="10" cols="80">
          <?php

          $controlador_nosotros = new NosotrosController();
          echo ($controlador_nosotros->getNosotros());
          ?>
        </textarea>


        <input class="button btn btn-primary" name="btn_accion" type="Submit" value="Update" />
  
<script>
CKEDITOR.replace( 'editor_nosotros' ,{
	filebrowserBrowseUrl : '/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
	filebrowserUploadUrl : '/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
	filebrowserImageBrowseUrl : '/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
});
</script>
      </form>

    </section>
    <!--   SECCION CKEDITOR END  -->

  </div>
  <?php include(TEMPLATES_PATH . "/footer.php") ?>
</body>

</html>