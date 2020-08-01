<?php
include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");
require_once CONEXION_PATH;


class DataServicios {

   
    public function obtener_servicio(){

        $conexion = null;

        try{
            $conexion = new Conexion();
            
            $stmt = $conexion->getConexion()->prepare("call sp_leerServicios();");

            $stmt->execute();
            $stmt->bind_result($id, $imagen, $nombre, $descripcion);

            $array = array();

          

            while($stmt->fetch()){
                $servicio =(object)[
                    "id" => $id,
                    "nombre" => ($nombre),
                    "descripcion" => ($descripcion)

                ];
                array_push($array, $servicio);

            }

            return json_encode($array);


        }catch (PDOException $e){
            echo $e->getMessage();
            return $e->getMessage();

        } finally {
            $conexion->cerrarConexion();
        }
    }

    public function registrar_servicio($imagen, $nombre, $descripcion){

        $conexion = null;

        try{
            $conexion = new Conexion();
            

            $stmt = $con->getConexion()->prepare("call sp_insertarServicios(?,?,?);");
            $stmt->bind_param('sss', $imagen,$nombre, $descripcion);
            $stmt->execute();

            if($stmt->affected_rows > 0){
                $msm = [
                    'status' => 1,
                    'mensaje' => "El Servicio".$nombre."Fue agregado correctamente"
                ];
                return $msm;
            }else{
                unlink('../../public/documentos/'.$archivo);
                $msm = [
                    'status' => 0,
                    'mensaje' => "El Servicio ".$nombre." no fue agregado"

                ];
                return $msm;
            }


        }catch (PDOException $e) {
            echo $e->getMessage();
            unlink('../../public/documentos/'.$archivo);
            $msm = [
                'status' => -1,
                'mensaje' => $e->getMessage()
            ];
            return $msm;

        } finally {
            $conexion->cerrarConexion();
        }
    }

    public function eliminar_servicio($id){

        $conexion = null;

        try{
            $conexion = new Conexion();

            $stmt = $con->getConexion()->prepare("call sp_eliminarServicios(?);");
            $stmt->bind_param('i', $id);
            $stmt->execute();

            if($stmt->affected_rows > 0){
                $msm = [
                    'status' => 1,
                    'mensaje' => "El Servicio fue eliminado correctamente"
                ];
                return $msm;
            }else{
                $msm = [
                    'status' => 0,
                    'mensaje' => "El Servicio no fue eliminado"
                ];
                return $msm;
            }


        }catch (PDOException $e) {
            echo $e->getMessage();
            $msm = [
                'status' => -1,
                'mensaje' => $e->getMessage()
            ];
            return $msm;

        } finally {
            $conexion->cerrarConexion();
        }
    }

    public function editar_servicio($id, $imagen, $nombre, $descripcion){

        $conexion = null;

        try {
            $conexion = new Conexion();
            $stmt = $con->getConexion()->prepare("call sp_editarServicios(?,?,?,?);");
            $stmt->bind_param('isss', $id, $imagen ,$nombre, $descripcion);
            $stmt->execute();

            if($stmt->affected_rows > 0){
                $msm = [
                    'status' => 1,
                    'mensaje' => "El Servicio ".$nombre." fue actualizado correctamente"
                ];
                return $msm;
            }else{
                unlink('../../public/documentos/'.$archivo);
                $msm = [
                    'status' => 0,
                    'mensaje' => "El Servicio ".$nombre." no fue actualizado"
                ];
                return $msm;
            }
        }catch (PDOException $e) {
            echo $e->getMessage();
            unlink('../../public/documentos/'.$archivo);
            $msm = [
                'status' => -1,
                'mensaje' => $e->getMessage()
            ];
            return $msm;
        } finally {
            $conexion->cerrarConexion();
        }
    }




    static public function getServiciosCantidad()
    {
        try {
            $con = new Conexion();
            $stmt = $con->getConexion()->prepare("CALL sp_getCantidadServicio();");
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
    static public function getServiciosPaginado($pagina, $cantidad)
    {
        try {
            $Servicios = array();;
            $con = new Conexion();
            $resultado = $con->getConexion()->prepare("CALL sp_getServiciosPaginado(?, ? );");
            $resultado->bind_param("ii", $pagina,$cantidad);// revisar como hace esto
            $resultado->execute();
        $resultado->store_result();
    $resultado->bind_result($id, $imagen, $nombre,$descripcion);
           
            while ($resultado->fetch()) {
                array_push(
                    $Servicios,
                    array(
                        "id" => $id,
                        "imagen" => $imagen,
                        "nombre" => $nombre,
                        "descripcion" => $descripcion
                        
                    )
                );
            }
        
            /* cerrar la sentencia */
            $resultado->close();
             
            return $Servicios;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        } finally {
            $con->cerrarConexion();
        }
    }


    static public function getServicioID($id)
    {
        try {
            $con = new Conexion();
            $stmt = $con->getConexion()->prepare("CALL sp_getServicioID(?);");
            $stmt->bind_param("i", $id);
            $stmt->execute();

            $stmt->bind_result($id, $imagen, $nombre, $descripcion);
            $stmt->fetch();
            return array('id' => $id, 'imagen' => $imagen, 'nombre' => $nombre, 'descripcion' => $descripcion);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        } finally {
            $con->cerrarConexion();
        }
    }




}



