<?php
Class templateController{
  
    function __construct() {
        include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");
    }

    public function getBase(){
        include TEMPLATES_PATH."/base.php"; 
    }

    
}