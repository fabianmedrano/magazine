
<?php
$directory = '../../public/img/nosotros/nosotros_carrusel/';
$images = glob($directory . "*.*");
?>

<script>
  var tipos = ['png', 'jpg'];

  
  $('#input-carrusel').fileinput({
    language: 'es',
    uploadUrl: "../../lib/fileinput/nosotros/upload.php",
    uploadAsync: true,
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
    console.log(mensaje);
    $('div.alert').html(mensaje);
    $('div.alert').show();
  });
  // Ocultamos el div de alerta donde se muestra un resumen del proceso
  $('div.alert').hide();
</script>


