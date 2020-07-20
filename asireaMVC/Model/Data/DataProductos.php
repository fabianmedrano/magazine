<?php
include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");
require_once CONEXION_PATH;

class DataProductos   {



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

static public function insertproductos($imagen, $nombre, $descripcion, $idCategoria){
    try{
        $con = new Conexion();
        $stmt = $con->getConexion()->prepare("CALL  sp_insertarProductos(?,?,?,?);");
        $stmt->bind_param("sssi",$imagen, $nombre, $descripcion,$idCategoria);
        $stmt->execute();
        
        $response = [
            'status' => 'success',
            'msg' => 'producto insertado exitosamente'
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

 

    static public function deleteProductos($id)
    {
        try {
            $con = new Conexion();
            $stmt = $con->getConexion()->prepare("call sp_eliminarProductos(?);");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $response = [
                'status' => 'success',
                'msg' => 'producto eliminado exitosamente'
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
    static public function getProductosID($id)
    {
        try {
            $con = new Conexion();
            $stmt = $con->getConexion()->prepare("CALL sp_getProductosID(?);");
            $stmt->bind_param("i", $id);
            $stmt->execute();

            $stmt->bind_result($id,$categoria, $nombre, $descripcion,$imagen);
            $stmt->fetch();
            return array('id' => $id, 'categoria' => $categoria, 'nombre' => $nombre, 'descripcion' => $descripcion, 'imagen' => $imagen);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        } finally {
            $con->cerrarConexion();
        }
    }



    static public function updateProductos($id,$categoria, $nombre, $descripcion,$imagen)
    {
        try {
            $con = new Conexion();
            $stmt = $con->getConexion()->prepare("call sp_editarProductos(?,?,?,?,?);");
            $stmt->bind_param("iisss",$id,$categoria, $nombre, $descripcion,$imagen);
            $stmt->execute();

            $response = [
                'status' => 'success',
                'msg' => 'producto actualizado'
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
*/