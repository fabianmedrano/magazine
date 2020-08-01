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

    public function insertContacto($tipo, $contacto)
    {
        $respuesta = DataNosotros::insertContacto($tipo, $contacto);
        return $respuesta;
    }


    public function getTelefonos()
    {
        $respuesta = DataNosotros::getTelefonos();
        return $respuesta;
    }
    
    public function getRedes()
    {
        $respuesta = DataNosotros::getRedes();
        return $respuesta;
    }
    public function getCorreos()
    {
        $respuesta = DataNosotros::getCorreos();
        return $respuesta;
    }

    static public function deleteContacto($id)
    {
        $respuesta = DataNosotros::deleteContactoID($id);
    
        exit(json_encode($respuesta)); 
    }

    
    static public function updateContacto($id,$contacto)
    {
            $respuesta = DataNosotros::updateContacto($id,$contacto);
            return $respuesta; 
    }
}
