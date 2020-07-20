
    function validarCkeditor($texto, $msg, $idError) {
        min = ($texto.length < 51) ? pintarError($msg[0], $idError) : borrarError($msg[0], $idError);
        max = ($texto.length > 3000) ? pintarError($msg[1], $idError) : borrarError($msg[1], $idError);
        return (min && max);
    }
    
    function validarTitle($texto, $msg, $idError) {
        min = ($texto.length < 1) ? pintarError($msg[0], $idError) : borrarError($msg[0], $idError);
        max = ($texto.length > 50) ? pintarError($msg[1], $idError) : borrarError($msg[1], $idError);
        return (min && max);
    }

    function pintarError($msg, $idError) {
        if (!$("#" + $msg['error'])[0]) {
            $idError.append('<div id="' + $msg['error'] + '"  class="alert alert-warning   " role="alert" > ' + $msg['msg'] + '</div>');
        }
        return false;
    }
    function borrarError($msg, $idError) {
        if ($("#" + $msg['error'])[0]) {
            $("#" + $msg['error']).remove();
        }
        return true;
    }

