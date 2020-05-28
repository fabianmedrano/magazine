<?php

include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");
require_once(CONTROLLER_PATH . "/productos/productos_controller.php");


if (isset($_POST["btn_accion"])) {

    $controlador_productos = new ProductosController();


    switch ($_POST["btn_accion"]) {

        case 'Actualizar':
            $controlador_productos->uptateproductos($_POST["id_productos"], $_POST["titulo_productos"], $_POST["editor_productos"]);
            break;

        case 'Guardar':
            $controlador_productos->insertproductos($_POST["titulo_productos"], $_POST["editor_productos"]);

            break;

        case 'Eliminar':

            $controlador_productos->deleteproductos($_POST["id_productos"]);

            header('Location: ' . BASE_URL . '/View/productos/productos_create.php');
            break;

        default:
            echo ("por aqui");
            //    $controlador_productos->deleteproductos($_get["id_productos"]);
            break;
    }
}
