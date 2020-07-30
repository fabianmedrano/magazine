<?php


include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");
require_once CONEXION_PATH;
class DataCategoria {

    static public function obtener_categoria(){

        $conexion = null;

        try{
            $conexion = new Conexion();
            //crear conexion para obtener lista

            $stmt = $conexion->getConexion()->prepare("call sp_leerCategoriaProductos()");
            $stmt->execute();
            $stmt->bind_result($id,  $nombre);

            $lista = array();

            while($stmt->fetch()){
                $categoria =(object)[
                    "id" => $id,
                    "nombre" => ($nombre)

                ];
                array_push($lista, $categoria);

            }

            return json_encode($lista);


        }catch (Exception $e){
            return $e;

        } finally {
            $conexion->cerrarConexion();
        }
    }

    static public function registrar_categoria($nombre){

        $conexion = null;

        try{
            $conexion = new Conexion();
            $stmt = $conexion->getConexion()->prepare("call sp_registrarCategoriaProductos(?)");
            $stmt->bind_param("s",$nombre);

            $stmt->execute();

            if($stmt->affected_rows > 0){
                return 1;
            }else{
                return 0;
            }


        }catch (Exception $e){
            return $e;

        } finally {
            $conexion->cerrarConexion();
        }
    }

    static public function eliminar_categoria($id){

        $conexion = null;

        try{
            $conexion = new Conexion();

            $stmt = $conexion->getConexion()->prepare("call sp_eliminarCategoriaProductos(?)");
            $stmt->bind_param("i",$id);

            $stmt->execute();

            if($stmt->affected_rows > 0){
                return 1;
            }else{
                return 0;
            }


        }catch (Exception $e){
            return $e;

        } finally {
            $conexion->cerrarConexion();
        }
    }

    static public function editar_categoria($id, $nombre){
        $conexion = null;

        try{
            $conexion = new Conexion();
            $stmt = $conexion->getConexion()->prepare("call sp_editarCategoriaProductos(?,?)");
            $stmt->bind_param("ds", $id, $nombre);

            $stmt->execute();
            return 1;
        }catch (Exception $e){
            return $e;
        } finally {
            $conexion->cerrarConexion();
        }
    }
}








