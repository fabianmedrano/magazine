<?php
include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");


//$Template = new templateController();
//$Template->getBase();
?>

<!DOCTYPE html>
<html>


<head>

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
  <script src="../../ckeditor/custom/js/sample.js"></script>
  <script type="text/javascript" src="../../ckeditor/config.js?t=JB9C"></script>
  <script type="text/javascript" src="../../ckeditor/lang/es.js?t=JB9C"></script>
  <script type="text/javascript" src="../../ckeditor/styles.js?t=JB9C"></script>
  <script src="../../public/js/nosotros/ckeditor_save.js"></script>

  <link rel="stylesheet" href="../../ckeditor/custom/css/samples.css">
  <link rel="stylesheet" href="../../ckeditor/custom/toolbarconfigurator/lib/codemirror/neo.css">
  <link rel="stylesheet" type="text/css" href="../../ckeditor/skins/moono-lisa/editor_gecko.css?t=JB9C">
  <link rel="stylesheet" type="text/css" href="../../ckeditor/plugins/scayt/skins/moono-lisa/scayt.css?t=JB9C">
  <link rel="stylesheet" type="text/css" href="../../ckeditor/plugins/scayt/dialogs/dialog.css?t=JB9C">
  <link rel="stylesheet" type="text/css" href="../../ckeditor/plugins/tableselection/styles/tableselection.css">
  <link rel="stylesheet" type="text/css" href="../../ckeditor/plugins/wsc/skins/moono-lisa/wsc.css?t=JB9C">
  <link rel="stylesheet" type="text/css" href="../../ckeditor/plugins/balloontoolbar/skins/default.css">
  <link rel="stylesheet" type="text/css" href="../../ckeditor/plugins/balloontoolbar/skins/moono-lisa/balloontoolbar.css">
  <link rel="stylesheet" type="text/css" href="../../ckeditor/plugins/dialog/styles/dialog.css">
  <link rel="stylesheet" type="text/css" href="../../ckeditor/plugins/copyformatting/styles/copyformatting.css">
  <link rel="stylesheet" type="text/css" href="../../ckeditor/plugins/imagebase/styles/imagebase.css">
  <link rel="stylesheet" type="text/css" href="../../ckeditor/plugins/balloonpanel/skins/moono-lisa/balloonpanel.css">
  <link rel="stylesheet" type="text/css" href="../../ckeditor/plugins/easyimage/styles/easyimage.css">




  <?php include(TEMPLATES_PATH . "/metadata.php") ?>

  <title>Acerca de RECURINFOR (v4)</title>

</head>

<body>
  <?php include(TEMPLATES_PATH . "/header.php") ?>

  <main>


    <!--
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
          -->
    <!--   SECCION CKEDITOR START  -->

    <section>


      <!--<form method="post" action=<?php //echo "../../Controller/nosotros_controller.php" ?>>-->
  <form method="post" action="../../Controller/nosotros/switch_controller.php">
        <textarea name="editor_nosotros" id="editor_nosotros" rows="10" cols="80">
            </textarea>
  
     
        <input class="button btn btn-primary" name="btn_accion" type="Submit" value="Update" /> 
        <script>
          CKEDITOR.replace('editor_nosotros');
        </script>
      </form>

    </section>
    <!--   SECCION CKEDITOR END  -->

  </main>
  <?php include(TEMPLATES_PATH . "/footer.php") ?>
</body>

</html>