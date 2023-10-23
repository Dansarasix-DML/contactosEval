<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     */

    include("./config/users.php");

    session_start();
    
    $auth = $_SESSION["auth"];
    $user = $_SESSION["user"];

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
                echo "Bienvenido ".$user;
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
            } else {
                include("./include/pub_nav.php");
            }
        ?>
    </nav>
    <h1>Público 1</h1>
</body>
</html>