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

            $stmt->bind_result($id, $titulo, $descripcion);
            $stmt->fetch();
            return array('id' => $id, 'titulo' => $titulo, 'descripcion' => $descripcion);
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
            $noticias = array();;
            $con = new Conexion();
            $resultado = $con->getConexion()->query("CALL sp_getNoticias();");
            if ($resultado) {
                while ($fila = $resultado->fetch_row()) {
                    array_push(
                        $noticias,
                        array(
                            'idnoticia' => $fila[0],
                            'titulo' => $fila[1],
                            'descripcion' => $fila[2]
                        )
                    );
                }
                $resultado->close();
            }
            return $noticias;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        } finally {
            $con->cerrarConexion();
        }
    }


    static public function updateNoticia($id, $titulo, $texto)
    {
        try {
            $con = new Conexion();
            $stmt = $con->getConexion()->prepare("CALL sp_updateNoticia(?,?,?);");
            $stmt->bind_param("iss", $id, $titulo, $texto);
            $stmt->execute();


            $response = [
                'status' => 'success',
                'msg' => 'noticia actualizada'
            ];
        } catch (PDOException $e) {

            echo $e->getMessage();
            $response = [
                'status' => 'error',
                'errors' => $e->getMessage()
            ];
        } finally {
            $con->cerrarConexion();
        }

        exit(json_encode($response));
    }
    static public function insertNoticia($titulo, $texto)
    {
        try {
            $con = new Conexion();
            $stmt = $con->getConexion()->prepare("CALL sp_insertNoticia(?,?);");
            $stmt->bind_param("ss", $titulo, $texto);
            $stmt->execute();
            $response = [
                'status' => 'success',
                'msg' => 'noticia insertada exitosamente'
            ];
        } catch (PDOException $e) {
            echo $e->getMessage();   
            $response = [
                'status' => 'error',
                'errors' => $e->getMessage()
            ];
        } finally {
            $con->cerrarConexion();
        }

        exit(json_encode($response));
    }



    static public function deleteNoticia($id)
    {
        try {
            $con = new Conexion();

            $stmt = $con->getConexion()->prepare("CALL sp_deleteNoticiaID(?);");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            
            $response = [
                'status' => 'success',
                'msg' => 'noticia eliminada exitosamente'
            ];
        } catch (PDOException $e) {
            echo $e->getMessage();   
            $response = [
                'status' => 'error',
                'errors' => $e->getMessage()
            ];
        } finally { 
            $con->cerrarConexion();
       }

        return (json_encode($response));
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
