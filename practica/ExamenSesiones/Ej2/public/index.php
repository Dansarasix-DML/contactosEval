<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     */

    include "../config/config.php";

    session_start();
    //Cargamos variables
    $user=$pass="";


    if (!isset($_SESSION["auth"])) {
        $_SESSION["auth"] = false;
        $_SESSION["user"] = "Invitado";
        $_SESSION["profile"] = "Invitado";
        $_SESSION["noticias"] = json_encode($noticias);

    }  

    $auth = $_SESSION["auth"];
    $profile = $_SESSION["profile"];
    $user = $_SESSION["user"];

    $procesaForm = false;

    if (isset($_POST["enviar"])) {
        //procesamos formulario
        $procesaForm = true;
        $_SESSION["user"] = $_POST["usuario"];
        $_SESSION["pass"] = $_POST["passwd"];
    }   

    // echo var_dump($_SESSION["noticias"]);

    if (!$auth) {
        echo "<p>Resumen de noticias.</p>";
        echo "<hr/>";
        include "../include/login_form.php";
    } else {
        $enlace = "";
        if ($profile == "redactor") {
            $enlace = "<a href=\"#\">Añadir noticia</a>";
        } else {
            $enlace = "<a href=\"#\">Añadir categoría</a>";
        }
        echo "<p>Bienvenido " . $user . ". " . $enlace . " | <a href=\"cierra_sesion.php\">Cerrar sesión</a></p>";
        echo "<hr/>";
        
    }
    echo "<h1>Noticias Generales</h1>";
    echo "<ul>";
        if (isset($_SESSION["noticias"])) {
            foreach (json_decode($_SESSION["noticias"], true) as $key => $value) {
                echo "<li>".$key."</li>";
                echo "<ul>";
                foreach ($value as $noticia) {
                    echo "<li>".$noticia."</li>";
                }
                echo "</ul>";
            }
        }
    echo "</ul>";
    

?>

