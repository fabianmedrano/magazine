<?php


include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");
require_once DATA_PATH . "/DataProductos.php";
class ProductosController
{

    function __construct()
    {
  
    }


    static public function uptateProductos($id,$categoria, $nombre, $descripcion,$imagen)
    {
            $respuesta = DataProductos::updateProductos($id,$categoria, $nombre, $descripcion,$imagen);
            return $respuesta; 
    }

    static public function getProductosID($id)
    {
        $respuesta = DataProductos::getProductosID($id);
        return $respuesta;
    }


    static public function getProductos()
    {
        $respuesta = DataProductos::getProductos();
        return $respuesta;
    }

    static public function insertProductos($categoria, $nombre, $descripcion,$imagen)
    {
        $respuesta = DataProductos::insertProductos($categoria, $nombre, $descripcion,$imagen);
        return $respuesta; 
    }

    static public function deleteProductos($id)
    {
        $respuesta = DataProductos::deleteProductos($id);
        return $respuesta; 
    }





}
