<?php
include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");

require_once CONTROLLER_PATH . "/nosotros/nosotros_controller.php";

?>

<!DOCTYPE html>
<html>


<head>
  <?php/// include(TEMPLATES_PATH . "/metadata.php") ?>

  <link href="<?php echo PUBLIC_PATH ?>/css/general.css" rel="stylesheet">
  <link href="<?php echo PUBLIC_PATH ?>/css/nosotros/nosotros_edit.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo LIB_PATH ?>/fontawesome/css/fontawesome.min.css">



  <!-- CSS FILES START-->
  <link href="<?php echo LIB_PATH ?>/template/css/custom.css" rel="stylesheet">
  <link href="<?php echo LIB_PATH ?>/template/css/responsive.css" rel="stylesheet">
  <link href="<?php echo LIB_PATH ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo LIB_PATH ?>/template/css/prettyPhoto.css" rel="stylesheet">
  <link href="<?php echo LIB_PATH ?>/fontawesome/css/all.min.css" rel="stylesheet">

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!--  CSS FILES End -->

  <!--   JS Files Start  -->
  <script src="<?php echo LIB_PATH ?>/jquery/jquery-3.2.1.min.js"></script>
  <script src="<?php echo LIB_PATH ?>/jquery/jquery-migrate-1.4.1.min.js"></script>
  <script src="<?php echo LIB_PATH ?>/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo LIB_PATH ?>/jquery/jquery.prettyPhoto.js"></script>
  <script src="<?php echo LIB_PATH ?>/template/js/custom.js"></script>
  <script src="<?php echo LIB_PATH ?>/template/js/popper.min.js"></script>
  <script src="<?php echo LIB_PATH ?>/template/js/isotope.min.js"></script>


  <!--   JS Files END  -->

  <!-- INICIO CKEDITOR-->
  <script src="<?php echo LIB_PATH ?>/ckeditor/ckeditor.js"></script>
  <!-- FIN CKEDITOR-->

  <!--INICIO FILE INPUT-->

  <link href="<?php echo LIB_PATH ?>/fileinput/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
  <script src="<?php echo LIB_PATH ?>/fileinput/js/plugins/piexif.min.js" type="text/javascript"></script>
  <script src="<?php echo LIB_PATH ?>/fileinput/js/plugins/sortable.min.js" type="text/javascript"></script>
  <script src="<?php echo LIB_PATH ?>/fileinput/js/plugins/purify.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="<?php echo LIB_PATH ?>/fileinput/js/fileinput.js"></script>
  <script src="<?php echo LIB_PATH ?>/fileinput/themes/fas/theme.min.js"></script>
  <script src="<?php echo LIB_PATH ?>/fileinput/js/locales/es.js"></script>
  <!--FIN FILE INPUT-->


  <script src="<?php echo PUBLIC_PATH ?>/js/validacion.js"></script>

  <script src="<?php echo PUBLIC_PATH ?>/js/nosotros/nosotros_edit.js"></script>



  <title>Acerca de RECURINFOR (v4)</title>

</head>

<body>
  <?php include(TEMPLATES_PATH . "/nav.php") ?>



  <div class="container">
  <div class="row">
  <h3>
    ¿Que es ASIREA?
</h3>
  </div>

      <div class="row">
        <!-- INICIO File Input -->
        
      <div id="error_fileinput" class="error" role="alert"></div>
        
        <div id="container-fileinput-carrusel">
        <div class="form-group">
              <label for="inputcarrusel" class="control-label">Carrusel</label>
          <input id="inputcarrusel" name="inputcarrusel[]" type="file" multiple>
        </div>
        </div>
    
        <!-- FIN File Input -->
      </div>
      <div class="row">
        <div id="error_nosotros" class="error" role="alert"></div>
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
  <?php include(TEMPLATES_PATH . "/footer.php") ?>
</body>


<?php include(VIEW_PATH . "/Nosotros/nosotros_edit_fileinput.php") ?>

</html>