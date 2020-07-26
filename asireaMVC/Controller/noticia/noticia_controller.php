<?php


include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");
require_once DATA_PATH . "/DataNoticia.php";
class NoticiaController
{

    function __construct()
    {
  
    }


    static public function uptateNoticia($id,$titulo,$texto)
    {
            $respuesta = DataNoticia::updateNoticia($id,$titulo,$texto);
            return $respuesta; 
    }

    static public function getNoticiaID($id)
    {
        $respuesta = DataNoticia::getNoticiaID($id);
        return $respuesta;
    }
    
    static public function getNoticiasPaginado($pagina,$noticias_pagina)
    {
        
        
        $noticias_pagina =3;

        $cantidad_noticias = DataNoticia::getNoticiasCantidad();
        $paginas = ceil($cantidad_noticias / $noticias_pagina);

        $respuesta = DataNoticia::getNoticiasPaginado( ($pagina -1)*$noticias_pagina , $noticias_pagina);
     
        return array('noticias'=>$respuesta,'paginas'=>$paginas);
    }


    static public function getNoticias()
    {
        $respuesta = DataNoticia::getNoticias();
        return $respuesta;
    }

    static public function insertNoticia($titulo,$texto)
    {
        $respuesta = DataNoticia::insertNoticia($titulo,$texto);
        return $respuesta; 
    }

    static public function deleteNoticia($id)
    {
        $respuesta = DataNoticia::deleteNoticia($id);
        self:: deleteDirectory($id);
    
        exit ($respuesta); 
    }






// eliminar carpetas e imagenes de las noticias
   static function deleteDirectory($idnoticia) {
       $dir = '../../public/img/noticias/noticias/'.($idnoticia);
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
        $respuesta = DataNoticia::getLastIdNoticia();
       $carpeta = '../../public/img/noticias/noticias/'.((int)$respuesta);
     echo $respuesta;
     if($respuesta == NULL) $respuesta = 0;
   //  $carpeta = $_SERVER["DOCUMENT_ROOT"].'/img_noticias/'.((int)$respuesta+1);   
        echo $carpeta.'\n';
        if (!file_exists($carpeta)) {
            mkdir($carpeta, 0777, true);
            echo('no esxiste carpeta ');
        }else{
            echo('carpeta existe');
        }
        return $respuesta;
    }

}
