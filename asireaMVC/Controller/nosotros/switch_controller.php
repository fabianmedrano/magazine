<?php

include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");
require_once(CONTROLLER_PATH . "/nosotros/nosotros_controller.php");


if (isset($_POST["btn_accion"])) {


    $controlador_nosotros = new NosotrosController();


    switch ($_POST["btn_accion"]) {

        case 'Actualizar':
            $controlador_nosotros->uptateNosotros($_POST["editor_nosotros"]);

            //  header('Location: ' . BASE_URL . '/View/Nosotros/nosotros_edit.php');

            break;
        case 'guardar_contacto':
            $controlador_nosotros->insertContacto($_POST["select_tipo_contacto"], $_POST["input_contacto"]);

            //  header('Location: ' . BASE_URL . '/View/Nosotros/nosotros_edit.php');

            break;


        case 'View':
            $controlador_nosotros->getNosotros($_POST["editor_nosotros"]);
            break;

        case 'get_telefonos':

            echo (json_encode($controlador_nosotros->getTelefonos()));
            break;

        case 'get_redes':
            echo (json_encode($controlador_nosotros->getRedes()));
            break;

        case 'get_correos':
            echo (json_encode($controlador_nosotros->getCorreos()));
            break;

        case 'eliminar_contacto':
            $controlador_nosotros->deleteContacto($_POST["id_contacto"]);

            break;
        case 'editar_contacto':
            $controlador_nosotros->updateContacto($_POST["id_contacto"] ,$_POST["input_contacto_edit"]);

            break;

        default:

            break;
    }
}
