<?php


include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");
require_once DATA_PATH . "/DataProyectos.php";
class ProyectoController
{

    function __construct()
    {
  
    }


    static public function uptateProyecto($id,$titulo,$texto)
    {
            $respuesta = DataProyecto::updateProyecto($id,$titulo,$texto);
            return $respuesta; 
    }

    static public function getProyectoID($id)
    {
        $respuesta = DataProyecto::getProyectoID($id);
        return $respuesta;
    }
    
    static public function getProyectosPaginado($pagina,$Proyectos_pagina)
    {
        
        
        $Proyectos_pagina =3;

        $cantidad_Proyectos = DataProyecto::getProyectosCantidad();
        $paginas = ceil($cantidad_Proyectos / $Proyectos_pagina);

        $respuesta = DataProyecto::getProyectosPaginado( ($pagina -1)*$Proyectos_pagina , $Proyectos_pagina);
     
        return array('proyectos'=>$respuesta,'paginas'=>$paginas);
    }


    static public function getProyectos()
    {
        $respuesta = DataProyecto::getProyectos();
        return $respuesta;
    }

    static public function insertProyecto($titulo,$texto)
    {
        $respuesta = DataProyecto::insertProyecto($titulo,$texto);
        return $respuesta; 
    }

    static public function deleteProyecto($id)
    {
        $respuesta = DataProyecto::deleteProyecto($id);
        self:: deleteDirectory($id);
    
        exit ($respuesta); 
    }






// eliminar carpetas e imagenes de las Proyectos
   static function deleteDirectory($idProyecto) {
       $dir = '../../public/img/proyectos/proyectos/'.($idProyecto);
        if(!$dh = @opendir($dir)) return;
        while (false !== ($current = readdir($dh))) {
            if($current != '.' && $current != '..') {
                if (!@unlink($dir.'/'.$current)) 
                   self:: deleteDirectory($dir.'/'.$current);
            }       
        }
        closedir($dh);
        @rmdir($dir);
    }
    
// Creacion de carpetas para las imagenes
   static public function createFile()
    {
        $respuesta = DataProyecto::getLastIdProyecto();
       $carpeta = '../../public/img/proyectos/proyectos/'.((int)$respuesta);
  
     if($respuesta == NULL) $respuesta = 0;
   //  $carpeta = $_SERVER["DOCUMENT_ROOT"].'/img_Proyectos/'.((int)$respuesta+1);   
  
        if (!file_exists($carpeta)) {
            mkdir($carpeta, 0777, true);
        }else{
        }
        return $respuesta;
    }

}
