<?php


include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");
require_once DATA_PATH . "/DataBiblioteca.php";
class Biblioteca_controller
{

    public function getDocumentos()
    {
           return DataBiblioteca::getDocumentos();
    }

    public function getDocumento($id)
    {
        return DataBiblioteca::getDocumento($id);
    }

    public function insertDocumento($nombre, $autor, $descripcion, $archivo){
        $resultado = DataBiblioteca::insertDocumento($nombre,$autor, $descripcion, $archivo);
        return json_encode($resultado);
    }

    public function updateDocumento($nombre, $autor, $descripcion, $archivo, $id){
        $resultado = DataBiblioteca::updateDocumento($nombre,$autor, $descripcion, $archivo,$id);
        return json_encode($resultado);
    }

    public function deleteDocumento($id){
        $resultado = DataBiblioteca::deleteDocumento($id);
        return json_encode($resultado);
    }
}
