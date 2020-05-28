<?php

require_once("conexion.php");
class DataProductos extends conexion {



    static public function getProductos()
    {
        try {
            $productos = array();;
            $con = new Conexion();
            $resultado = $con->getConexion()->query("CALL sp_leerProudctos();");
            if ($resultado) {
                while ($fila = $resultado->fetch_row()) {
                    array_push(
                        $productos,
                        array(
                            "id" => $fila[0],
                            "imagen" => $fila[1],
                            "nombre" => $fila[2],
                            "descripcion" => $fila[3],
                            "id_categoria" => $fila[4]
                        )
                    );
                }
                $resultado->close();
            }
            return $productos;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        } finally {
            $con->cerrarConexion();
        }
    }

/*
    public function obtener_producto(){

         try{
            $noticias = array();;
            $con = new Conexion();
            $resultado = $con->getConexion()->query("CALL sp_getNoticias();");
             //crear conexion para obtener lista

             $conexion->prepare("call sp_leerProudctos()");

             $conexion->execute();

             $conexion->bind_result($id, $imagen, $nombre, $descripcion,$idCategoria);

             $lista = array();

             while($conexion->fetch()){
                 $producto =(object)[
                     "id" => $id,
                     "imagen" => ($imagen),
                     "nombre" => ($nombre),
                     "descripcion" => ($descripcion),
                     "id_categoria" => $idCategoria
                 ];
                 array_push($lista, $producto);

             }

             return json_encode($lista);


         }catch (Exception $e){
             return $e;

         } finally {
             mysqli_close($this->get_Conexion());
         }
    }
*/
    public function registrar_producto($imagen, $nombre, $descripcion, $idCategoria){

        try{
            $conexion = $this->get_Conexion()->stmt_init();
            

            $conexion->prepare("call sp_insertarProductos(?,?,?,?)");
            $conexion->bind_param("sssd",$imagen, $nombre, $descripcion,$idCategoria);

            $conexion->execute();

            if($conexion->affected_rows > 0){
                return 1;
            }else{
                return 0;
            }


        }catch (Exception $e){
            return $e;

        } finally {
            mysqli_close($this->get_Conexion());
        }
    }


    public function eliminar_producto($id){

        try{
            $conexion = $this->get_Conexion()->stmt_init();
           

            $conexion->prepare("call sp_eliminarProductos(?)");
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
            mysqli_close($this->get_Conexion());
        }
    }

    public function editar_producto($id, $imagen, $nombre, $descripcion, $idCategoria){
        try {
            $conexion = $this->get_Conexion()->stmt_init();
            $conexion->prepare("call sp_editarProductos(?,?,?,?,?)");
            $conexion->bind_param("dsssd",$id, $imagen, $nombre, $descripcion, $idCategoria);

            $conexion->execute();
            if($conexion->affected_rows > 0){
                return 1;
            }else{
                return 0;
            }
        }catch (Exception $e){
            return $e;
        } finally {
            mysqli_close($this->get_Conexion());
        }
    }




}



$producto = new BDProductos();

if(isset($_REQUEST["obtener_producto"])){
    echo $prueba->obtener_producto();
}

if(isset($_REQUEST["registrar_producto"])){
    echo $prueba->registrar_producto($_REQUEST["imagen"],$_REQUEST["nombre"], $_REQUEST["descripcion"],$_REQUEST["id_categoria"]);
}


if(isset($_REQUEST["eliminar_producto"])){
    echo $prueba->eliminar_producto($_REQUEST["id"]);
}

if(isset($_REQUEST["editar_producto"])){
    echo $prueba->editar_producto($_REQUEST["id"], $_REQUEST["imagen"],$_REQUEST["nombre"], $_REQUEST["descripcion"],$_REQUEST["id_categoria"]);
}
