<?php
    /**
     * Funciones del Ejercicio 4
     *
     * @author Daniel Marín López
     * @version 0.01a
    */

    function suma_recursiva($numero) {
        $num = (string) $numero;

        if (strlen($num) == 1) {
            return $num;
        } else {
            $init_digit = (int) $num[0];
            $rest_num = (int) substr($num, 1);
            return $init_digit + suma_recursiva($rest_num);
        }
        
    }

?>