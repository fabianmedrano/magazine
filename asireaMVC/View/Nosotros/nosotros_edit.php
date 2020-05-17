<?php
include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");


require_once CONTROLLER_PATH . "/nosotros/nosotros_controller.php";

?>

<!DOCTYPE html>
<html>


<head>

  <link href="../../public/css/general.css" rel="stylesheet">
  <link href="../../public/css/nosotros/nosotros.css" rel="stylesheet">

  <link href="../../public/css/custom.css" rel="stylesheet">
  <link href="../../public/css/responsive.css" rel="stylesheet">
  <link href="../../public/css/owl.carousel.min.css" rel="stylesheet">
  <link href="../../lib//bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../public/css/prettyPhoto.css" rel="stylesheet">
  <link href="../../lib/fontawesome/css/all.min.css" rel="stylesheet">
 
 
  <script src="../../lib/jquery/jquery-3.3.1.min.js"></script>
  <script src="../../lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="../../public/js/owl.carousel.min.js"></script>
  <script src="../../lib/jquery/jquery.prettyPhoto.js"></script>
  <script src="../../public/js/custom.js"></script>

 


  <!-- INICIO CKEDITOR-->
  <script src="../../lib/ckeditor/ckeditor.js"></script>
  <!-- FIN CKEDITOR-->



   <!--INICIO FILE INPUT-->

   
   <link href="../../lib/fileinput/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
   <!--<link rel="stylesheet" href="../../lib/fontawesome/css/all.css" crossorigin="anonymous"> -->
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">


   <script src="../../lib/fileinput/js/locales/es.js"></script>
    <script src="../../lib/fileinput/js/plugins/piexif.min.js" type="text/javascript"></script>
    <script src="../../lib/fileinput/js/plugins/sortable.min.js" type="text/javascript"></script>
    <script src="../../lib/fileinput/js/plugins/purify.min.js" type="text/javascript"></script>

    <!-- popper.min.js below is needed if you use bootstrap 4.x (for popover and tooltips). You can also use the bootstrap js 
       3.3.x versions without popper.min.js. -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> <!--- -->
    <!-- bootstrap.min.js below is needed if you wish to zoom and preview file content in a detail modal
        dialog. bootstrap 4.x is supported. You can also use the bootstrap js 3.3.x versions. -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> <!--- -->
    <script src="../../lib/fileinput/js/fileinput.min.js"></script>
    <script src="../../lib/fileinput/themes/fas/theme.min.js"></script>
    <!-- optionally if you need translation for your language then include the locale file as mentioned below (replace LANG.js with your language locale) -->
    
   <!--FIN FILE INPUT-->



   
  <script src="../../public/js/nosotros/nosotros_edit.js"></script>

  <?php include(TEMPLATES_PATH . "/metadata.php") ?>

  <title>Acerca de RECURINFOR (v4)</title>

</head>

<body>
  <?php include(TEMPLATES_PATH . "/header.php") ?>

  <div class="container">
    <div class="container-flex">
      <section class="wrapper">
        <div class="row">

          <!-- INICIO File Input -->
          <div id="container-fileinput-carrusel">


            <input id="input-carrusel" type="file" class="file" data-preview-file-type="text">
          </div>
          <!-- FIN File Input -->


          <!--   INICIO CKEDITOR   -->
          <form method="post" action="../../Controller/nosotros/switch_controller.php">
            <textarea name="editor_nosotros" id="editor_nosotros" rows="10" cols="80">
          <?php
          $controlador_nosotros = new NosotrosController();
          echo ($controlador_nosotros->getNosotros());
          ?>
        </textarea>


            <input class="button btn btn-primary" name="btn_accion" type="Submit" value="Actualizar" />

            <script>
              CKEDITOR.replace('editor_nosotros', {
                filebrowserBrowseUrl: '/asirea/asireaMVC/lib/filemanager/filemanager/nosotros/dialog.php?type=2&editor=ckeditor&fldr=',
                filebrowserUploadUrl: '/asirea/asireaMVC/lib/filemanager/filemanager/nosotros/dialog.php?type=2&editor=ckeditor&fldr=',
                filebrowserImageBrowseUrl: '/asirea/asireaMVC/lib/filemanager/filemanager/nosotros/dialog.php?type=1&editor=ckeditor&fldr='

              });
            </script>
          </form>
          <!--   FIN CKEDITOR   -->
        </div>
      </section>
    </div>
    </div>


    <?php include(TEMPLATES_PATH . "/footer.php") ?>
</body>

<?php
$directory = "../../public/img/nosotros/nosotros_carrusel";
$images = glob($directory . "*.*");
?>

<script>
    $("#input-carrusel").fileinput();

	$("#input-carrusel").fileinput({
		uploadUrl: "upload.php",
		uploadAsync: false,
		minFileCount: 1,
		maxFileCount: 20,
		showUpload: false,
		showRemove: false,

		initialPreview: [
			<?php foreach ($images as $image) { ?> 
			"<img src='<?php echo $image; ?>' height='120px' class='file-preview-image'>",
			<?php } ?>
		],

		initialPreviewConfig: [<?php foreach ($images as $image) {
									$infoImagenes = explode("/", $image); ?> {
					caption: "<?php echo $infoImagenes[1]; ?>",
					height: "120px",
					url: "delete.php",
					key: "<?php echo $infoImagenes[1]; ?>",
					extra: {
						id: "<?php echo $infoImagenes[1]; ?>"
					}
				},
			<?php } ?>
		]
	}).on("filebatchselected", function(event, files) {
		$("#input-carrusel").fileinput("upload");
	});
</script>




</html>