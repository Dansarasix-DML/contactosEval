<?php
    /**
     * Script de la Actividad 5
     *
     * @author Daniel Marín López
     * @version 0.01a
     * 
     * Enunciado:
     * Dado el mes y año almacenados en variables, escribir un programa que muestre el
     * calendario mensual correspondiente. Marcar el día actual en verde y los festivos
     * en rojo.
     * 
     * Analisis:
     * El calendario es una tabla, en esta tabla el día actual se marcará en verde
     * y en caso de haber algún festivo se marcará en rojo.
    */

    //Cargamos el mes y el año
    $sys_month = date("n");
    $sys_year = date("Y");

    //Obtenemos día actual
    $sys_day = date("j");

    //Obtenemos días totales
    $days = date("t");

    //Añadiendo festivos, array indexado
    $festivos[1] = [1, 6];
    $festivos[2] = [28];
    //$festivos[9] = [15];
    $festivos[10] = [12];
    $festivos[12] = [25, 31];

    //Sacamos el primer día (1 = Lunes, 2 = Martes, etc.), con mktime sacas la marca de tiempo Unix de una fecha
    $first_day = date("N", mktime(0, 0, 0, $sys_month, 1, $sys_year));

    //Empezamos con la tabla HTML
    echo "<h2>" . date("F Y") . "</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Lunes</th><th>Martes</th><th>Miércoles</th><th>Jueves</th><th>Viernes</th><th>Sábado</th><th>Domingo</th></tr>";
    echo "<tr>";

    // Creamos celdas vacías hasta el primer día de la semana
    for ($d = 1; $d < $first_day; $d++) {
        echo "<td></td>";
    }

    //Metemos días en la tabla
    for ($day = 1; $day <= $days ; $day++) { 
        // Booleano: Comprobamos que $festivos[$sys_month] existe y verificamos el día en el array
        // True: El día es festivo, false: El día no es festivo o no hay festivos en el mes
        if (isset($festivos[$sys_month])) {
            $es_festivo =  in_array($day, $festivos[$sys_month]);
        } else {
            $es_festivo = false;
        }

        //Asignamos color
        if ($day == $sys_day) {
            $color = "green";
        } elseif ($es_festivo) {
            $color = "red";
        } else {
            $color = "white";
        }

        echo "<td style='background-color: $color;'>$day</td>";

        // Si es Domingo (día 7), termina la fila y empieza una nueva
        if ($first_day == 7) {
            echo "</tr><tr>";
            $first_day = 1;
        } else {
            $first_day++;
        }
        
        
    }

    //Llenamos celdas vacías
    while ($first_day > 1 and $first_day < 8) {
        echo "</td><td>";
        $first_day++;
    }

    echo "</tr></table>";

    echo "<br/>";
    echo "<a href=\"https://github.com/Dansarasix-DML/DWES/blob/main/Ud3/actividad_2/actividad_5.php\">GITHUB</a>";

?>