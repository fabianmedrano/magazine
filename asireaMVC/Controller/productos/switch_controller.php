<?php

include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");
require_once(CONTROLLER_PATH . "/productos/productos_controller.php");


if (isset($_POST["btn_accion"])) {

    $controlador_productos = new ProductosController();


    switch ($_POST["btn_accion"]) {

        case 'Actualizar':
            $controlador_productos->uptateProductos($_POST["id"], $_POST["categoria"],  $_POST["nombre"],$_POST["descricion"], "imagen");
            break;

        case 'Guardar':
            $controlador_productos->insertProductos($_POST["categoria"], $_POST["nombre"], $_POST["descripcion"] , "Imagen");
            break;
        case 'Eliminar':
            $controlador_productos->deleteProductos($_POST["id_productos"]);
            break;
        default:
            break;
    }
}
