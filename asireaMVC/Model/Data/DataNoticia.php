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
    static public function insertNoticia( $titulo , $texto )
    {
        try {
            $con = new Conexion();
            $stmt = $con->getConexion()->prepare("CALL sp_insertNoticia(?, ?);");
            $stmt->bind_param("s", $titulo );
            $stmt->bind_param("s", $texto );
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        } finally {
            $con->cerrarConexion();
        }
    }
    static public function getLastIdNoticia()
    {
        try {
            $con = new Conexion();
            $stmt = $con->getConexion()->prepare("CALL sp_getLastIdNoticia();");
            $stmt->execute();
            $stmt->bind_result($id);
            $stmt->fetch();
            return $id;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        } finally {
            $con->cerrarConexion();
        }
    }
    
}
