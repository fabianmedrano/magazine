<?php
include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");
require_once CONEXION_PATH;

class DataProyecto
{

    function _construct()
    {
    }


    static public function getProyectoID($id)
    {
        try {
            $con = new Conexion();
            $stmt = $con->getConexion()->prepare("CALL sp_getProyectoID(?);");
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
    static public function getProyectosCantidad()
    {
        try {
            $con = new Conexion();
            $stmt = $con->getConexion()->prepare("CALL sp_getCantidadProyecto();");
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
    static public function getProyectosPaginado($pagina, $cantidad)
    {
        try {
            $Proyectos = array();;
            $con = new Conexion();
            $resultado = $con->getConexion()->prepare("CALL sp_getProyectosPaginado(?, ? );");
            $resultado->bind_param("ii", $pagina,$cantidad);// revisar como hace esto
            $resultado->execute();
        $resultado->store_result();
    $resultado->bind_result($idProyecto, $titulo,$descripcion,$fecha);
           
            while ($resultado->fetch()) {
                array_push(
                    $Proyectos,
                    array(
                        "idProyecto" => $idProyecto,
                        "titulo" => $titulo,
                        "descripcion" => $descripcion,
                        "fecha" => $fecha
                    )
                );
            }
        
            /* cerrar la sentencia */
            $resultado->close();
             
            return $Proyectos;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        } finally {
            $con->cerrarConexion();
        }
    }

    static public function getProyectos()
    {
        try {
            $Proyectos = array();;
            $con = new Conexion();
            $resultado = $con->getConexion()->query("CALL sp_getProyectos();");
            if ($resultado) {
                while ($fila = $resultado->fetch_row()) {
                    array_push(
                        $Proyectos,
                        array(
                            'idProyecto' => $fila[0],
                            'titulo' => $fila[1],
                            'descripcion' => $fila[2],
                            'fecha' => $fila[3],
                        )
                    );
                }
                $resultado->close();
            }
            return $Proyectos;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        } finally {
            $con->cerrarConexion();
        }
    }


    static public function updateProyecto($id, $titulo, $texto)
    {
        try {
            $con = new Conexion();
            $stmt = $con->getConexion()->prepare("CALL sp_updateProyecto(?,?,?);");
            $stmt->bind_param("iss", $id, $titulo, $texto);
            $stmt->execute();


            $response = [
                'status' => 'success',
                'msg' => 'Proyecto actualizada'
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
    static public function insertProyecto($titulo, $texto)
    {
        try {
            $con = new Conexion();
            $stmt = $con->getConexion()->prepare("CALL sp_insertProyecto(?,?);");
            $stmt->bind_param("ss", $titulo, $texto);
            $stmt->execute();
            $response = [
                'status' => 'success',
                'msg' => 'Proyecto insertada exitosamente'
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



    static public function deleteProyecto($id)
    {
        try {
            $con = new Conexion();

            $stmt = $con->getConexion()->prepare("CALL sp_deleteProyectoID(?);");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            
            $response = [
                'status' => 'success',
                'msg' => 'Proyecto eliminada exitosamente'
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

    static public function getLastIdProyecto()
    {
        try {
            $con = new Conexion();
            $stmt = $con->getConexion()->prepare("CALL sp_getLastIdProyecto();");
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
