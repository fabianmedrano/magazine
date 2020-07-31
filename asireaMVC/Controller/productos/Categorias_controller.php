<?php

include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");
require_once DATA_PATH . "/DataCategoria.php";

class Categorias_controller
{

    public function obtener_categoria(){
        return DataCategoria::obtener_categoria();
    }

    public function insertar_categoria($nombre){
        return DataCategoria::registrar_categoria($nombre);

    }

    public function editar_categoria($id, $nombre){
        return DataCategoria::editar_categoria($id, $nombre);
    }

    public function eliminar_categoria($id){
        return DataCategoria::eliminar_categoria($id);
    }

}

$categoria = new Categorias_Controller();

if(isset($_REQUEST["obtener_categoria"])){
    echo $categoria->obtener_categoria();
}

if(isset($_REQUEST["registrar_categoria"])){
    echo $categoria->insertar_categoria($_REQUEST["nombre"]);
}

if(isset($_REQUEST["eliminar_producto"])){
    echo $categoria->eliminar_categoria($_REQUEST["id"]);
}

if(isset($_REQUEST["editar_categoria"])){
    echo $categoria->editar_categoria($_REQUEST["id"], $_REQUEST["nombre"]);
}