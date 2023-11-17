<?php
    /**
     * Script del Ejercicio 1
     *
     * @author Daniel Marín López
     * @version 0.01a
    */

    function verificaDNI($dni) {
        $check = false;
        if (preg_match('/^[0-9]{8}$/', $dni)) {
            $check = true;
        }
        return $check;
    }

    function procesaDNI($dni, $letras) {
        $resto = intval($dni) % 23;
        return $letras[$resto];
    }

?>