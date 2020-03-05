<?php


include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");
require_once DATA_PATH . "/DataNosotros.php";
//echo ("<script>console.log('PHP: " .($_POST["update_text"] . "');</script>"));
class NosotrosController
{

    function __construct()
    {
  
    }


    public function uptateNosotros($texto)
    {
            echo ($texto);
            var_dump($texto);
            echo ("<script>console.log('PHP: " . $texto . "');</script>");
            $respuesta = DataNosotros::updateNosotros($texto);
            return $respuesta;
      
    }
    public function getNosotros()
    {
        $respuesta = DataNosotros::getNosotros();
        return $respuesta;
    }


}
