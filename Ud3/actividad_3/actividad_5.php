<?php
    /**
     * Script de la Actividad 5
     *
     * @author Daniel Marín López
     * @version 0.02a
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

    //Añadiendo festivos, array multidimensional asociativo
    $festivos = array(
        "local" => array(
            10 => array(24),
        ),
        "nacional" => array(
            1 => array(1, 6),
            10 => array(12),
            11 => array(1),
            12 => array(25, 31)
        ),
        "comunidad" => array(
            2 => array(28)
        )
    );

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
        //Booleanos para indicar si un día es local, comunidad o nacional
        $festivo_local = false;
        $festivo_com = false;
        $festivo_nac = false;
        
        if (isset($festivos["nacional"][$sys_month])) {
            $festivo_nac = in_array($day, $festivos["nacional"][$sys_month]);
        }
        if (isset($festivos["comunidad"][$sys_month])) {
            $festivo_com = in_array($day, $festivos["comunidad"][$sys_month]);
        }
        if (isset($festivos["local"][$sys_month])) {
            $festivo_local =  in_array($day, $festivos["local"][$sys_month]);
        }
        

        //Asignamos color
        if ($day == $sys_day) {
            $color = "green";
        } else if ($festivo_local) {
            $color = "blue";
        } else if ($festivo_com) {
            $color = "yellow";
        } else if ($festivo_nac) {
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

?>