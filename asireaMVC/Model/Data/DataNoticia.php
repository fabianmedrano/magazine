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

            $stmt->bind_result($id, $titulo, $descripcion, $fecha ,$autor);
            $stmt->fetch();
            return array('id' => $id, 'titulo' => $titulo, 'descripcion' => $descripcion, 'fecha' => $fecha,'autor' => $autor);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        } finally {
            $con->cerrarConexion();
        }
    }
    static public function getNoticiasCantidad()
    {
        try {
            $con = new Conexion();
            $stmt = $con->getConexion()->prepare("CALL sp_getcantidadNoticia();");
            $stmt->execute();
            $stmt->bind_result($cantidad);
            $stmt->fetch();
            return $cantidad;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        } finally {
            $con->cerrarConexion();
        }
    }
    static public function getNoticiasPaginado($pagina, $cantidad)
    {
        try {
            $noticias = array();;
            $con = new Conexion();
            $resultado = $con->getConexion()->prepare("CALL sp_getNoticiaspaginado(?, ? );");
            $resultado->bind_param("ii", $pagina,$cantidad);// revisar como hace esto
            $resultado->execute();
        $resultado->store_result();
    $resultado->bind_result($idnoticia, $titulo,$descripcion,$fecha,$autor);
           
            while ($resultado->fetch()) {
                array_push(
                    $noticias,
                    array(
                        "idnoticia" => $idnoticia,
                        "titulo" => $titulo,
                        "descripcion" => $descripcion,
                        "fecha" => $fecha,
                        "autor"=> $autor
                    )
                );
            }
        
            /* cerrar la sentencia */
            $resultado->close();
             
            return $noticias;
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
                            'descripcion' => $fila[2],
                            'fecha' => $fila[3],
                            'autor' => $fila[4]
                        
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


    static public function updateNoticia($id, $titulo, $texto,$autor)
    {
        try {
            $con = new Conexion();
            $stmt = $con->getConexion()->prepare("CALL sp_updateNoticia(?,?,?,?);");
            $stmt->bind_param("isss", $id, $titulo, $texto,$autor);
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
    static public function insertNoticia($titulo, $texto, $autor)
    {
        try {
            $con = new Conexion();
            $stmt = $con->getConexion()->prepare("CALL sp_insertNoticia(?,?,?);");
            $stmt->bind_param("sss", $titulo, $texto,$autor);
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
            $response = [
                'status' => 'error',
                'errors' => $e->getMessage()
            ];
        } finally { 
            $con->cerrarConexion();
       }

        return $response;
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
