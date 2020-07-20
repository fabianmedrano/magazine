<?php


include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");
require_once DATA_PATH . "/DataServicios.php";

class ServiciosController
{

    function __construct()
    {
  
    }

   static public function uptateServicios($id,$img,$nombre,$descripcion)
    {
            $respuesta = DataServicios::updateServicios($id,$img,$nombre,$descripcion);
            return $respuesta; 
    }

    static public function getServicioID($id)
    {
        $respuesta = DataServicios::getServicioID($id);
        return $respuesta;
    }
    

   static public function getServicios()
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