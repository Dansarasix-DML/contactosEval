<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     */

    include("./config/users.php");

    session_start();
    if (!$_SESSION["auth"]) {
        header("location: aut_1.php");
    }

    $auth = $_SESSION["auth"];
    $user = $_SESSION["user"];
    $profile = $_SESSION["profile"];

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
            echo "Bienvenido ".$user." (".$profile.")";
            echo "<br/><a href=\"cierra_sesion.php\">Cerrar sesión</a>";
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
    <h1>Privado 1</h1>
</body>
</html>