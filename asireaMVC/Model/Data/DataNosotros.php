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

        $stmt->bind_result($texto);

        /* obtener los valores */
       $stmt->fetch();

        return $texto;

        echo($con->getMessage());
        $con->cerrarConexion();

    }



    static public function updateNosotros( $texto){
        $con = new Conexion();
        $stmt = $con->getConexion()->prepare("UPDATE nosotros SET texto = ? ");
        $stmt->bind_param("s", $texto);
        $stmt->execute();
        echo($con->getMessage());
        $con->cerrarConexion();
    }

}
?>