<?php
 
defined("VIEW_PATH")
    or define("VIEW_PATH", realpath(dirname(__FILE__) . '/View'));
     
defined("TEMPLATES_PATH")
    or define("TEMPLATES_PATH", realpath(dirname(__FILE__) . '/View/Templates'));

defined("CONTROLLER_PATH")
    or define("CONTROLLER_PATH", realpath(dirname(__FILE__) . '/Controller'));

    defined("DATA_PATH")
    or define("DATA_PATH", realpath(dirname(__FILE__) . '/Model/Data'));


    defined("CONEXION_PATH")
    or define("CONEXION_PATH", realpath(dirname(__FILE__) . '/Model/conexion.php'));

?>