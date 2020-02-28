<?php

include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");
require_once(CONTROLLER_PATH . "/nosotros/nosotros_controller.php");

if (isset($_POST["btn_accion"])) {

    $controlador_nosotros = new NosotrosController();


    switch ($_POST["btn_accion"]) {
        
        case 'Update':
        $controlador_nosotros->uptateNosotros($_POST["editor_nosotros"]);
            break;

        case 'View':
            $controlador_nosotros->getNosotros($_POST["editor_nosotros"]);
            break;


        default:
            break;
    }
  
}
