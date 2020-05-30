<?php
include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");
require_once CONEXION_PATH;


class DataServicios {

    function _construct()
    {
    }
    static public function getServicioID($id)
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


    static public function getServicios()
    {
        try {
            $servicios = array();;
            $con = new Conexion();
            $resultado = $con->getConexion()->query("CALL sp_leerServicios();");
            if ($resultado) {
                while ($fila = $resultado->fetch_row()) {
                    array_push(
                        $servicios,
                        array(
                            "id" => $fila[0],
                            "imagen" => $fila[1],
                            "nombre" => $fila[2],
                            "descripcion" => $fila[3]
                        )
                    );
                }
                $resultado->close();
            }
            return $servicios;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        } finally {
            $con->cerrarConexion();
        }
    }


    
    
static public function insertServicios($imagen, $nombre, $descripcion){
        try{
            $con = new Conexion();
            $stmt = $con->getConexion()->prepare("CALL sp_insertarServicios(?,?,?);");
            $stmt->bind_param("sss",$imagen, $nombre, $descripcion);
            $stmt->execute();
            
            $response = [
                'status' => 'success',
                'msg' => 'noticia insertada exitosamente'
            ];

        } catch (PDOException $e) {
            //echo $e->getMessage();   
           $response = [
                'status' => 'error',
                'errors' => $e->getMessage()
            ];
        } finally {
            $con->cerrarConexion();
        }
        exit(json_encode($response));
    }



    static public function eliminar_servicio($id)
    {
        try {
            $con = new Conexion();
            $stmt = $con->getConexion()->prepare("CALL sp_eliminarServicios(?);");
            $stmt->bind_param("i", $id); // revisar si es entero
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

    static public function updateServicios($id, $imagen, $nombre, $descripcion)
    {
        try {
            $con = new Conexion();
            $stmt = $con->getConexion()->prepare("CALL  sp_editarServicios(?,?,?,?);");
            $stmt->bind_param("isss",$id, $imagen, $nombre, $descripcion);
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




}


/*
$servicio = new BDServicios();

if(isset($_REQUEST["obtener_servicio"])){
    echo $prueba->obtener_servicio();
}

if(isset($_REQUEST["registrar_servicio"])){
    echo $prueba->registrar_servicio($_REQUEST["imagen"],$_REQUEST["nombre"], $_REQUEST["descripcion"]);
}


if(isset($_REQUEST["eliminar_servicio"])){
    echo $prueba->eliminar_servicio($_REQUEST["id"]);
}

if(isset($_REQUEST["editar_servicio"])){
    echo $prueba->editar_servicio($_REQUEST["id"], $_REQUEST["imagen"],$_REQUEST["nombre"], $_REQUEST["descripcion"]);
}
*/