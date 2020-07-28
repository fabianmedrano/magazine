<?php

include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");
require_once CONEXION_PATH;

class DataGaleria
{

    static public function getCategoria()
    {
        $con = null;
        try {
            $con = new Conexion();

            $stmt = $con->getConexion()->prepare("call sp_listaCategorias();");

            $stmt->execute();
            $stmt->bind_result($id, $nombre);

            $array = array();

            while($stmt->fetch()){
                $obj = (object)[
                    'id' => $id,
                    'nombre'=> $nombre
                ];

                array_push($array, $obj);
            }

            return $array;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return $e->getMessage();
        } finally {
            $con->cerrarConexion();
        }
    }

    static public function insertCategoria($nombre)
    {
        $con = null;
        $msm = [];
        try {
            $con = new Conexion();

            $stmt = $con->getConexion()->prepare("call sp_insertarCategoria(?);");
            $stmt->bind_param('s', $nombre);
            $stmt->execute();
            $stmt->bind_result($id);
            if($stmt->fetch()){
                $msm = [
                    'status' => 1,
                    'mensaje' => "La Categoría ".$nombre." fue agregada correctamente"
                ];
                mkdir('../../public/img/galeria/'.$id, 0777, true);
            }else{
                $msm = [
                    'status' => 0,
                    'mensaje' => "El Categoría ".$nombre." no fue agregada"
                ];
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            $msm = [
                'status' => -1,
                'mensaje' => $e->getMessage()
            ];
        } finally {
            $con->cerrarConexion();
        }
        return $msm;
    }

    static public function updateCategoria($id, $nombre)
    {
        $con = null;
        $msm = [];
        try {
            $con = new Conexion();

            $stmt = $con->getConexion()->prepare("call sp_editarCategoria(?,?);");
            $stmt->bind_param('is', $id, $nombre);
            $stmt->execute();

            if($stmt->affected_rows > 0){
                $msm = [
                    'status' => 1,
                    'mensaje' => "La Categoría ".$nombre." fue editada correctamente"
                ];
            }else{
                $msm = [
                    'status' => 0,
                    'mensaje' => "El Categoría ".$nombre." no fue editada"
                ];
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            $msm = [
                'status' => -1,
                'mensaje' => $e->getMessage()
            ];
        } finally {
            $con->cerrarConexion();
        }
        return $msm;
    }

    static public function deleteCategoria($id)
    {
        $con = null;
        $msm = [];
        try {
            $con = new Conexion();

            $stmt = $con->getConexion()->prepare("call sp_eliminarCategoria(?);");
            $stmt->bind_param('i', $id);
            $stmt->execute();

            if($stmt->affected_rows > 0){
                $msm = [
                    'status' => 1,
                    'mensaje' => "La Categoría fue eliminada correctamente"
                ];
                $direc = '../../public/img/galeria/'.$id;
                if(is_dir($direc)){
                    rmdir($direc);
                }
            }else{
                $msm = [
                    'status' => 0,
                    'mensaje' => "El Categoría no fue eliminada"
                ];
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            $msm = [
                'status' => -1,
                'mensaje' => $e->getMessage()
            ];
        } finally {
            $con->cerrarConexion();
        }
        return $msm;
    }
}