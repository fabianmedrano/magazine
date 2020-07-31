<?php
include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");
require_once CONEXION_PATH;

class DataProductos   {

    static public function getProductos()
    {
        $con = null;
        try {
            $con = new Conexion();

            $stmt = $con->getConexion()->prepare("call sp_leerProductos();");

            $stmt->execute();
            $stmt->bind_result($id, $img, $nombre, $descripcion, $id_cate, $cate);

            $array = array();

            while($stmt->fetch()){
                $obj = (object)[
                    'id' => $id,
                    'nombre'=> $nombre,
                    'descripcion'=> $descripcion,
                    'img'=> $img,
                    'id_cate' => $id_cate,
                    'cate' => $cate
                ];

                array_push($array, $obj);
            }

            return $array;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return $e->getMessage();
        } finally {
            $con->cerrarConexion();
        }
    }

    static public function insertproductos($imagen, $nombre, $descripcion, $idCategoria){

        $con = null;
        try {
            $con = new Conexion();

            $stmt = $con->getConexion()->prepare("CALL  sp_insertarProductos(?,?,?,?);");
            $stmt->bind_param("sssi",$imagen, $nombre, $descripcion,$idCategoria);
            $stmt->execute();

            if($stmt->affected_rows > 0){
                $msm = [
                    'status' => 1,
                    'mensaje' => "El producto ".$nombre." fue agregado correctamente"
                ];
                return $msm;
            }else{
                unlink('../../public/img/productos/'.$imagen);
                $msm = [
                    'status' => 0,
                    'mensaje' => "El producto ".$nombre." no fue agregado"
                ];
                return $msm;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            unlink('../../public/img/productos/'.$imagen);
            $msm = [
                'status' => -1,
                'mensaje' => $e->getMessage()
            ];
            return $msm;
        } finally {
            $con->cerrarConexion();
        }

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


    static public function getProductosCantidad()
    {
        try {
            $con = new Conexion();
            $stmt = $con->getConexion()->prepare("CALL sp_getCantidadProducto();");
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
    static public function getProductosPaginado($pagina, $cantidad)
    {
        try {
            $Productos = array();;
            $con = new Conexion();
            $resultado = $con->getConexion()->prepare("CALL sp_getProductosPaginado(?, ? );");
            $resultado->bind_param("ii", $pagina,$cantidad);// revisar como hace esto
            $resultado->execute();
        $resultado->store_result();
    $resultado->bind_result($id, $imagen, $nombre,$descripcion, $id_categoria, $nombre_categoria);
           
            while ($resultado->fetch()) {
                array_push(
                    $Productos,
                    array(
                        "id" => $id,
                        "imagen" => $imagen,
                        "nombre" => $nombre,
                        "descripcion" => $descripcion,
                        "id_categoria" => $id_categoria,
                        "nombre_categoria" => $nombre_categoria
                        
                    )
                );
            }
        
            /* cerrar la sentencia */
            $resultado->close();
             
            return $Productos;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        } finally {
            $con->cerrarConexion();
        }
    }

    static public function getProductoID($id)
    {
        try {
            $con = new Conexion();
            $stmt = $con->getConexion()->prepare("CALL sp_getProductoID(?);");
            $stmt->bind_param("i", $id);
            $stmt->execute();

            $stmt->bind_result($id, $imagen, $nombre, $descripcion, $id_categoria, $nombre_categoria);
            $stmt->fetch();
            return array('id' => $id, 'imagen' => $imagen, 'nombre' => $nombre, 'descripcion' => $descripcion, 'id_categoria' => $id_categoria, 'nombre_categoria' => $nombre_categoria);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        } finally {
            $con->cerrarConexion();
        }
    }

 



}

