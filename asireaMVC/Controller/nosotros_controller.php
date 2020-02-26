<?php


include($_SERVER['DOCUMENT_ROOT']."/asirea/asireaMVC/config.php");
require_once DATA_PATH."/DataNosotros.php";

Class nosotrosController{
  
    function __construct() {
       // include($_SERVER['DOCUMENT_ROOT']."/asireaMVC/config.php");
    }

    public function uptateNosotros(){
       if(isset($_POST["updateNosotros"])){
           $texto = $_POST["texto_nosotros"];
        $respuesta = DataNosotros::updateNosotros($texto);
        return $respuesta;
       }
    }
    public function getNosotros(){
        $respuesta = DataNosotros::getNosotros();
        return $respuesta;
    }

    
}