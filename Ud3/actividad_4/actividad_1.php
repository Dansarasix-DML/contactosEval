<?php
    /**
     * Script de la Actividad 1
     *
     * @author Daniel Marín López
     * @version 0.03a
     * 
     * Enunciado:
     * Modifica el ejercicio del calendario para que el mes y el año se lean en un
     * formulario. Añade las siguientes especificaciones:
     * a. Por defecto se carga el mes y año actual.
     * b. Definición de días festivos en un array.
     * c. Utilizar colores para diferenciar festivos nacionales, de comunidad y locales.
     * d. Cada día será un enlace a una página que mostrará la fecha seleccionda.
     * 
     * Analisis:
     * El calendario es una tabla, en esta tabla el día actual se marcará en verde
     * y en caso de haber algún festivo se marcará en algún color. El formulario irá
     * arriba del calendario.
    */

    //Añadimos librerias
    include "./lib/funciones.php";
    include "./config/config.php";
    

    //Variables del formulario
    $day = $month = $year = "";

    //Cargamos el mes y el año
    $sys_month = date("n");
    $sys_year = date("Y");

    //Obtenemos día actual
    $sys_day = date("j");

    //Variables de error
    $day_Err = $month_Err = $year_Err = "";
    

    //Empezamos con el formulario
    $procesaForm = false;
    $error = false;

    // Cargamos el mes y el año desde el formulario si se han enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validar mes
        if (!empty($_POST["mes"]) && array_search($_POST["mes"], $meses)) {
            $month = array_search($_POST["mes"], $meses);
        }

        // Validar año
        if (!empty($_POST["ano"]) && is_numeric($_POST["ano"]) && $_POST["ano"] >= 1900) {
            $year = $_POST["ano"];
        }

        //Obtenemos días totales
        $days = n_dias(intval($month), intval($year));

        // Validar día
        if (!empty($_POST["dia"]) && is_numeric($_POST["dia"]) && $_POST["dia"] >= 1 && $_POST["dia"] <= $days) {
            $day = $_POST["dia"];
        }
    } else {
        // Si no se ha enviado el formulario, establecemos las fechas predeterminadas
        $day = $sys_day;
        $month = $sys_month;
        $year = $sys_year;
    }

    //Sacamos el primer día (1 = Lunes, 2 = Martes, etc.), con mktime sacas la marca de tiempo Unix de una fecha
    $first_day = date("N", mktime(0, 0, 0, intval($month), 1, intval($year)));

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Daniel Marín López">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/style.css"></link>
        <title>Calendario</title>
        <style>
            .error {color: red;}
        </style>
    </head>
    <body>
        <?php
        if (!$procesaForm) { ?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="text" name="dia" value="<?php echo $day; ?>">
            <select name="mes">
                <?php
                    foreach ($meses as $key => $value) {
                        $selected = ($key == $month) ? "selected" : "";
                        echo "<option value='$value' $selected>$value</option>";
                    }
                ?>
            </select>
            <input type="text" name="ano" value="<?php echo $year; ?>">
            <input type="submit" name="submit" value="Enviar">
            <br/>
            <span class="error"><?php echo $day_Err; ?></span>
            <span class="error"><?php echo $month_Err; ?></span>
            <span class="error"><?php echo $year_Err; ?></span>
            </form>
            <br/>
            <table border='1'>
            <tr><th>Lunes</th><th>Martes</th><th>Miércoles</th><th>Jueves</th><th>Viernes</th><th>Sábado</th><th>Domingo</th></tr>
            <tr>
            <?php
                // Creamos celdas vacías hasta el primer día de la semana
                for ($d = 1; $d < $first_day; $d++) {
                    echo "<td></td>";
                }

                $days = n_dias(intval($month), intval($year));

                //Metemos días en la tabla
                for ($d = 1; $d <= $days ; $d++) { 
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
                    
                    //Asignamos color
                    if ($d == $sys_day and $month == $sys_month) {
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

                    echo "<td class=\"".$color."\">$d</td>";

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
            ?>
            </tr></table>
            <br/>
            <a href=\"https://github.com/Dansarasix-DML/DWES/blob/main/Ud3/actividad_3/actividad_5.php\">GITHUB</a>
        <?php
        }
        ?>
    </body>
</html>