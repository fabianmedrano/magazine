<?php

include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");
require_once(CONTROLLER_PATH . "/galeria/Galeria_controller.php");

if (isset($_REQUEST["accion"])) {

    $controller = new Galeria_controller();


    switch ($_REQUEST["accion"]) {

        case 'get':
            echo $controller->getCategorias();
            break;
        case 'getAll':
            echo $controller->getGaleria();
            break;
        case 'insert':
            echo $controller->insertCategoria($_REQUEST['name']);
            break;
        case 'update':
            echo $controller->updateCategoria($_REQUEST['id'], $_REQUEST['name']);
            break;
        case 'delete':
            echo $controller->deleteCategoria($_REQUEST['id']);
            break;
        case 'name':
            echo $controller->nameFotos($_REQUEST['id']);
            break;
        default:
            $msm = [
                'status' => -1,
                'mensaje' => "acción no valida!! Comuníquese con el Desarrollador"
            ];
            echo json_encode($msm);
            break;
    }
}else{
    $msm = [
        'status' => -1,
        'mensaje' => "Error de parametros"
    ];
    echo json_encode($msm);
}
