<?php

include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");
require_once CONEXION_PATH;

class DataBiblioteca
{

    function _construct(){}

    static public function getDocumentos()
    {
        $con = null;
        try {
            $con = new Conexion();

            $stmt = $con->getConexion()->prepare("call sp_listaBiblioteca();");

            $stmt->execute();
            $stmt->bind_result($id, $nombre, $autor, $descripcion, $archivo, $fecha);

            $array = array();

            while($stmt->fetch()){
                $obj = (object)[
                    'id' => $id,
                    'nombre'=> $nombre,
                    'autor'=> $autor,
                    'descripcion'=> $descripcion,
                    'archivo'=> $archivo,
                    'fecha' => $fecha
                ];

                array_push($array, $obj);
            }

            return json_encode($array);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return $e->getMessage();
        } finally {
            $con->cerrarConexion();
        }
    }

    static public function getDocumento($id)
    {
        $con = null;
        try {
            $con = new Conexion();

            $stmt = $con->getConexion()->prepare("call sp_getDocumento(?);");
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $stmt->bind_result($id, $nombre, $autor, $descripcion, $archivo, $fecha);

            $array = array();

            while($stmt->fetch()){
                $obj = (object)[
                    'id' => $id,
                    'nombre'=> $nombre,
                    'autor'=> $autor,
                    'descripcion'=> $descripcion,
                    'archivo'=> $archivo,
                    'fecha' => $fecha
                ];

                array_push($array, $obj);
            }

            return json_encode($array);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return $e->getMessage();
        } finally {
            $con->cerrarConexion();
        }
    }

    static public function insertDocumento($nombre, $autor, $descripcion, $archivo)
    {
        $con = null;
        try {
            $con = new Conexion();

            $stmt = $con->getConexion()->prepare("call sp_insertarDocumento(?,?,?,?);");
            $stmt->bind_param('ssss', $nombre,$autor, $descripcion, $archivo);
            $stmt->execute();

            if($stmt->affected_rows > 0){
                $msm = [
                    'status' => 1,
                    'mensaje' => "El documento ".$nombre." fue agregado correctamente"
                ];
                return $msm;
            }else{
                unlink('../../public/documentos/'.$archivo);
                $msm = [
                    'status' => 0,
                    'mensaje' => "El documento ".$nombre." no fue agregado"
                ];
                return $msm;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            unlink('../../public/documentos/'.$archivo);
            $msm = [
                'status' => -1,
                'mensaje' => $e->getMessage()
            ];
            return $msm;
        } finally {
            $con->cerrarConexion();
        }
    }

    static public function updateDocumento($nombre, $autor, $descripcion, $archivo, $id)
    {
        $con = null;
        try {
            $con = new Conexion();

            $stmt = $con->getConexion()->prepare("call sp_updateDocumento(?,?,?,?,?);");
            $stmt->bind_param('issss', $id,$nombre,$autor, $descripcion, $archivo);
            $stmt->execute();

            if($stmt->affected_rows > 0){
                $msm = [
                    'status' => 1,
                    'mensaje' => "El documento ".$nombre." fue actualizado correctamente"
                ];
                return $msm;
            }else{
                unlink('../../public/documentos/'.$archivo);
                $msm = [
                    'status' => 0,
                    'mensaje' => "El documento ".$nombre." no fue actualizado"
                ];
                return $msm;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            unlink('../../public/documentos/'.$archivo);
            $msm = [
                'status' => -1,
                'mensaje' => $e->getMessage()
            ];
            return $msm;
        } finally {
            $con->cerrarConexion();
        }
    }

    static public function deleteDocumento($id)
    {
        $con = null;
        try {
            $con = new Conexion();

            $stmt = $con->getConexion()->prepare("call sp_deleteDocumento(?);");
            $stmt->bind_param('i', $id);
            $stmt->execute();

            if($stmt->affected_rows > 0){
                $msm = [
                    'status' => 1,
                    'mensaje' => "El documento fue eliminado correctamente"
                ];
                return $msm;
            }else{
                $msm = [
                    'status' => 0,
                    'mensaje' => "El documento no fue eliminado"
                ];
                return $msm;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            $msm = [
                'status' => -1,
                'mensaje' => $e->getMessage()
            ];
            return $msm;
        } finally {
            $con->cerrarConexion();
        }
    }
}

