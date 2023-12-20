<?php
    session_start();

    //Cargamos el mes y el año
    $sys_month = date("n");
    $sys_year = date("Y");

    //Obtenemos día actual
    $sys_day = date("j");

    include "./lib/funciones.php";

    if (!isset($_SESSION["auth"]) || !$_SESSION["auth"]) {
        header("location: calendario.php");
        exit();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["add"])) {
            
            $tarea = test_input($_POST["tarea"]);

            $tareas_file = "./files/tasks.txt";
            $linea_tarea = "{$_SESSION["date"]} | {$tarea} | {$_SESSION['user']}\n";
            file_put_contents($tareas_file, $linea_tarea, FILE_APPEND);

            // Redirigir a la página de calendario u otra página después de agregar la tarea
            header("location: calendario.php");
            exit();
        }
    } else {
        // Manejar el acceso no autorizado o redirigir a la página de inicio
        header("location: calendario.php");
        exit();
    }
?>
