<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     * Index que llama a 2 contadores de la clase Contador
     */

    require_once "Contador.php";

    $c1 = new Contador();

    $c1 -> count()
        -> count();

    $c2 = new Contador();
    $c2 -> count()
        -> count()
        -> count()
        -> count();

    echo "Contador 1: ".$c1."<br/>";
    echo "Contador 2: ".$c2."<br/>";

?>