<?php


include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");
require_once DATA_PATH . "/DataNoticia.php";
class NoticiaController
{

    function __construct()
    {
  
    }


    public function uptateNoticia($id,$titulo,$texto)
    {
            $respuesta = DataNoticia::updateNoticia($id,$titulo,$texto);
            return $respuesta; 
    }

    public function getNoticiaID($id)
    {
        $respuesta = DataNoticia::getNoticiaID($id);
        return $respuesta;
    }
    


    public function getNoticias()
    {
        $respuesta = DataNoticia::getNoticias();
        return $respuesta;
    }

    public function insertNoticia($titulo,$texto)
    {
        $respuesta = DataNoticia::insertNoticia($titulo,$texto);
        return $respuesta; 
    }

    public function deleteNoticia($id)
    {
        $respuesta = DataNoticia::deleteNoticia($id);
        return $respuesta; 
    }






// Creacion de carpetas para las imagenes
    public function createFile()
    {
        $respuesta = DataNoticia::getLastIdNoticia();
       $carpeta = '../../public/img/noticias/noticias/'.((int)$respuesta+1);
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
        return $respuesta+1;
    }

}
