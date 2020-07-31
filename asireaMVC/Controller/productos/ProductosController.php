<?php

include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");
require_once DATA_PATH . "/DataProductos.php";

class ProductosController
{

    public function listaProductos(){
        return json_encode(DataProductos::getProductos());
    }

    public function getProducto($id){
        return DataProductos::getProducto($id);
    }

    public function insertarProducto($nombre, $cate, $descrip, $foto){
        return json_encode(DataProductos::insertproductos($foto, $nombre, $descrip, $cate));
    }

<<<<<<< HEAD
    public function editarProducto($id, $nombre, $cate, $descrip, $foto){
        return json_encode(DataProductos::updateProductos($id, $cate, $nombre, $descrip, $foto));
    }

    public function deleteProducto($id, $archivo){
        return json_encode(DataProductos::deleteProductos($id, $archivo));
=======
    static public function getProductosPaginado($pagina,$Productos_pagina)
    {
        
        
        $Productos_pagina =3;

        $cantidad_productos = DataProductos::getProductosCantidad();
        $paginas = ceil($cantidad_productos / $Productos_pagina);

        $respuesta = DataProductos::getProductosPaginado( ($pagina -1)*$Productos_pagina , $Productos_pagina);
     
        return array('productos'=>$respuesta,'paginas'=>$paginas);
    }

    static public function getProductoID($id)
    {
        $respuesta = DataProductos::getProductoID($id);
        return $respuesta;
>>>>>>> develop
    }

}
