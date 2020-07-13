<?php
include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");


require_once CONTROLLER_PATH . "/nosotros/nosotros_controller.php";

?>

<!DOCTYPE html>
<html>


<head>

  <link href="../../public/css/general.css" rel="stylesheet">
  <link href="../../public/css/nosotros/nosotros.css" rel="stylesheet">
  <link rel="stylesheet" href="../../lib/fontawesome/css/fontawesome.min.css">



  <!-- CSS FILES START-->
  <link href="../../lib/template/css/custom.css" rel="stylesheet">
  <link href="../../lib/template/css/responsive.css" rel="stylesheet">
  <link href="../../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../lib/template/css/prettyPhoto.css" rel="stylesheet">
  <link href="../../lib/fontawesome/css/all.min.css" rel="stylesheet">

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!--  CSS FILES End -->

  <!--   JS Files Start  -->
  <script src="../../lib/jquery/jquery-3.2.1.min.js"></script>
  <script src="../../lib/jquery/jquery-migrate-1.4.1.min.js"></script>
  <script src="../../lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="../../lib/jquery/jquery.prettyPhoto.js"></script>
  <script src="../../lib/template/js/custom.js"></script>
  <script src="../../lib/template/js/popper.min.js"></script>
  <script src="../../lib/template/js/isotope.min.js"></script>


  <!--   JS Files END  -->

  <!-- INICIO CKEDITOR-->
  <script src="../../lib/ckeditor/ckeditor.js"></script>
  <!-- FIN CKEDITOR-->

  <!--INICIO FILE INPUT-->

  <link href="../../lib/fileinput/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">

  <script src="../../lib/fileinput/js/plugins/piexif.min.js" type="text/javascript"></script>
  <script src="../../lib/fileinput/js/plugins/sortable.min.js" type="text/javascript"></script>
  <script src="../../lib/fileinput/js/plugins/purify.min.js" type="text/javascript"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="../../lib/fileinput/js/fileinput.js"></script>
  <script src="../../lib/fileinput/themes/fas/theme.min.js"></script>
  <script src="../../lib/fileinput/js/locales/es.js"></script>
  <!--FIN FILE INPUT-->

  <!-- INICIO jquery validation-->
  <script src="../../lib/jquery-validation/jquery.validate.min.js"></script>

  <script src="../../lib/jquery-validation/additional-methods.js"></script>
  <script src="../../lib/jquery-validation/localization/messages_es.js"></script>
  <!-- FIN jquery validation-->

  <script src="../../public/js/nosotros/nosotros_edit.js"></script>

  <?php include(TEMPLATES_PATH . "/metadata.php") ?>

  <title>Acerca de RECURINFOR (v4)</title>

</head>

<body>
  <?php include(TEMPLATES_PATH . "/header.php") ?>

  <div class="container">
    <div class="container-flex">
      <section class="wrapper">

        <div id="error_titulo" class="error" role="alert"></div>

        <div class="row">
          <!-- INICIO File Input -->
          <div id="container-fileinput-carrusel">
            <label for="input-carrusel" role="button">Seleccionar Archivos</label>
            <input id="input-carrusel" name="input-carrusel[]" type="file" multiple>
          </div>
          <!-- FIN File Input -->
        </div>
        <div class="row">


          <!--   INICIO CKEDITOR   -->
          <form id="form-nosotros-edit" method="post" action="../../Controller/nosotros/switch_controller.php">

            <label for="editor_nosotros">...</label>
            <textarea name="editor_nosotros" id="editor_nosotros" rows="10" cols="80" require>
                <?php
                $controlador_nosotros = new NosotrosController();
                echo ($controlador_nosotros->getNosotros());
                ?>
            </textarea>

            <input class="button btn btn-primary" name="btn_accion" type="Submit" value="Actualizar" />
            <input type="button" onclick="history.back()" name="volver atrás" class="btn btn-success" value="volver atrás">

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
$directory = '../../public/img/nosotros/nosotros_carrusel/';
$images = glob($directory . "*.*");
?>

<script>
  debugger;
  // Tipos de archivos admitidos por su extensión
  var tipos = ['png', 'jpg'];
  // Contadores de archivos subidos por tipo
  var contadores = [0, 0, 0, 0];
  // Reinicia los contadores de tipos subidos
  var reset_contadores = function() {
    for (var i = 0; i < tipos.length; i++) {
      contadores[i] = 0;
    }
  };
  // Incrementa el contador de tipo según la extensión del archivo subido	
  var contadores_tipos = function(archivo) {
    for (var i = 0; i < tipos.length; i++) {
      if (archivo.indexOf(tipos[i]) != -1) {
        contadores[i] += 1;
        break;
      }
    }
  };
  $('#input-carrusel').fileinput({
    language: 'es',
    uploadUrl: "../../lib/fileinput/nosotros/upload.php",
    uploadAsync: false,
    maxFileCount: 5,
    maxFileSize: 3000,
    removeFromPreviewOnError: true,
    allowedFileExtensions: tipos,
    initialPreview: [
      <?php foreach ($images as $image) { ?> "<img src='<?php echo $image; ?>' height='120px' class='file-preview-image'>",
      <?php } ?>
    ],
    initialPreviewConfig: [<?php foreach ($images as $image) {

                              $infoImagenes = explode("/", $image); ?> {
          caption: "<?php echo $infoImagenes[6]; ?>",
          height: "120px",
          url: "../../lib/fileinput/nosotros/delete.php",
          key: "<?php echo $infoImagenes[6]; ?>",
          extra: {
            id: "<?php echo $infoImagenes[6]; ?>"
          }
        },
      <?php } ?>
    ]
  });

  // Evento filecleared del plugin que se ejecuta cuando pulsamos el botón 'Quitar'
  //    Vaciamos y ocultamos el div de alerta
  $('#input-carrusel').on('filecleared', function(event) {
    $('div.alert').empty();
    $('div.alert').hide();
  });
  // Evento filebatchuploadsuccess del plugin que se ejecuta cuando se han enviado todos los archivos al servidor
  //    Mostramos un resumen del proceso realizado
  //    Carpeta donde se han almacenado y total de archivos movidos
  //    Nombre y tamaño de cada archivo procesado
  //    Totales de archivos por tipo
  $('#input-carrusel').on('filebatchuploadsuccess', function(event, data, previewId, index) {
    var ficheros = data.files;
    var respuesta = data.response;
    var total = data.filescount;
    var mensaje;
    var archivo;
    var total_tipos = '';

    reset_contadores(); // Resetamos los contadores de tipo de archivo
    // Comenzamos a crear el mensaje que se mostrará en el DIV de alerta
    mensaje = '<p>' + total + ' ficheros almacenados en la carpeta: ' + respuesta.dirupload + '<br><br>';
    mensaje += 'Ficheros procesados:</p><ul>';
    // Procesamos la lista de ficheros para crear las líneas con sus nombres y tamaños
    for (var i = 0; i < ficheros.length; i++) {
      if (ficheros[i] != undefined) {
        archivo = ficheros[i];
        tam = archivo.size / 1024;
        mensaje += '<li>' + archivo.name + ' (' + Math.ceil(tam) + 'Kb)' + '</li>';
        contadores_tipos(archivo.name); // Incrementamos el contador para el tipo de archivo subido
      }
    };

    mensaje += '</ul><br/>';
    // Línea que muestra el total de ficheros por tipo que se han subido
    for (var i = 0; i < contadores.length; i++) total_tipos += '(' + contadores[i] + ') ' + tipos[i] + ', ';
    // Apaño para eliminar la coma y el espacio (, ) que se queda en el último procesado
    total_tipos = total_tipos.substr(0, total_tipos.length - 2);
    mensaje += '<p>' + total_tipos + '</p>';
    // Si el total de archivos indicados por el plugin coincide con el total que hemos recibido en la respuesta del script PHP
    // mostramos mensaje de proceso correcto
    if (respuesta.total == total) mensaje += '<p>Coinciden con el total de archivos procesados en el servidor.</p>';
    else mensaje += '<p>No coinciden los archivos enviados con el total de archivos procesados en el servidor.</p>';
    // Una vez creado todo el mensaje lo cargamos en el DIV de alerta y lo mostramos
    $('div.alert').html(mensaje);
    $('div.alert').show();
  });
  // Ocultamos el div de alerta donde se muestra un resumen del proceso
  $('div.alert').hide();
</script>



</html>