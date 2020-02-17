<?php

class Conexion extends mysqli {

    private $conexion;

    private $ERROR_NULL_ATTRIBUTE = "1048";
    private $ERROR_DUPLICATE = "1062";

    function __construct() {

        try{

            $this->conexion  = new mysqli('107.180.4.72', 'sodaonline', 'Ond3#9HwzS', 'sodaonline');

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
