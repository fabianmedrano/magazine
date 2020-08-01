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
    }


    static public function updateContacto($id, $contacto)
    {
        try {
            $con = new Conexion();
            $stmt = $con->getConexion()->prepare("CALL sp_updateContacto(?,?);");
            $stmt->bind_param("is", $id,$contacto);
            $stmt->execute();


            $response = [
                'status' => 'success',
                'msg' => 'Contacto actualizado.'
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


    static public function insertContacto($tipo, $contacto)
    {
        try {
            $con = new Conexion();
            $stmt = $con->getConexion()->prepare("CALL sp_insertContacto(?,?);");
            $stmt->bind_param("is", $tipo, $contacto);
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

    static public function getTelefonos()
    {
        try {
            $noticias = array();;
            $con = new Conexion();
            $resultado = $con->getConexion()->query("CALL sp_getTelefonos();");
            if ($resultado) {
                while ($fila = $resultado->fetch_row()) {
                    array_push(
                        $noticias,
                        array(

                            'tipo_contacto' => $fila[0],
                            'contacto' => $fila[1],
                            'idcontacto' => $fila[2],

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

    static public function getRedes()
    {
        try {
            $noticias = array();;
            $con = new Conexion();
            $resultado = $con->getConexion()->query("CALL sp_getRedes();");
            if ($resultado) {
                while ($fila = $resultado->fetch_row()) {
                    array_push(
                        $noticias,
                        array(

                            'tipo_contacto' => $fila[0],
                            'contacto' => $fila[1],
                            'idcontacto' => $fila[2],
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

    static public function getCorreos()
    {
        try {
            $noticias = array();;
            $con = new Conexion();
            $resultado = $con->getConexion()->query("CALL sp_getCorres();");
            if ($resultado) {
                while ($fila = $resultado->fetch_row()) {
                    array_push(
                        $noticias,
                        array(

                            'tipo_contacto' => $fila[0],
                            'contacto' => $fila[1],
                            'idcontacto' => $fila[2],
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

    static public function escribirDirreccion($direccion){
        $file = fopen(DATA_PATH."/direccion.txt", "w");
        echo( $file);
        fwrite($file, $direccion . PHP_EOL);
        fclose($file);
    }
    
    static public function deleteContactoID($id)
    {
        try {
            $con = new Conexion();

            $stmt = $con->getConexion()->prepare("CALL sp_deleteContactoID(?);");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            
            $response = [
                'status' => 'success',
                'msg' => 'Contacto eliminado.'
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
}
