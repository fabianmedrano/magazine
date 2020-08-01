<?php
include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");

require_once CONTROLLER_PATH . "/proyectos/proyecto_controller.php";

$controlador_proyecto = new ProyectoController();
$numnews = $controlador_proyecto->createFile();


?>

<!DOCTYPE html>
<html>


<head>



<?php include(TEMPLATES_PATH . "/metadata.php") ?>

  <link href="<?php echo PUBLIC_PATH ?>/css/general.css" rel="stylesheet">


  
  <script src="<?php echo LIB_PATH ?>/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="<?php echo LIB_PATH ?>/sweetalert2/dist/sweetalert2.min.css">



  <script src="<?php echo LIB_PATH ?>/ckeditor/ckeditor.js"></script>



  
  <!--   JS Files END  -->

  <!-- INICIO jquery validation-->
  
  <script src="<?php  echo PUBLIC_PATH ?>/js/validacion.js"></script>
  <!-- FIN jquery validation-->

  <script src="<?php echo PUBLIC_PATH ?>/js/proyectos/proyecto_create.js"></script>


  <title>Nuevo proyecto</title>

</head>

<body>
  <?php include(TEMPLATES_PATH . "/nav.php") ?>



  <!--   INICIO CKEDITOR   -->


  <div class="container-flex">
    <section class="wrapper news-posts ">
      <div class="row">

        <form id="form-proyecto-create" method="post" action="../../Controller/proyectos/switch_controller.php">
          <fieldset>
            
            <div id="error_titulo" class="error" role="alert"></div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">Título</span>
              </div>
              <input id="titulo_proyecto" name="titulo_proyecto" type="text" class="form-control" aria-describedby="basic-addon3">
            </div>
        
            
            <div id="error_proyecto" class="error" role="alert"></div>

            <div class="form-group">
              <label for="street1_id" class="control-label">Contenido</label>
              <textarea name="editor_proyecto" id="editor_proyecto" rows="10" cols="80"></textarea>
              <script>    
              
              CKEDITOR.replace('editor_proyecto', {
        filebrowserBrowseUrl: '/asirea/asireaMVC/lib/filemanager/filemanager/dialog.php?type=2&editor=ckeditor&fldr=proyectos/proyectos/<?php echo $numnews ?>/',
        filebrowserUploadUrl: '/asirea/asireaMVC/lib/filemanager/filemanager/dialog.php?type=2&editor=ckeditor&fldr=proyectos/proyectos/<?php echo $numnews ?>/',
        filebrowserImageBrowseUrl: '/asirea/asireaMVC/lib/filemanager/filemanager/dialog.php?type=1&editor=ckeditor&fldr=proyectos/proyectos/<?php echo $numnews ?>/'
      });
      </script>
            </div>
            <input class="button btn btn-primary" id="btn-guardar" name="btn_accion" type="submit" value="Guardar" />
      
          </fieldset>
        </form>

      </div>
    </section>
  </div>
  <!--   FIN CKEDITOR   -->

</body>

</html>