<?php
include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");

require_once CONTROLLER_PATH . "/nosotros/nosotros_controller.php";

?>

<!DOCTYPE html>
<html lang="es">


<head>
  <?php include(TEMPLATES_PATH . "/metadata.php") ?>

  <link href="<?php echo PUBLIC_PATH ?>/css/general.css" rel="stylesheet">
  <link href="<?php echo PUBLIC_PATH ?>/css/nosotros/nosotros_edit.css" rel="stylesheet">
  <!-- CSS FILES START-->
  <link href="<?php echo LIB_PATH ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo LIB_PATH ?>/fontawesome/css/all.min.css" rel="stylesheet">



  <script src="<?php echo LIB_PATH ?>/sweetalert2/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="<?php echo LIB_PATH ?>/sweetalert2/dist/sweetalert2.min.css">


  <!-- INICIO CKEDITOR-->
  <script src="<?php echo LIB_PATH ?>/ckeditor/ckeditor.js"></script>


  <script src="<?php echo LIB_PATH ?>/ckeditor/plugins/textmatch/plugin.js"></script>
  <script src="<?php echo LIB_PATH ?>/ckeditor/plugins/autolink/plugin.js"></script>
  <script src="<?php echo LIB_PATH ?>/ckeditor/plugins/autoembed/plugin.js"></script>
  <script src="<?php echo LIB_PATH ?>/ckeditor/plugins/image2/plugin.js"></script>
  <script src="<?php echo LIB_PATH ?>/ckeditor/plugins/embedbase/plugin.js"></script>
  <script src="<?php echo LIB_PATH ?>/ckeditor/plugins/embed/plugin.js"></script>



  <script src="<?php echo PUBLIC_PATH ?>/js/validacion.js"></script>

  <script src="<?php echo PUBLIC_PATH ?>/js/nosotros/nosotros_edit.js"></script>



  <title>Asirea</title>

</head>

<body>
  <?php include(TEMPLATES_PATH . "/nav.php") ?>



  <div class="container  ">
  <div class="row">
  <h3>
    Nosotros
</h3>
  </div>


      
      <div class="row">
        <div id="error_nosotros" style="width:100%" class="error" role="alert"></div>
      </div>
      <div class="row">
        <!--   INICIO CKEDITOR   -->


        <form id="form-nosotros-edit" method="post" action="../../Controller/nosotros/switch_controller.php">
        
        <div class="form-group">
              <label for="editor_nosotros" class="control-label">Contenido</label>
          <textarea name="editor_nosotros" id="editor_nosotros" rows="10" cols="80" require>
                <?php
                $controlador_nosotros = new NosotrosController();
                echo ($controlador_nosotros->getNosotros());
                ?>
            </textarea>
        </div>
          <input class="button btn btn-primary" name="btn_accion" type="Submit" value="Actualizar" />
        </form>
        <!--   FIN CKEDITOR     <input type="button" onclick="history.back()" name="volver atrás" class="btn btn-success" value="volver atrás">  -->
      </div>
  


  </div>
</body>


<?php include(VIEW_PATH . "/Nosotros/nosotros_edit_fileinput.php") ?>

</html>