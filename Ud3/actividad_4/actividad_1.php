<?php
    /**
     * Script de la Actividad 1
     *
     * @author Daniel Marín López
     * @version 0.05a
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

    $link="https://github.com/Dansarasix-DML/DWES/blob/main/Ud3/actividad_4/actividad_1.php";


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
        <link rel="stylesheet" href="../../css/bootstrap.css"></link>
        <title>Unidad 3 - Ejercicio 2 Formularios</title>
        <style>
            .error {color: red;}
        </style>
    </head>
    <body>
        <h1>Ejercicio 2 Formularios</h1>
        <p>Modifica el ejercicio del calendario para que el mes y el año se lean en un<br/>
        formulario. Añade las siguientes especificaciones:<br/>
        a. Por defecto se carga el mes y año actual.<br/>
        b. Definición de días festivos en un array.<br/>
        c. Utilizar colores para diferenciar festivos nacionales, de comunidad y locales.<br/>
        d. Cada día será un enlace a una página que mostrará la fecha seleccionda.</p>
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
                    echo "<td class=\"white\"></td>";
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
                    
                    $cond = ($month == $sys_month and $year == $sys_year);

                    //Asignamos color
                    if ($d == $sys_day and $cond) {
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
                    echo "</td class=\"white\"><td>";
                    $first_day++;
                }
            ?>
            </tr></table>
        <?php
        }
        ?>
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