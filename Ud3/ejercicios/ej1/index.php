<?php
    /**
     * Script del Ejercicio 1
     *
     * @author Daniel Marín López
     * @version 0.01a
    */

    include "./config/config.php";
    include "./lib/lib.php";

    $procesaForm = false;

    if (isset($_GET["dni_numero"])) {
        $dni = $_GET["dni_numero"];
        $procesaForm = true;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Daniel Marín López">
    <title>Ejercicio 1</title>
</head>
<body>
    <h1>Ejercicio 1: DNI</h1>
    <form action="index.php" method="get">
        <label>
            DNI: <input type="text" name="dni_numero" placeholder="Pon tu número de DNI">
        </label>
        <input type="submit" name="envio" value="Enviar"><br/><br/>
    </form>
    <?php
        if ($procesaForm && isset($dni)) {
            if (verificaDNI($dni)) {
                $letra = procesaDNI($dni, LETRAS);
                echo "Su DNI es: " . $dni . " - " . $letra;
            } else {
                echo "El DNI no es válido";
            }
        }
    ?>
</body>
</html>