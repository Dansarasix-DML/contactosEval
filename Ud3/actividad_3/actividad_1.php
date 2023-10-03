<?php
    /**
     * Script de la actividad 1
     *
     * @author Daniel Marín López
     * @version 0.01a
    */

    //Array unidimensional indexado
    $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo",
    "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

    echo "<h1>Ejercicio 1</h1>";
    echo "<h3>Apartado a)</h3>";

    // For clásico para imprimir los meses
    for ($i=0; $i < count($meses); $i++) { 
        echo $meses[$i] . ", ";
    }

    echo "<h3>Apartado b)</h3>";

    //Array unidimensional indexado
    $tablero = array(
        1 => "A",
        2 => "B",
        3 => "C",
        4 => "D",
        5 => "E",
        6 => "F",
        7 => "G",
        8 => "H",
        9 => "I",
        10 => "J"
    );

    //Haciendo tablero
    echo '<table style="border-collapse: collapse;">';
    echo '<tr><th style="border: medium solid black; background-color: #CCCCCC;"></th>';

    for ($i = 1; $i <= 10; $i++) {
        echo "<th style=\"border: medium solid black; background-color: #CCCCCC;\">$i</th>";
    }

    //ForEach para imprimir las letras
    foreach ($tablero as $key => $value) {
        echo '<tr>';
        echo "<th style=\"border: medium solid black; background-color: #CCCCCC;\">$value</th>";
        for ($j = 1; $j <= 10; $j++) {
            echo '<td style="border: medium solid black; text-align: center;"></td>';
        }
        echo '</tr>';        
    }

    echo '</table>';

    echo "<h3>Apartado c)</h3>";

    //Array unidimensional asociativo
    $notas = array(
        "Daniel Marín" => 7,
        "Eduardo Ruz" => 8,
        "Laura Luque" => 7
    );

    //Haciendo tabla
    echo '<table style="border-collapse: collapse;">';
    echo '<tr><th style="border: medium solid black; background-color: #CCCCCC;">Alumno</th><th style="border: medium solid black; background-color: #CCCCCC;">Nota</th>';

    foreach ($notas as $alumno => $nota) {
        echo '<tr>';
        echo '<td style="border: medium solid black; text-align: center;">' . $alumno . '</td><td style="border: medium solid black; text-align: center;">' . $nota . '</td>';
    }
    
    echo '<tr>';
    echo '</table>';

    echo "<h3>Apartado d)</h3>";

    //Array multidimensional asociativo
    $eng_verbs = array(
        "be" => array("was/were", "been"),
        "buy" => array("bought", "bought"),
        "cut" => array("cut", "cut")
    );

    //Hacemos tabla
    echo '<table style="border-collapse: collapse;">';
    echo '<tr><th style="border: medium solid black; background-color: #CCCCCC;">Verbo</th><th style="border: medium solid black; background-color: #CCCCCC;">Pasado</th><th style="border: medium solid black; background-color: #CCCCCC;">Participio</th>';

    foreach ($eng_verbs as $verbo => $formas) {
        echo '<tr>';
        echo '<td style="border: medium solid black; text-align: center;">' . $verbo . '</td><td style="border: medium solid black; text-align: center;">' . $formas[0] . '</td><td style="border: medium solid black; text-align: center;">' . $formas[1] . '</td>';
    }

    echo '<tr>';
    echo '</table>';

    echo "<h3>Apartado e)</h3>";

    //Array multidimensional asociativo
    $continentes = array(
        "Asia" => array(
            "Japón" => array("Tokyo", "Bandera de Japón"),
            "China" => array("Hon Kong", "Bandera de China")
        ),
        "Europa" => array(
            "España" => array("Madrid", "Bandera de España"),
            "Francia" => array("Paris", "Bandera de Francia"),
            "Alemania" => array("Berlin", "Bandera de Alemania"),
        ),
        "América" => array(
            "Estados Unidos" => array("Washington D. C.", "Bandera de Estados Unidos"),
            "México" => array("Ciudad de México", "Bandera de México"),
            "Argentina" => array("Buenos Aires", "Bandera de Argentina"),
        )
    );

    //Hacemos lista anidada
    echo "<ul>";
    foreach ($continentes as $cont => $paises) {
        echo "<li>" . $cont;
        echo "<ul>";
        foreach ($paises as $pais => $datos) {
            echo "<li>" . $pais;
            echo "<ul>";
            for ($i=0; $i < 2; $i++) { 
                echo "<li>" . $datos[$i] . "</li>";
            }
            echo "</ul>";
            echo "</li>";
        }
        echo "</ul>";
        echo "</li>";
    }
    echo "</ul>";

?>