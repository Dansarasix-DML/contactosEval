<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */

    include "../config/users.php";
    include "../lib/funciones.php";

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
    <link rel="stylesheet" href="../css/comandStyle.css">
    <title>FaMia: Comandas</title>
</head>
<body>
    <h1>FaMia</h1>
    <div id="sesion">
        <?php
            if ($auth) {
                $comandas_pendientes = [];
                echo "Bienvenido ".$user;
                echo "<br/><a href=\"cierra_sesion.php\">Cerrar sesión</a>";
                echo "<hr/>";
                echo "<h3>Comandas</h3>";
                $directorio = "../files/";
                $archivos = scandir($directorio);

                echo "<ul>";
                foreach ($archivos as $archivo) {
                    if ($archivo != "." && $archivo != "..") {
                        $rutaArchivo = $directorio . "/" . $archivo;

                        $handle = fopen($rutaArchivo, "r");

                        $primeraLinea = fgets($handle);

                        fclose($handle);

                        $nopendiente = (contienePalabra($archivo, "elaborada") ? true : false);
                        $style = $nopendiente ? "elaborada" : "pendiente";
                        echo "<li class=\"{$style}\"><form method=\"post\" action=\"comanForm.php\">";
                        echo str_replace('-', '', $primeraLinea);;
                        if (!$nopendiente) {
                            echo "<input type=\"hidden\" name=\"archivo\" value=\"$archivo\">";
                            echo "<input class=\"boton\" type=\"submit\" name=\"elaborar\" value=\"Realizar comanda\">";
                        } else {
                            echo "<input type=\"hidden\" name=\"archivo\" value=\"$archivo\">";
                            echo "<input class=\"boton\" type=\"submit\" name=\"borrar\" value=\"Borrar comanda\">";
                        }
                        echo "</form></li>";
                    }
                }
                echo "</ul>" ?>

            <?php } else {
                echo "Por favor, identifiquese:<br/><br/>";
                include("../include/login_form.php");
            }
            
        ?>
    </div>
</body>
</html>