<?php
include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");
session_start();

class Login{

    function validarSesion($user, $pass){
        try {
            $dataUser = fopen(DATA_PATH."/config", "r");
            $temp = "";
            while(!feof($dataUser)) {
                $temp = fgets($dataUser);
            }

            $datos = explode(",", $temp);

            $result = 0;
            if($user == $datos[0] && $pass == $datos[1]){
                $_SESSION["admin"] = null;
                $result = 1;
            }else{
                $_SESSION["admin"] = 0;
            }
            fclose($dataUser);
            return $result;
        }catch (Exception $e){
            return 0;
        }
    }

    function validarClave($dato, $dato2, $dato3){
        try {
            $dataUser = fopen(DATA_PATH."/config", "r");
            $temp = "";
            while(!feof($dataUser)) {
                $temp = fgets($dataUser);
            }

            $datos = explode(",", $temp);

            $posiciones = $_SESSION["coordenadas"];

            if($this->validar($datos[($posiciones[0]->y+2)], $posiciones[0]->x, $dato) &&
                $this->validar($datos[($posiciones[1]->y+2)], $posiciones[1]->x, $dato2) &&
                $this->validar($datos[($posiciones[2]->y+2)], $posiciones[2]->x, $dato3)){

                $_SESSION["alerta"] = null;
                $_SESSION["recuperar"] = 1;
            }else{
                $_SESSION["alerta"] = 0;
                $_SESSION["recuperar"] = null;
            }
            fclose($dataUser);
        }catch (Exception $e){
            echo $e;
        }
    }

    function validar($lista, $pos, $dato){
        $lista = explode("-", $lista);
        $result = false;
        if($lista[$pos] == $dato){
            $result = true;
        }
        return $result;
    }

    function cambiarPass($pass){
        $_SESSION["recuperar"] = null;
        try {
            $dataUser = fopen(DATA_PATH."/config", "r");
            $temp = "";
            while(!feof($dataUser)) {
                $temp = fgets($dataUser);
            }
            fclose($dataUser);

            $datos = explode(",", $temp);
            $datos[1] = $pass;

            $myfile = fopen(DATA_PATH."/config", "w");
            fwrite($myfile, $datos[0].",".$datos[1].",".$datos[2].",".$datos[3].",".$datos[4].",".$datos[5]);
            fclose($myfile);
        }catch (Exception $e){
            echo $e;
        }
    }
}