<?php
    /**
     * Funciones del Ejercicio 5
     *
     * @author Daniel Marín López
     * @version 0.01a
    */

    
    $procesaEnlace = function($array) {
        $target = $array["target"];
        if ($target == "") {
            $target = "_self";
        }
        return "<a href=\"".$array["href"]."\" target=\"".$target."\">".$array["name"]."</a>";
    }

?>