<?php

include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");
require_once(CONTROLLER_PATH . "/proyectos/proyecto_controller.php");


if (isset($_POST["btn_accion"])) {

    $controlador_Proyecto = new ProyectoController();


    switch ($_POST["btn_accion"]) {

        case 'Actualizar':
            $controlador_Proyecto->uptateProyecto($_POST["id_proyecto"], $_POST["titulo_proyecto"], $_POST["editor_proyecto"]);
            break;

        case 'Guardar':
            $controlador_Proyecto->insertProyecto($_POST["titulo_proyecto"], $_POST["editor_proyecto"]);

            break;

        case 'Eliminar':

            $controlador_Proyecto->deleteProyecto($_POST["id_proyecto"]);

        break;

        case 'Obtener':
            echo(json_encode(  $controlador_Proyecto->getProyectos()));;
            break;


        default:
            echo ("por aqui");
            //    $controlador_Proyecto->deleteProyecto($_get["id_Proyecto"]);
            break;
    }
}
