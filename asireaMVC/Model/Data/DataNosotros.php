<?php
include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");
require_once CONEXION_PATH;

Class DataNosotros{
    
    function _construct(){

    }
    static public function getNosotros(){
       
        $con = new Conexion();
        $stmt = $con->getConexion()->prepare("SELECT * FROM nosotros");
  
        $stmt->execute();
        return $stmt->fetch();
        $con->getMessage();
        $con->cerrarConexion();

    }



    static public function updateNosotros( $texto){
       
        $con = new Conexion();
        $stmt = $con->getConexion()->prepare("UPDATE nosotros SET texto=:texto");
        $stmt->bind_param(":texto",$texto, PDO::PARAM_STR);
        $stmt->execute();
        $con->getMessage();
        $con->cerrarConexion();
    }

}
?>