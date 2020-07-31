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

    static public function getProducto($id)
    {
        $con = null;
        try {
            $con = new Conexion();

            $stmt = $con->getConexion()->prepare("call sp_getProducto(?);");
            $stmt->bind_param("i",$id);
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

 

    static public function deleteProductos($id, $archivo)
    {
        $con = null;
        try {
            $con = new Conexion();

            $stmt = $con->getConexion()->prepare("CALL sp_eliminarProducto(?);");
            $stmt->bind_param("i",$id);
            $stmt->execute();

            if($stmt->affected_rows > 0){
                unlink('../../public/img/productos/'.$archivo);
                $msm = [
                    'status' => 1,
                    'mensaje' => "El producto  fue eliminado correctamente"
                ];
                return $msm;
            }else{
                $msm = [
                    'status' => 0,
                    'mensaje' => "El producto no fue eliminado"
                ];
                return $msm;
            }

        } catch (PDOException $e) {
            echo $e->getMessage();
            $msm = [
                'status' => -1,
                'mensaje' => $e->getMessage()
            ];
            return $msm;
        } finally {
            $con->cerrarConexion();
        }
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
            $stmt->bind_param("isssi",$id,$imagen, $nombre, $descripcion, $categoria);
            $stmt->execute();

            if($stmt->affected_rows > 0){
                $msm = [
                    'status' => 1,
                    'mensaje' => "El producto ".$nombre." fue editdo correctamente"
                ];
                return $msm;
            }else{
                unlink('../../public/img/productos/'.$imagen);
                $msm = [
                    'status' => 0,
                    'mensaje' => "El producto ".$nombre." no fue editdo"
                ];
                return $msm;
            }
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
