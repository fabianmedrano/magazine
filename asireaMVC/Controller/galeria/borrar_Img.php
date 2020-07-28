<?php

parse_str(file_get_contents("php://input"),$datosDELETE);

$carpetaAdjunta = "../../public/img/galeria/".$_REQUEST['carpeta']."/";

$key = $datosDELETE['key'];

unlink($carpetaAdjunta.$key);

echo 0;

?>
