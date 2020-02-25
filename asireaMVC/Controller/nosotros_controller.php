<?php


include($_SERVER['DOCUMENT_ROOT']."/asireaMVC/config.php");
require_once DATA_PATH."/DataNosotros.php";

Class nosotrosController{
  
    function __construct() {
        include($_SERVER['DOCUMENT_ROOT']."/asireaMVC/config.php");
    }

    public function uptateNosotros(){
       if(isset($_POST["updateNosotros"])){
           $datos = array("id"=>$_POST["id_nosotros"],
                          "texto"=>$_POST["texto_nosotros"]
        );
        $respuesta = DataNosotros::updateNosotros($datos);
        return $respuesta;
       }
    }

    
}