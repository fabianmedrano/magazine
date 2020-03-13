<?php
include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");
require_once CONEXION_PATH;

class DataNoticia
{

    function _construct()
    {
    }


    static public function getNoticiaID($id)
    {
        try {
            $con = new Conexion();

            $stmt = $con->getConexion()->prepare("CALL sp_getNoticiaID(?);");
            $stmt->bind_param("i", $id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        } finally {
            $con->cerrarConexion();
        }
    }

    static public function getNoticias()
    {
        try {
            $con = new Conexion();

            $stmt = $con->getConexion()->prepare("CALL sp_getNoticias();");
            $stmt->execute();
            return $stmt->fetch();
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
    static public function insertNoticia($titulo, $texto)
    {

        try {
            $con = new Conexion();

            $stmt = $con->getConexion()->prepare("CALL sp_insertNoticia(?,?);");
            $stmt->bind_param("ss", $titulo, $texto);
            $stmt->execute();
            echo("por aui");
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
