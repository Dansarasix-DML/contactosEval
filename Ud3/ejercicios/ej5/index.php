<?php
    /**
     * Script del Ejercicio 5
     *
     * @author Daniel Marín López
     * @version 0.01a
    */

    include "./config/config.php";
    include "./lib/lib.php";

    echo "<h1>Ejercicio 5</h1>";
    echo "<p>Enlaces generados:</p>";

    foreach ($enlaces as $enlace) {
        echo $procesaEnlace($enlace) . "<br/>";
    }

?>