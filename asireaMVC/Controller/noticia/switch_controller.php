<?php

include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");
require_once(CONTROLLER_PATH . "/noticia/noticia_controller.php");

if (isset($_POST["btn_accion"])) {

    $controlador_noticia = new NoticiaController();


    switch ($_POST["btn_accion"]) {

        case 'Actualizar':
            $controlador_noticia->uptateNoticia($_POST["editor_noticia"]);

            header('Location: ' . BASE_URL . '/View/Noticia/noticia_edit.php');

            break;
        case 'Guardar':
            $controlador_noticia->insertNoticia($_POST["titulo_noticia"],$_POST["editor_noticia"]);

            header('Location: ' . BASE_URL . '/View/Noticia/noticia_create.php');
            break;


        default:
            break;
    }
}
