<?php
include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");

require_once CONTROLLER_PATH . "/noticia/noticia_controller.php";

$controlador_noticia = new NoticiaController();
$numnews =$controlador_noticia->createFile();
echo ($numnews);

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

      <input type="text" id="titulo_noticia"  name="titulo_noticia"/>

      <textarea name="editor_noticia" id="editor_noticia" rows="10" cols="80">
      </textarea>

      <input class="button btn btn-primary" name="btn_accion" type="Submit" value="Guardar" />

      <script>
        CKEDITOR.replace('editor_noticia', {
          filebrowserBrowseUrl: '/asirea/asireaMVC/filemanager/filemanager/noticia/dialog.php?type=2&editor=ckeditor&numnews=<?php echo $numnews?>&fldr=',
          filebrowserUploadUrl: '/asirea/asireaMVC/filemanager/filemanager/noticia/dialog.php?type=2&editor=ckeditor&numnews=<?php echo $numnews?>&fldr=',
          filebrowserImageBrowseUrl: '/asirea/asireaMVC/filemanager/filemanager/noticia/dialog.php?type=1&editor=ckeditor&numnews=<?php echo $numnews?>&fldr='
        });
      </script>
    </form>

  </section>
  <!--   FIN CKEDITOR   -->



  </div>
  <?php include(TEMPLATES_PATH . "/footer.php") ?>
</body>

</html>