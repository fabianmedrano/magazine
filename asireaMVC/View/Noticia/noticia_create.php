<?php
include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");

require_once CONTROLLER_PATH . "/noticia/noticia_controller.php";

$controlador_noticia = new NoticiaController();
echo ($controlador_noticia->createFile());

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
  <link href="../../public/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../public/css/prettyPhoto.css" rel="stylesheet">
  <link href="../../public/css/all.min.css" rel="stylesheet">

  <!-- FILE INPUT-->
  <link href="../../fileinput/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="../.../public/css/fontawesome.min.css">

  <!--  CSS FILES End -->

  <!--   JS Files Start  -->
  <script src="../../public/js/jquery-3.3.1.min.js"></script>
  <script src="../../public/js/bootstrap.min.js"></script>
  <script src="../../public/js/owl.carousel.min.js"></script>
  <script src="../../public/js/jquery.prettyPhoto.js"></script>
  <script src="../../public/js/custom.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- FILE INPUT-->
  <script src="../../fileinput/js/plugins/piexif.min.js" type="text/javascript"></script>
  <script src="../../fileinput/js/plugins/sortable.min.js" type="text/javascript"></script>
  <script src="../../fileinput/js/plugins/purify.min.js" type="text/javascript"></script>
  <script src="../../fileinput/js/fileinput.min.js"></script>
  <script src="../../fileinput/themes/fas/theme.min.js"></script>
  <script src="../../fileinput/js/locales/LANG.js"></script>

  <!-- CKEDITOR-->
  <script src="../../ckeditor/ckeditor.js"></script>
  <!--   JS Files END  -->


  <?php include(TEMPLATES_PATH . "/metadata.php") ?>

  <title>Acerca de RECURINFOR (v4)</title>

</head>

<body>
  <?php include(TEMPLATES_PATH . "/header.php") ?>

<div class="container">


  <!--   INICIO CKEDITOR   -->
  <section>

    <form method="post" action="../../Controller/noticia/switch_controller.php">
      <textarea name="editor_noticia" id="editor_noticia" rows="10" cols="80">
     
      </textarea>


      <input class="button btn btn-primary" name="btn_accion" type="Submit" value="Guardar" />

      <script>
        CKEDITOR.replace('editor_noticia', {
          filebrowserBrowseUrl: '/asirea/asireaMVC/filemanager/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
          filebrowserUploadUrl: '/asirea/asireaMVC/filemanager/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
          filebrowserImageBrowseUrl: '/asirea/asireaMVC/filemanager/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
        });
      </script>
    </form>

  </section>
  <!--   FIN CKEDITOR   -->



  </div>
  <?php include(TEMPLATES_PATH . "/footer.php") ?>
</body>

</html>