<?php

include($_SERVER['DOCUMENT_ROOT']."/asireaMVC/config.php");
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



    static public function updateNosotros( $datos){
       
        $con = new Conexion();
        $stmt = $con->getConexion()->prepare("UPDATE nosotros SET texto=:texto WHERE id=:id");
        $stmt->bind_param(":id",$datos["id"], PDO::PARAM_INT);
        $stmt->bind_param(":id",$datos["texto"], PDO::PARAM_STR);
        $stmt->execute();
        $con->getMessage();
        $con->cerrarConexion();
    }

}
?>