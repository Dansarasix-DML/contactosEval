<?php
    /**
     * Script de la Actividad 2
     *
     * @author Daniel Marín López
     * @version 0.01a
     * 
    */

    $ejercicios = array(
        "actividad_1" => "./actividad_1.php",
        "actividad_2" => "./actividad_2.php",
        "actividad_3" => "./actividad_3.php",
        "actividad_4" => "./actividad_4.php",
        "actividad_5" => "./actividad_5.php",
    );

    echo "<h1>Ejercicios (Ejercicio 2)</h1>";
    foreach ($ejercicios as $ejercicio => $url) {
        echo "<a href=" . $url . ">" . $ejercicio . "</a><br>";
    }

    echo "<br/>";
    echo "<a href=\"https://github.com/Dansarasix-DML/DWES/blob/main/Ud3/actividad_3/actividad_2.php\">GITHUB</a>";
?>