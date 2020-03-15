<?php

include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");
require_once(CONTROLLER_PATH . "/noticia/noticia_controller.php");


echo("AQUI");
if (isset($_POST["btn_accion"])) {

    $controlador_noticia = new NoticiaController();


    echo($_POST["btn_accion"]);
    switch ($_POST["btn_accion"]) {

        case 'Actualizar':
            $controlador_noticia->uptateNoticia($_POST["editor_noticia"]);

            header('Location: ' . BASE_URL . '/View/Noticia/noticia_edit.php');

            break;
        case 'Guardar':
            $controlador_noticia->insertNoticia($_POST["titulo_noticia"],$_POST["editor_noticia"]);

            header('Location: ' . BASE_URL . '/View/Noticia/noticia_create_admin.php');
            break;

            case 'eliminar':

        echo("por aca");
                $controlador_noticia->deleteNoticia($_POST["id_noticia"]);
    
                header('Location: ' . BASE_URL . '/View/Noticia/noticia_create.php');
                break;
    
        default:
        echo("por aqui");
    //    $controlador_noticia->deleteNoticia($_get["id_noticia"]);
            break;
    }
}
