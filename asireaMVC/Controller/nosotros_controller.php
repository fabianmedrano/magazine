<?php


include($_SERVER['DOCUMENT_ROOT']."/asirea/asireaMVC/config.php");
require_once DATA_PATH."/DataNosotros.php";

Class NosotrosController{
  
    function __construct() {
       // include($_SERVER['DOCUMENT_ROOT']."/asireaMVC/config.php");
    }

    public function uptateNosotros(){
     //   $editor_data = $_POST[ 'editor1' ];
       if(isset($_POST["ckeditor_nosotros"])){
           $texto = $_POST["ckeditor_nosotros"];
           echo($texto);
           var_dump($texto);
        $respuesta = DataNosotros::updateNosotros($texto);
        return $respuesta;
       }
    }
    public function getNosotros(){
        $respuesta = DataNosotros::getNosotros();
        return $respuesta;
    }
    

    
}