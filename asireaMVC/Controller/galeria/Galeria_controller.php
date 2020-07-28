<?php

include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");
require_once DATA_PATH . "/DataGaleria.php";

class Galeria_controller
{

    public function getCategorias()
    {
        return json_encode(DataGaleria::getCategoria());
    }

    public function insertCategoria($nombre){
        return json_encode(DataGaleria::insertCategoria($nombre));
    }

    public function updateCategoria($id, $nombre){
        return json_encode(DataGaleria::updateCategoria($id, $nombre));
    }

    public function deleteCategoria($id){
        return json_encode(DataGaleria::deleteCategoria($id));
    }

    public function nameFotos($id){
        $directory = "../../public/img/galeria/".$id;
        //Carga todas las que se encuentra
        $images = glob($directory . "/*.*");

        $initialPreview = array();
        $initConfig = array();

        foreach($images as $image){
            array_push($initialPreview, "<img src='".$image."' height='100%' width='100%' class='file-preview-image'>");

            $datos = explode( "/", $image);
            $size = count($datos);
            $nombre = $datos[$size-1];

            array_push(
                $initConfig,
                array("caption"=>$nombre, "url"=>"../../Controller/galeria/borrar_Img.php?carpeta=".$id, "key"=>$nombre)
            );
        }

        $fotos = (object)[
            'initialPreview' => $initialPreview,
            'initConfig' => $initConfig
        ];
        return json_encode($fotos);
    }

    public function getGaleria(){
        $categorias = DataGaleria::getCategoria();

        $galeria = array();

        foreach($categorias as $cate){
            $obj = (object)[
                "id_Cate" => $cate->id,
                "nombre_Cate" => $cate->nombre,
                "fotos_Cate" => $this->getFotos($cate->id)
            ];
            array_push($galeria, $obj);
        }
        return json_encode($galeria);
    }

    private function getFotos($id){
        $directory = "../../public/img/galeria/".$id;
        $images = glob($directory . "/*.*");

        $array = array();

        foreach($images as $image){

            $datos = explode( "/", $image);
            $size = count($datos);
            $nombre = $datos[$size-1];

            array_push($array, $nombre);
        }
        return $array;
    }
}
