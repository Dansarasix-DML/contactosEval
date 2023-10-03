<?php
    /**
     * Script de la Actividad 4
     *
     * @author Daniel Marín López
     * @version 0.01a
    */

    $colors = array("#FF0000", "#0000FF", "#008000", "#FFFF00", "#FFA500", "#800080", "#FF7F50", "#DC143C", "#ADFF2F");

    echo '<h2>Tablas de colores</h2>';
    echo '<table style="border-collapse: collapse;">';
    echo '</tr>';
    for ($i=1; $i <= 3; $i++) { 
        echo '<td style="border: medium solid black; text-align: center; background-color:' . $colors[$i - 1] . ' ;">' . $colors[$i - 1] . '</td>';
    }
    echo '</tr>';
    for ($i=4; $i <= 6; $i++) { 
        echo '<td style="border: medium solid black; text-align: center; background-color:' . $colors[$i - 1] . ' ;">' . $colors[$i - 1] . '</td>';
    }
    echo '</tr>';
    for ($i=7; $i <= 9; $i++) { 
        echo '<td style="border: medium solid black; text-align: center; background-color:' . $colors[$i - 1] . ' ;">' . $colors[$i - 1] . '</td>';
    }
?>