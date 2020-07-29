<?php


include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");
require_once CONEXION_PATH;
class DataCategoria {


  

    public function obtener_categoria(){

        $conexion = null;

        try{
            $conexion = new Conexion();
            //crear conexion para obtener lista

            $conexion->prepare("call leer_categoria()");

            $conexion->execute();

            $conexion->bind_result($id,  $nombre);

            $lista = array();

            while($conexion->fetch()){
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

    public function registrar_categoria($nombre){

        $conexion = null;

        try{
            $conexion = new Conexion();
            $conexion->prepare("call insertar_Categoria(?)");
            $conexion->bind_param("s",$nombre);

            $conexion->execute();

            if($conexion->affected_rows > 0){
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

    public function eliminar_producto($id){

        $conexion = null;

        try{
            $conexion = new Conexion();
            //crear conexion para obtener lista

            $conexion->prepare("call eliminar_productos(?)");
            $conexion->bind_param("d",$id);

            $conexion->execute();

            if($conexion->affected_rows > 0){
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

    public function editar_categoria($id, $nombre){
        $conexion = null;

        try{
            $conexion = new Conexion();
            $conexion->prepare("call editar_categorias(?,?)");
            $conexion->bind_param("ds", $id, $nombre);

            $conexion->execute();
            if($conexion->affected_rows > 0){
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




}








