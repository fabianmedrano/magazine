<?php

include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");
require_once(CONTROLLER_PATH . "/biblioteca/Biblioteca_controller.php");

if (isset($_REQUEST["accion"])) {

    $controller = new Biblioteca_controller();


    switch ($_REQUEST["accion"]) {

        case 'get':
            echo $controller->getDocumentos();
            break;
        case 'one':
            echo $controller->getDocumento($_REQUEST['id']);
            break;
        case 'insert':
            $filename = $_FILES['file']['name'];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if($ext == 'pdf'){
                if (move_uploaded_file($_FILES["file"]["tmp_name"], "../../public/documentos/".$_FILES['file']['name'])) {
                    //more code here...
                    echo $controller->insertDocumento($_REQUEST['nombreDoc'],$_REQUEST['autorDoc'],$_REQUEST['descrip'], $_FILES['file']['name']);
                } else {
                    $msm = [
                        'status' => -1,
                        'mensaje' => 'No se pudo completar el proceso'
                    ];
                    echo json_encode($msm);
                }
            }else{
                $msm = [
                    'status' => -1,
                    'mensaje' => 'El archivo no tiene el formato adecuado!!'
                ];
                echo json_encode($msm);
            }

            break;
        case 'update':
            if($_REQUEST['update'] == 1 ){

                unlink('../../public/documentos/'.$_REQUEST['archivoAnt']);

                if(move_uploaded_file($_FILES["file"]["tmp_name"], "../../public/documentos/".$_FILES['file']['name'])){
                    echo $controller->updateDocumento($_REQUEST['nombreDoc'],$_REQUEST['autorDoc'],$_REQUEST['descrip'],
                        $_FILES['file']['name'], $_REQUEST['id']);
                }else{
                    $msm = [
                        'status' => -1,
                        'mensaje' => 'No se pudo completar el proceso'
                    ];
                    echo json_encode($msm);
                }
            }else{
                echo $controller->updateDocumento($_REQUEST['nombreDoc'],$_REQUEST['autorDoc'],$_REQUEST['descrip'],
                    $_REQUEST['archivoAnt'], $_REQUEST['id']);
            }

            break;
        case 'delete':
            unlink('../../public/documentos/'.$_REQUEST['archivo']);

            echo $controller->deleteDocumento($_REQUEST['id']);

            break;
        default:
            $msm = [
                'status' => -1,
                'mensaje' => 'Error de parametros'
            ];
            echo json_encode($msm);
            break;
    }
}else{
    $msm = [
        'status' => -1,
        'mensaje' => 'Error de parametros'
    ];
    echo json_encode($msm);
}
