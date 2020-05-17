<?php
include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");

require_once CONTROLLER_PATH . "/noticia/noticia_controller.php";

?>

<!DOCTYPE html>
<html>


<head>

<link href="../../public/css/noticias/noticias.css" rel="stylesheet">
  <link href="../../public/css/general.css" rel="stylesheet">

  <link href="../../lib/template/css/custom.css" rel="stylesheet">
  <link href="../../lib/template/css/responsive.css" rel="stylesheet">
  <link href="../../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="../../lib/jquery/jquery-3.2.1.min.js"></script>
  <script src="../../lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="../../lib/template/js/custom.js"></script>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  
  <script src="../../public/js/noticia/noticia_edit.js"></script>
  <script src="../../lib/ckeditor/ckeditor.js"></script>


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
      <section class="wrapper news-posts ">
        <div class="row">
              <form id="form-noticia-edit" name="<?php echo $noticia['id'] ?>" method="post" action="../../Controller/noticia/switch_controller.php">
                <fieldset>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon3">Título</span>
                    </div>
                    <input id="titulo_noticia" name="titulo_noticia" type="text" class="form-control" aria-describedby="basic-addon3" value="<?php echo $noticia['titulo'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="street1_id" class="control-label">Contenido</label>
                    <textarea name="editor_noticia" id="editor_noticia" rows="10" cols="80">
                    <?php

                    echo ($noticia['descripcion']);

                    ?>
                    </textarea>
                  </div>

                  <input class="button btn btn-primary" id="btn-actualizar" name="btn_accion" type="submit" value="Actualizar" />

                  <script>
                    CKEDITOR.replace('editor_noticia', {
                      filebrowserBrowseUrl: '/asirea/asireaMVC/lib/filemanager/filemanager/noticia/dialog.php?type=2&editor=ckeditor&numnews=<?php echo $noticia['id'] ?>&fldr=',
                      filebrowserUploadUrl: '/asirea/asireaMVC/lib/filemanager/filemanager/noticia/dialog.php?type=2&editor=ckeditor&numnews=<?php echo $noticia['id'] ?>&fldr=',
                      filebrowserImageBrowseUrl: '/asirea/asireaMVC/lib/filemanager/filemanager/noticia/dialog.php?type=1&editor=ckeditor&numnews=<?php echo $noticia['id'] ?>&fldr='
                    });
                  </script>
                </fieldset>
              </form>
        </div>
        <!--   FIN CKEDITOR   -->
      </section>
    </div>


    <?php include(TEMPLATES_PATH . "/footer.php") ?>
</body>

</html>