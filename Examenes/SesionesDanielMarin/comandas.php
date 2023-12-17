<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */

    include "./config/users.php";

    session_start();
    //Cargamos variables
    $user=$pass="";


    if (!isset($_SESSION["auth"])) {
        $_SESSION["auth"] = false;
        $_SESSION["user"] = "Invitado";

    }  

    $auth = $_SESSION["auth"];
    $user = $_SESSION["user"];

    $procesaForm = false;

    if (isset($_POST["enviar"])) {
        //procesamos formulario
        $procesaForm = true;
        $_SESSION["user"] = $_POST["usuario"];
        $_SESSION["passwd"] = $_POST["passwd"];
    }   

    // echo var_dump($_SESSION);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Daniel Marín López">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FaMia: Comandas</title>
</head>
<body>
    <h1>FaMia</h1>
    <div id="sesion">
        <?php
            if ($auth) {
                echo "Bienvenido ".$user;
                echo "<br/><a href=\"cierra_sesion.php\">Cerrar sesión</a>";
                echo "<hr/>";
                echo "<h3>Comandas</h3>";
            } else {
                echo "Por favor, identifiquese:<br/><br/>";
                include("./include/login_form.php");
            }
            
        ?>
    </div>
</body>
</html>