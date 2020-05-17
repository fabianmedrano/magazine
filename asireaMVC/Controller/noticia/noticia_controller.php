<?php


include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");
require_once DATA_PATH . "/DataNoticia.php";
class NoticiaController
{

    function __construct()
    {
  
    }


    public function uptateNoticia($id,$titulo,$texto)
    {
            $respuesta = DataNoticia::updateNoticia($id,$titulo,$texto);
            return $respuesta; 
    }

    public function getNoticiaID($id)
    {
        $respuesta = DataNoticia::getNoticiaID($id);
        return $respuesta;
    }
    


    public function getNoticias()
    {
        $respuesta = DataNoticia::getNoticias();
        return $respuesta;
    }

    public function insertNoticia($titulo,$texto)
    {
        $respuesta = DataNoticia::insertNoticia($titulo,$texto);
        return $respuesta; 
    }

    public function deleteNoticia($id)
    {
        $respuesta = DataNoticia::deleteNoticia($id);

        self:: deleteDirectory($id);
        return $respuesta; 
    }






    function deleteDirectory($idnoticia) {
        
       $dir = '../../public/img/noticias/noticias/'.($idnoticia);
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
    public function deleteFile($idnoticia)
    {
       $carpeta = '../../public/img/noticias/noticias/'.($idnoticia);
    
        if (!file_exists($carpeta)) {
            mkdir($carpeta, 0777, true);
            echo('no esxiste carpeta ');
        }else{
            echo('carpeta existe');
        }
    }

    function rmDir_rf($idnoticia)
    {
        var_dump("eliminando carpetas");
         echo( "<script> alert('eliminando carpeta') </script>");
        $carpeta = '../../public/img/noticias/noticias/'.($idnoticia);
      foreach(glob($carpeta . "/*") as $archivos_carpeta){             
        if (is_dir($archivos_carpeta)){
          self:: rmDir_rf($archivos_carpeta);
        } else {
        unlink($archivos_carpeta);
        }
      }
      rmdir($carpeta);
     }

/*
    public function rrmdir($dir) { 
        $maxID = '120';
        $dir_adjuntos = "/var/tmp/files/";
        $path = $dir_adjuntos ."131";
        $this->rrmdir($path);
        
        if (is_dir($dir) and ($dir < $maxID) {
            //chmod($dir , '0777'); 
            //$objects = scandir($dir); 
            foreach ($objects as $object) { 
                if ($object != "." && $object != "..") { 
                if (is_dir($dir."/".$object)) {
                    $this->rrmdir($dir."/".$object);
                }
                else {
                    chmod($object, '0777');
                    unlink($dir."/".$object); 
                }
            }
        }
        $this->rrmdir($dir); 
        } 
    }
*/


// Creacion de carpetas para las imagenes
    public function createFile()
    {
        $respuesta = DataNoticia::getLastIdNoticia();
       $carpeta = '../../public/img/noticias/noticias/'.((int)$respuesta);
     echo $respuesta;
     if($respuesta == NULL) $respuesta = 0;
   //  $carpeta = $_SERVER["DOCUMENT_ROOT"].'/img_noticias/'.((int)$respuesta+1);   
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
