<table border='1'>
    <tr><th>Lunes</th><th>Martes</th><th>Miércoles</th><th>Jueves</th><th>Viernes</th><th>Sábado</th><th>Domingo</th></tr>
    <tr>
    <?php
        $tareas = array();
        $file = "./files/tasks.txt";

        if (file_exists($file)) {
            // Leer el contenido del archivo línea por línea
            $lineas = file($file);
            // Mostrar cada línea
            foreach ($lineas as $linea) {
                list($fecha, $tarea, $usuario) = explode(" | ", $linea);
                if (test_input($usuario) == $_SESSION["user"]) {
                    $tareas[] = array(test_input($fecha), test_input($tarea));
                }
            }
        } else {
            // Si el archivo no existe, mostrar un mensaje de error
            echo 'El archivo no existe';
        }

        // Creamos celdas vacías hasta el primer día de la semana
        for ($d = 1; $d < $first_day; $d++) {
            echo "<td class=\"white\"></td>";
        }

        $days = n_dias(intval($month), intval($year));

        //Metemos días en la tabla
        for ($d = 1; $d <= $days ; $d++) { 
            $hayTarea = false;
            foreach ($tareas as $tarea) {
                list($extractedYear, $extractedMonth, $extractedDay) = explode("-", $tarea[0]);
                if ($extractedYear == $year && $extractedMonth == $month && $extractedDay == $d) {
                    $hayTarea = true;

                }
            }
            //Booleanos para indicar si un día es local, comunidad o nacional
            $festivo_local = false;
            $festivo_com = false;
            $festivo_nac = false;
                    
            if (isset($festivos["nacional"][$month])) {
                $festivo_nac = in_array($d, $festivos["nacional"][$month]);
            }
            if (isset($festivos["comunidad"][$month])) {
                $festivo_com = in_array($d, $festivos["comunidad"][$month]);
            }
            if (isset($festivos["local"][$month])) {
                $festivo_local =  in_array($d, $festivos["local"][$month]);
            }
            if ($month == $semanasanta[0]) {
                $festivo_nac = in_array($d, $semanasanta[1]);
            }
                    
            $style = "";
            $cond = ($month == $sys_month and $year == $sys_year);
            $esdomingo = (date("N", mktime(0, 0, 0, intval($month), $d, intval($year))) == 7);

            //Asignamos color
            if ($d == $sys_day and $cond) {
                $style = "background-color: {$color_actual};";
            } else if ($festivo_local) {
                $style = "background-color: {$color_local};";
            } else if ($festivo_com) {
                $style = "background-color: {$color_comunidad};";
            } else if ($festivo_nac) {
                $style = "background-color: {$color_nacional};";
            } else if ($esdomingo) {
                $style = "background-color: {$color_domingo};";
            } else {
                $style = "background-color: white;";
            }

            $dia = ($hayTarea) ? "<b>".$d."</b>" : $d;

            $selected_date = "{$year}-{$month}-{$d}";
            echo "<td style=\"{$style}\"><a href='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "?selected_date={$selected_date}'>$dia</a></td>";

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
            echo "</td class=\"white\"><td>";
            $first_day++;
        }
    ?>
    </tr>
</table>