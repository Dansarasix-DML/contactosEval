<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * @DNI: 31880329
     */

    // include "../config/config.php";
    include "./lib/lib.php";

    $procesaForm = false;

    if (isset($_GET["dni"])) {
        $dni = $_GET["dni"];
        $procesaForm = true;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Daniel Marín López">
    <title>Ejercicio 0</title>
</head>
<body>
    <h1>DANIEL MARÍN LÓPEZ, PASSWORD: ECHO</h1>
    <form action="" method="get">
        <label>
            Introduce el DNI: <input type="text" name="dni">
        </label>
        <br/><br/>
        <input type="submit" name="envio" value="Enviar">
    </form>
    <br/>
    <?php
        if ($procesaForm && isset($dni)) {
            if (verificaDNI($dni)) {
                echo "Su password es: <b>" . generarPasswd($dni) . "</b>";
            } else {
                echo "DNI no válido";
            }
            
        }
    
    ?>
    <br/><br/>
    <footer>DANIEL MARÍN LÓPEZ, PASSWORD: ECHO</footer>
</body>
</html>