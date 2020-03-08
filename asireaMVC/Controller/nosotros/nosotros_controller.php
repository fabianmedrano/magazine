<?php


include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");
require_once DATA_PATH . "/DataNosotros.php";
class NosotrosController
{

    function __construct()
    {
  
    }


    public function uptateNosotros($texto)
    {

          
            $respuesta = DataNosotros::updateNosotros($texto);
        
            return $respuesta;
      
    }
    public function getNosotros()
    {
        $respuesta = DataNosotros::getNosotros();
        return $respuesta;
    }


}
