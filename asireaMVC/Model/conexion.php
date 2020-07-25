<?php

class Conexion extends mysqli {

    private $conexion;

    private $ERROR_NULL_ATTRIBUTE = "1048";
    private $ERROR_DUPLICATE = "1062";

    function __construct() {

        try{

           $this->conexion  = new mysqli('160.153.63.133', 'asirea', 'w3}WOAY;4jV2', 'db_asirea');
         //   $this->conexion  = new mysqli('localhost', 'root', '', 'asirea');
       //  $this->conexion ->set_charset("utf8");

        } catch (mysqli_sql_exception $e){
          
            $mensaje = "Error de conexión";
            throw $e;
        }

    }


    public function getConexion(){
        return $this->conexion;
    }

    public function getMessage() {
        $message="success";
        $error=mysqli_errno($this->conexion);

        if($error==$this->ERROR_NULL_ATTRIBUTE)
            $message="nullAttribute";
        else if($error==$this->ERROR_DUPLICATE)
            $message="duplicate";
        else if(!empty($error))
            $message="error";

        return $message;
    }

    public function cerrarConexion(){
        $this->conexion->close();
    }

}