<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     */

    include("./config/users.php");

    session_start();
    //Cargamos variables
    $user=$pass="";

    if (!isset($_SESSION["auth"])) {
        $_SESSION["auth"] = false;
        $_SESSION["user"] = "Invitado";
        $_SESSION["profile"] = "Invitado";
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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Daniel Marín López">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autentificación 1</title>
</head>
<body>
    <h1>Autentificación Básica</h1>
    <div id="sesion">
        <?php
            if ($auth) {
                echo "Bienvenido ".$user." (".$profile.")";
                echo "<br/><a href=\"cierra_sesion.php\">Cerrar sesión</a>";
            } else {
                include("./include/login_form.php");
            }
            
        ?>
    </div>
    <br/>
    <nav>
        <?php
            if ($auth) {
                include("./include/priv_nav.php");
                if ($profile == "Admin") {
                    include("./include/admin_nav.php");
                }
            } else {
                include("./include/pub_nav.php");
            }
        ?>
    </nav>
    <h1>Inicio</h1>
</body>
</html>