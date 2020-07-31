<?php

include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");
require_once DATA_PATH . "/DataProductos.php";

class ProductosController
{

    public function listaProductos(){
        return json_encode(DataProductos::getProductos());
    }

    public function insertarProducto($nombre, $cate, $descrip, $foto){
        return json_encode(DataProductos::insertproductos($foto, $nombre, $descrip, $cate));
    }

}
