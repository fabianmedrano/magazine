<?php
include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");
require_once CONEXION_PATH;

class DataNoticia
{

    function _construct()
    {
    }
    static public function getNoticia()
    {
        try {
            $con = new Conexion();

            $stmt = $con->getConexion()->prepare("CALL sp_getNoticia();");

            $stmt->execute();
            $stmt->bind_result($texto);
            $stmt->fetch();
            return $texto;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        } finally {
            $con->cerrarConexion();
        }
    }


    static public function updateNoticia($texto)
    {
        try {
            $con = new Conexion();
            $stmt = $con->getConexion()->prepare("CALL sp_updateNoticia(?);");
            $stmt->bind_param("s", $texto);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        } finally {
            $con->cerrarConexion();
        }
    }
}
