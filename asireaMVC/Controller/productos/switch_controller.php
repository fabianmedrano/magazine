<?php

include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");
require_once(CONTROLLER_PATH . "/productos/ProductosController.php");

session_start();


if (isset($_POST["accion"])) {

    $controller = new ProductosController();

    switch ($_POST["accion"]) {

        case 'get':
            echo $controller->listaProductos();
            break;

        case 'Guardar':

            $fileName = $_FILES['file']['name'];
            $fileTemp = $_FILES["file"]["tmp_name"];
            $ext = pathinfo($fileName, PATHINFO_EXTENSION);

            $result = "";

            if($ext == 'png' || $ext == 'jpg' || $ext == 'jpge'){
                if(move_uploaded_file($fileTemp, "../../public/img/productos/".$fileName)){
                    $result = $controller->insertarProducto($_REQUEST['nombrePro'], $_REQUEST['catePro'], $_REQUEST['descripPro'], $fileName);
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

            if(json_decode($result)->status == 1){
                $_SESSION['msmPro'] = null;
                header("Location: ../../View/Productos/productos_list_view_admin.php");
            }else{
                $_SESSION['msmPro'] = json_decode($result);
                header("Location: ../../View/Productos/producto_create_admin.php");
            }
            break;

        case 'Editar':

            $fileName = $_FILES['file']['name'];

            if($fileName == ""){
                $result = $controller->editarProducto($_REQUEST['id'], $_REQUEST['nombrePro'], $_REQUEST['catePro'],
                    $_REQUEST['descripPro'], $_REQUEST['imgAnt']);
            }else{
                unlink('../../public/img/productos/'.$_REQUEST['imgAnt']);
                $fileTemp = $_FILES["file"]["tmp_name"];
                $ext = pathinfo($fileName, PATHINFO_EXTENSION);

                $result = "";

                if($ext == 'png' || $ext == 'jpg' || $ext == 'jpge'){
                    if(move_uploaded_file($fileTemp, "../../public/img/productos/".$fileName)){
                        $result = $controller->editarProducto($_REQUEST['id'], $_REQUEST['nombrePro'], $_REQUEST['catePro'],
                            $_REQUEST['descripPro'], $fileName);
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

                if(json_decode($result)->status == 1){
                    $_SESSION['msmPro'] = null;
                    header("Location: ../../View/Productos/productos_list_view_admin.php");
                }else{
                    $_SESSION['msmPro'] = json_decode($result);
                    header("Location: ../../View/Productos/producto_create_admin.php");
                }
            }
            break;
        case 'delete':
            echo $controller->deleteProducto($_REQUEST['id'], $_REQUEST['archivo']);
            break;
        default:
            break;
    }
}
