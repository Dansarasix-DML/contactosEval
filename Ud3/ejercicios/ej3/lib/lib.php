<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     * Fichero de funciones
     */

    
    $creaUsuario = function ($array){
        $usuario = "";
        foreach (array_reverse($array) as $value) {
            $str = str_replace(ACENTOS, SIN_ACENTOS, $value);
            $str = strtolower($str);
            $usuario .= substr($str, 0, 2);

        }
        return $usuario;
    }
?>