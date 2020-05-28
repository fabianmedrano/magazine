<?php


include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");
require_once DATA_PATH . "/DataServicios.php";
class ServiciosController
{

    function __construct()
    {
  
    }

/*
    public function uptateServicios($id,$titulo,$texto)
    {
            $respuesta = DataServicios::updateServicios($id,$titulo,$texto);
            return $respuesta; 
    }

    public function getServiciosID($id)
    {
        $respuesta = DataServicios::getServiciosID($id);
        return $respuesta;
    }
    
*/

    public function getServicioss()
    {
        $respuesta = DataServicios::getServicios();
        return $respuesta;
    }

    public function insertServicios($img,$nombre,$descripcion)
    {
        $respuesta = DataServicios::insertServicios($img,$nombre,$descripcion);
        return $respuesta; 
    }

}