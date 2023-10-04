<?php
    /**
     * Script de la Actividad 3
     *
     * @author Daniel Marín López
     * @version 0.01a
    */
    
    echo '<h2>Tablas de Multiplicar del 1 al 10</h2>';
    echo '<table style="border-collapse: collapse;">';
    echo '<tr><th style="border: medium solid black; background-color: #CCCCCC;">x</th>';

    for ($i = 1; $i <= 10; $i++) {
        echo "<th style=\"border: medium solid black; background-color: #CCCCCC;\">$i</th>";
    }

    echo '</tr>';

    //Array de colores
    $colors = array('red', 'blue', 'green', 'yellow', 'orange', 'purple', 'coral', 'crimson', 'greenyellow', 'aquamarine');
    
    for ($i = 1; $i <= 10; $i++) {
        echo '<tr>';
        echo "<th style=\"border: medium solid black; background-color: #CCCCCC;\">$i</th>";
        for ($j = 1; $j <= 10; $j++) {
            echo '<td style="border: medium solid black; text-align: center; background-color:' . $colors[$i - 1] . ' ;">' . ($i * $j) . '</td>';
        }
        echo '</tr>';
    }

    echo '</table>';
    echo "<br/>";
    echo "<a href=\"https://github.com/Dansarasix-DML/DWES/blob/main/Ud3/actividad_2/actividad_3.php\">GITHUB</a>";
    
?>