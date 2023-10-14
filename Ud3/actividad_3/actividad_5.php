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

    $link = "https://github.com/Dansarasix-DML/DWES/blob/main/Ud3/actividad_3/actividad_5.php";
    echo "<h1>Ejercicio 5 Arrays</h1>
    <p>Mejorar el calendario con un array de los días festivos: colores diferentes,<br/>
    nacionales, comunidad, locales.</p>";

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
    echo "<table>";
    echo "<tr><th>Lunes</th><th>Martes</th><th>Miércoles</th><th>Jueves</th><th>Viernes</th><th>Sábado</th><th>Domingo</th></tr>";
    echo "<tr>";

    // Creamos celdas vacías hasta el primer día de la semana
    for ($d = 1; $d < $first_day; $d++) {
        echo "<td class=\"color11\"></td>";
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
            $color = "color3";
        } else if ($festivo_local) {
            $color = "color2";
        } else if ($festivo_com) {
            $color = "color4";
        } else if ($festivo_nac) {
            $color = "color1";
        } else {
            $color = "color11";
        }

        echo "<td class=\"".$color."\">$day</td>";

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
        echo "</td class=\"color11\"><td>";
        $first_day++;
    }

    echo "</tr></table>";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Daniel Marín López">
    <link rel="stylesheet" href="./css/style.css"></link>
    <link rel="stylesheet" href="../../css/bootstrap.css"></link>
    <title>Unidad 3 - Ejercicio 5 Arrays</title>
</head>
<body>
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="git" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
        </symbol>
    </svg>
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <div class="col-md-4 d-flex align-items-center">
        <a href="/" class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1">
            <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
        </a>
        <span class="mb-3 mb-md-0 text-body-secondary">&copy; 2023 Daniel Marín López</span>
        </div>

        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3"><a class="text-body-secondary" href="<?php echo $link ?>" target="_blank"><svg class="bi" width="24" height="24"><use xlink:href="#git"/></svg></a></li>
        </ul>
  </footer>
</body>
</html>