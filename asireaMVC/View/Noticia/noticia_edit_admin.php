<?php
include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");

require_once CONTROLLER_PATH . "/noticia/noticia_controller.php";

$controlador_noticia = new NoticiaController();
$numnews = $controlador_noticia->createFile();
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
  <script src="../../lib/ckeditor/ckeditor.js"></script>
  <!--   JS Files END  -->


  <?php include(TEMPLATES_PATH . "/metadata.php") ?>

  <title>Acerca de RECURINFOR (v4)</title>

</head>

<body>
  <?php include(TEMPLATES_PATH . "/header.php") ?>

  <div class="container">
    <?php

    $controlador_noticia = new NoticiaController();
    $noticia = $controlador_noticia->getNoticiaID($_GET["noticia"]);

    ?>


    <!--   INICIO CKEDITOR   -->
    <div class="container-flex">
      <div class="row">
        <div class="col-md-12">
          <div class="well well-sm">


            <form method="post" action="../../Controller/noticia/switch_controller.php">
              <fieldset>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">Título</span>
                  </div>
                  <input id="titulo_noticia" name="titulo_noticia" type="text" class="form-control" aria-describedby="basic-addon3">
                </div>
                <div class="form-group">
                  <label for="street1_id" class="control-label">Contenido</label>
                  <textarea name="editor_noticia" id="editor_noticia" rows="10" cols="80">
      <?php

      echo ($noticia['descripcion']);

      ?>
      </textarea>
                </div>


                <input class="button btn btn-primary" name="btn_accion" type="Submit" value="Actualizar" />

                <script>
                  CKEDITOR.replace('editor_noticia', {
                    filebrowserBrowseUrl: '/asirea/asireaMVC/lib/filemanager/filemanager/noticia/dialog.php?type=2&editor=ckeditor&numnews=<?php echo $numnews ?>&fldr=',
                    filebrowserUploadUrl: '/asirea/asireaMVC/lib/filemanager/filemanager/noticia/dialog.php?type=2&editor=ckeditor&numnews=<?php echo $numnews ?>&fldr=',
                    filebrowserImageBrowseUrl: '/asirea/asireaMVC/lib/filemanager/filemanager/noticia/dialog.php?type=1&editor=ckeditor&numnews=<?php echo $numnews ?>&fldr='
                  });
                </script>
              </fieldset>
            </form>
          </div>
        </div>
      </div>

      <!--   FIN CKEDITOR   -->

    </div>
    <?php include(TEMPLATES_PATH . "/footer.php") ?>
</body>

</html>