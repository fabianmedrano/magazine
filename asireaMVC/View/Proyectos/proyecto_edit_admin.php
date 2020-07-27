<?php
include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");

require_once CONTROLLER_PATH . "/proyectos/proyecto_controller.php";

?>

<!DOCTYPE html>
<html>

<title>Edición proyecto</title>
<head>

<?php include(TEMPLATES_PATH . "/metadata.php") ?>

<link href="<?php echo PUBLIC_PATH ?>/css/proyectos/proyectos.css" rel="stylesheet">
  <link href="<?php echo PUBLIC_PATH ?>/css/general.css" rel="stylesheet">

  

  <script src="<?php echo LIB_PATH ?>/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="<?php echo LIB_PATH ?>/sweetalert2/dist/sweetalert2.min.css">

  
  <script src="<?php echo PUBLIC_PATH ?>/js/proyectos/proyecto_edit.js"></script>
  
  <script src="<?php  echo PUBLIC_PATH ?>/js/validacion.js"></script>
  <script src="<?php echo LIB_PATH ?>/ckeditor/ckeditor.js"></script>



</head>

<body>
  <?php include(TEMPLATES_PATH . "/header.php") ?>

  <div class="container">
    <?php

    $controlador_proyecto = new proyectoController();
    $proyecto = $controlador_proyecto->getproyectoID($_GET["proyecto"]);

    ?>


    <!--   INICIO CKEDITOR   -->
    <div class="container-flex">
      <section class="wrapper news-posts ">
        <div class="row">
              <form id="form-proyecto-edit" name="<?php echo $proyecto['id'] ?>" method="post" action="../../Controller/proyectos/switch_controller.php">
               
              <fieldset>
              
            <div id="error_titulo" class="error" role="alert"></div>
              <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon3">Título</span>
                    </div>
                    <input id="titulo_proyecto" name="titulo_proyecto" type="text" class="form-control" aria-describedby="basic-addon3" value="<?php echo $proyecto['titulo'] ?>">
                  </div>
                  
            <div id="error_proyecto" class="error" role="alert"></div>
                  <div class="form-group">
                    <label for="street1_id" class="control-label">Contenido</label>
                    <textarea name="editor_proyecto" id="editor_proyecto" rows="10" cols="80">
                    <?php

                    echo ($proyecto['descripcion']);

                    ?>
                    </textarea>
                  </div>

                  <input class="button btn btn-primary" id="btn-actualizar" name="btn_accion" type="submit" value="Actualizar" />
                  <a class="btn btn-success" href="../Proyectos/proyecto_list_view_admin.php">volver atrás</a>
    
                  <script>

CKEDITOR.replace('editor_proyecto', {
                filebrowserBrowseUrl: '/asirea/asireaMVC/lib/filemanager/filemanager/dialog.php?type=2&editor=ckeditor&fldr=proyectos/proyectos/<?php echo($proyecto['id']) ?>/',
                filebrowserUploadUrl: '/asirea/asireaMVC/lib/filemanager/filemanager/dialog.php?type=2&editor=ckeditor&fldr=proyectos/proyectos/<?php echo($proyecto['id']) ?>/',
           filebrowserImageBrowseUrl: '/asirea/asireaMVC/lib/filemanager/filemanager/dialog.php?type=1&editor=ckeditor&fldr=proyectos/proyectos/<?php echo($proyecto['id']) ?>/'
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