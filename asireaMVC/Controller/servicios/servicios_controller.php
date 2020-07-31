<?php


include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");
require_once DATA_PATH . "/DataServicios.php";

class ServiciosController
{

    public function obtener_servicio(){
        return DataCategoria::obtener_servicio();
    }

    public function registrar_Servicio($imagen, $nombre, $descripcion){
        return DataCategoria::registrar_servicio($imagen, $nombre, $descripcion);

    }

    public function editar_servicio($id,$imagen, $nombre, $descripcion){
        return DataCategoria::editar_servicio($id, $imagen, $nombre, $descripcion);
    }

    public function eliminar_servicio($id){
        return DataCategoria::eliminar_servicio($id);
    }


    static public function getServiciosPaginado($pagina,$Servicios_pagina)
    {
        
        
        $Servicios_pagina =3;

        $cantidad_servicios = DataServicios::getServiciosCantidad();
        $paginas = ceil($cantidad_servicios / $Servicios_pagina);

        $respuesta = DataServicios::getServiciosPaginado( ($pagina -1)*$Servicios_pagina , $Servicios_pagina);
     
        return array('servicios'=>$respuesta,'paginas'=>$paginas);
    }

    static public function getServicioID($id)
    {
        $respuesta = DataServicios::getServicioID($id);
        return $respuesta;
    }

}


$servicio = new ServiciosController();


if(isset($_REQUEST["obtener_servicio"])){
    echo $servicio->obtener_servicio();
}

if(isset($_REQUEST["registrar_servicio"])){
    echo $servicio->registrar_servicio($_POST["imagen"], $_POST["nombre"], $_POST["descripcion"]);
}

if(isset($_REQUEST["eliminar_servicio"])){
    echo $servicio->eliminar_servicio($_REQUEST["id"]);
}

if(isset($_REQUEST["editar_servicio"])){
    echo $servicio->editar_servicio($_REQUEST["id"],$_POST["imagen"],  $_REQUEST["nombre"], $_REQUEST["descripcion"]);
}