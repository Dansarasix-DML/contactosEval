<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * @DNI: 31880329
     */

    include "./../config/config.php";

    /**
     * @name: verificaDNI
     * @param string, dni del usuario
     * @return boolean
     * 
     * Función para verificar si el dni del usuario es válido o no
     * 
     * password: echo
     */
    function verificaDNI($dni) {
        $check = false;
        if (preg_match('/^[0-9]{8}$/', $dni)) {
            $check = true;
        }
        return $check;
    }

    /**
     * @name: generarPasswd
     * @param string, dni del usuario
     * @return string, password generada
     * 
     * Función que genera una password en base al DNI del usuario,
     * sumará sus dígitos y usará el resto de la división por 7
     * para devolver una de las passwords guardadas anteriormente.
     * 
     * password: echo
     */
    function generarPasswd($dni) {
        $sol = 0;
        for ($i=0; $i < strlen($dni); $i++) { 
            $sol += intval($dni[$i]);
        }
        $sol = $sol % 7;
        return PASSWS[$sol];
    }

?>