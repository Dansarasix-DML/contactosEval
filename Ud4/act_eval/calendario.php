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

    session_start();
    //Cargamos variables
    $user=$pass="";
    $procesaAuth = false;

    if (!isset($_SESSION["auth"])) {
        $_SESSION["auth"] = false;
        $_SESSION["user"] = "Invitado";
    }  

    $auth = $_SESSION["auth"];
    $user = $_SESSION["user"];

    if (isset($_POST["enviar"])) {
        //procesamos formulario
        $procesaAuth = true;
        $_SESSION["user"] = $_POST["usuario"];
    }
    

    //Variables del formulario
    $day = $month = $month_name = $year = "";

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
    $color_actual = "#00FF00";
    $color_nacional = "#FF0000";
    $color_comunidad = "#FFFF00";
    $color_local = "#0000FF";
    $color_domingo = "#FF9881";

    // Cargamos el mes y el año desde el formulario si se han enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validar mes
        if (!empty($_POST["mes"]) && array_search($_POST["mes"], $meses)) {
            $month = array_search($_POST["mes"], $meses);
        }

        // Validar año
        if (!empty($_POST["ano"]) && is_numeric($_POST["ano"]) && $_POST["ano"] >= 1900) {
            $year = $_POST["ano"];
        }else{
            $year_Err = "VALOR NO VÁLIDO, TOMANDO VALOR POR DEFECTO";
            $year = $sys_year;
        }

        //Obtenemos días totales
        //$days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $days = n_dias(intval($month), intval($year));

        // Validar día
        if (!empty($_POST["dia"]) && is_numeric($_POST["dia"]) && $_POST["dia"] >= 1 && $_POST["dia"] <= $days) {
            $day = $_POST["dia"];
        }

        $color_actual = (isset($_POST["color_actual"])) ? $_POST["color_actual"] : "#00FF00";
        $color_nacional = isset($_POST["color_nacional"]) ? $_POST["color_nacional"] : "#FF0000";
        $color_comunidad = isset($_POST["color_comunidad"]) ? $_POST["color_comunidad"] : "#FFFF00";
        $color_local = isset($_POST["color_local"]) ? $_POST["color_local"] : "#0000FF";
        $color_domingo = isset($_POST["color_domingo"]) ? $_POST["color_domingo"] : "#FFFFFF";

    } else {
        // Si no se ha enviado el formulario, establecemos las fechas predeterminadas
        $day = $sys_day;
        $month = $sys_month;
        $year = $sys_year;
    }

    //Sacamos el primer día (1 = Lunes, 2 = Martes, etc.), con mktime sacas la marca de tiempo Unix de una fecha
    $first_day = date("N", mktime(0, 0, 0, intval($month), 1, intval($year)));

    //Obtenemos semana santa
    $semanasanta = Calc_SemSant($year);

    if (!empty($_GET["selected_date"])) {
        // Actualizar $sys_day con el día seleccionado
        list($selected_year, $selected_month, $selected_day) = explode("-", $_GET["selected_date"]);
        $sys_day = (int)$selected_day;
        $sys_month = $month = (int)$selected_month;
        $sys_year = $year = (int)$selected_year;
        $first_day = date("N", mktime(0, 0, 0, intval($month), 1, intval($year)));
    }

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
    </head>
    <body>
        <h1>Calendario con Sesiones</h1>
        <p>Modifica el ejercicio del calendario para que el mes y el año se lean en un<br/>
        formulario. Añade las siguientes especificaciones:<br/>
        <?php
        $month_name = $meses[$sys_month];
        if ($auth) {
            if (!$procesaForm) { 
                echo "<h3>Bienvenido ".$user."</h3>";
                echo "<a href=\"cierra_sesion.php\">Cerrar sesión</a><br/><br/>";
                include "./include/calendarForm.php";                
            }
        } else {
            echo "<h3>Bienvenido al calendario. Inicie sesión para continuar:</h3>";
            include "./include/login_form.php";
        }
        echo "<br/>";
        echo "<h2>$month_name".": "."$year</h2>";
        include "./include/calendarTabla.php";
        if ($auth) {
            echo "<br/><h3>Gestor de Tareas</h3><br/>";
            include "./include/taskForm.php";
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