
<?php
$directory = '../../public/img/nosotros/nosotros_carrusel/';
$images = glob($directory . "*.*");





?>
<script>
  var tipos = ['png', 'jpg'];

  
  $('#input-carrusel').fileinput({
    language: 'es',
    uploadUrl: "../../lib/fileinput/nosotros/upload.php",
    showUploadedThumbs :false,
    showUpload:false, 
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


  $('#input-carrusel').on('fileuploaded', function(event, previewId, index, fileId) {

        console.log('File uploaded', previewId, index, fileId);
        
        
    $('#input-carrusel').fileinput('refresh');
    });

  $('#input-carrusel').on('filecleared', function(event) {
    $('div.alert').empty();
    $('div.alert').hide();
  });
  // Evento filebatchuploadsuccess del plugin que se ejecuta cuando se han enviado todos los archivos al servidor
  //    Mostramos un resumen del proceso realizado
  //    Carpeta donde se han almacenado y total de archivos movidos
  //    Nombre y tamaño de cada archivo procesado
  //    Totales de archivos por tipo


  // Ocultamos el div de alerta donde se muestra un resumen del proceso
  $('div.alert').hide();
</script>


