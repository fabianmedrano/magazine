<?php


include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");
require_once DATA_PATH . "/DataNoticia.php";
class NoticiaController
{

    function __construct()
    {
  
    }


    public function uptateNoticia($texto)
    {
            $respuesta = DataNoticia::updateNoticia($texto);
            return $respuesta; 
    }
    public function getNoticia()
    {
        $respuesta = DataNoticia::getNoticia();
        return $respuesta;
    }


}
