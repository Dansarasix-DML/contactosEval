<?php
    /**
     * Script del Ejercicio 2
     *
     * @author Daniel Marín López
     * @version 0.01a
    */

    function factorizar($numero) {
        $factores = array();
        for ($i = 2; $i <= $numero; $i++) {
            while ($numero % $i == 0) {
                $factores[] = $i;
                $numero = $numero / $i;
            }
        }
        return $factores;
    }

?>