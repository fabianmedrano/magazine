<?php

$carpetaAdjunta = "../../public/img/galeria/".$_REQUEST['carpeta']."/";

// Contar envían por el plugin
$Imagenes = count($_FILES['imagenes']['name']);
$infoImagenesSubidas = array();
$ImagenesSubidas = array();

for($i = 0; $i < $Imagenes; $i++) {

    // El nombre y nombre temporal del archivo que vamos para adjuntar
    $nombreArchivo = $_FILES['imagenes']['name'][$i];
    $nombreTemporal = $_FILES['imagenes']['tmp_name'][$i];

    $rutaArchivo = $carpetaAdjunta.$nombreArchivo;

    move_uploaded_file($nombreTemporal,$rutaArchivo);

    $infoImagenesSubidas[$i] = array("caption"=>"$nombreArchivo", "url"=>"../../Controller/galeria/borrar_Img.php?carpeta=".$_REQUEST['carpeta']
    , "key"=>$nombreArchivo);
    $ImagenesSubidas[$i] = "<img src='".$carpetaAdjunta.$nombreArchivo."' height='100%' width='100%' class='file-preview-image'>";

}

$arr = array("file_id" => 0, "overwriteInitial" => true, "initialPreviewConfig" => $infoImagenesSubidas,
    "initialPreview" => $ImagenesSubidas);

echo json_encode($arr);

?>



