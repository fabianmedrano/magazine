


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


  <title>Carussel</title>

</head>

<body>
  <?php include(TEMPLATES_PATH . "/header.php") ?>



  <div class="container  ">
  <div class="row">
  <h3>
    Nosotros
</h3>
  </div>


      <div class="row">
        <!-- INICIO File Input -->
        
      <div id="error_fileinput" style="width:100%" class="error" role="alert"></div>
        
        <div id="container-fileinput-carrusel">
        <div class="form-group">
              <label for="inputcarrusel" class="control-label">Carrusel</label>
          <input id="inputcarrusel" name="inputcarrusel[]" type="file" multiple>
        </div>
        </div>
    
        <!-- FIN File Input -->
      </div>
  </div>
  
</body>


<?php include(VIEW_PATH . "/Nosotros/nosotros_edit_fileinput.php") ?>
</html>