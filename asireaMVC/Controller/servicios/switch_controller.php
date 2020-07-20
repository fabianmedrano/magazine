<?php

include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");
require_once(CONTROLLER_PATH . "/servicios/servicios_controller.php");


if (isset($_POST["btn_accion"])) {

    $controlador_servicios = new ServiciosController();


    switch ($_POST["btn_accion"]) {

        case 'Actualizar':
            $controlador_servicios->uptateservicios($_POST["id_servicios"], $_POST["titulo_servicios"], $_POST["editor_servicios"]);
            break;

        case 'Guardar':
            $controlador_servicios->insertServicios("imagen", $_POST["nombre"], $_POST["descripcion"]);
            break;

        case 'Eliminar':

            $controlador_servicios->deleteservicios($_POST["id_servicios"]);

            header('Location: ' . BASE_URL . '/View/servicios/servicios_create.php');
            break;

        default:
            break;
    }
}
