<?php


include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");
require_once DATA_PATH . "/DataProductos.php";
class ProductosController
{

    function __construct()
    {
  
    }


    public function uptateproductos($id,$titulo,$texto)
    {
            $respuesta = DataProductos::updateproductos($id,$titulo,$texto);
            return $respuesta; 
    }

    public function getproductosID($id)
    {
        $respuesta = DataProductos::getproductosID($id);
        return $respuesta;
    }
    


    public function getproductoss()
    {
        $respuesta = DataProductos::getproductoss();
        return $respuesta;
    }

    public function insertproductos($titulo,$texto)
    {
        $respuesta = DataProductos::insertproductos($titulo,$texto);
        return $respuesta; 
    }

    public function deleteproductos($id)
    {
        $respuesta = DataProductos::deleteproductos($id);
        self:: deleteDirectory($id);
        exit ($respuesta); 
    }






// eliminar carpetas e imagenes de las productoss
    function deleteDirectory($idproductos) {
       $dir = '../../public/img/productoss/productoss/'.($idproductos);
        if(!$dh = @opendir($dir)) return;
        while (false !== ($current = readdir($dh))) {
            if($current != '.' && $current != '..') {
                echo 'Se ha borrado el archivo '.$dir.'/'.$current.'<br/>';
                if (!@unlink($dir.'/'.$current)) 
                   self:: deleteDirectory($dir.'/'.$current);
            }       
        }
        closedir($dh);
        echo 'Se ha borrado el directorio '.$dir.'<br/>';
        @rmdir($dir);
    }
    
// Creacion de carpetas para las imagenes
    public function createFile()
    {
        $respuesta = DataProductos::getLastIdproductos();
       $carpeta = '../../public/img/productoss/productoss/'.((int)$respuesta);
     echo $respuesta;
     if($respuesta == NULL) $respuesta = 0;
   //  $carpeta = $_SERVER["DOCUMENT_ROOT"].'/img_productoss/'.((int)$respuesta+1);   
        echo $carpeta.'\n';
        if (!file_exists($carpeta)) {
            mkdir($carpeta, 0777, true);
            echo('no esxiste carpeta ');
        }else{
            echo('carpeta existe');
        }
        return $respuesta;
    }

}
