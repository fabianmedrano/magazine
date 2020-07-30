<?php

include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");
require_once(CONTROLLER_PATH . "/productos/ProductosController.php");


if (isset($_POST["accion"])) {

    $controller = new ProductosController();

    switch ($_POST["accion"]) {

        case 'get':
            echo $controller->listaProductos();
            break;
        case 'insert':

            $fileName = $_FILES['file']['name'];
            $fileTemp = $_FILES["file"]["tmp_name"];
            $ext = pathinfo($fileName, PATHINFO_EXTENSION);

            $result = "";

            if($ext == 'png' || $ext == 'jpg' || $ext == 'jpge'){
                if(move_uploaded_file($fileTemp, "../../public/img/productos/".$fileName)){
                    $result = $controller->insertarProducto();
                }else{
                    $msm = [
                        'status' => -1,
                        'mensaje' => "No se pudo subir los datos al servidor."
                    ];

                    $result = json_encode($msm);
                }
            }else{
                $msm = [
                    'status' => -1,
                    'mensaje' => 'El archivo no tiene el formato adecuado!!'
                ];
                $result =  json_encode($msm);
            }



            echo $result;
            break;
        default:
            break;
    }
}
