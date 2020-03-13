<?php
include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");
require_once CONEXION_PATH;

class DataNosotros
{

    function _construct()
    {
    }
    static public function getNosotros()
    {
        try {
            $con = new Conexion();

            $stmt = $con->getConexion()->prepare("CALL sp_getNosotros();");

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


    static public function updateNosotros($texto)
    {
        try {
            $con = new Conexion();

            $stmt = $con->getConexion()->prepare("CALL sp_updateNosotros(?);");
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
