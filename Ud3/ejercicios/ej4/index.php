<?php
    /**
     * Script del Ejercicio 4
     *
     * @author Daniel Marín López
     * @version 0.01a
    */

    include "./lib/lib.php";

    $procesaForm = false;

    if (isset($_GET["numero"])) {
        $numero = $_GET["numero"];
        $procesaForm = true;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Daniel Marín López">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Ejercicio 4</title>
</head>
<body>
    <h1>Ejercicio 4</h1>
    <form action="index.php" method="get">
        <label>
            Número: <input type="text" name="numero" placeholder="Introduce un número">
        </label>
        <input type="submit" name="envio" value="Enviar"><br/><br/>
    </form>
    <?php
        if ($procesaForm && isset($numero)) {
            $suma = suma_recursiva($numero);
            echo "La suma de las cifras de " . $numero . " es " . $suma;
        } else {
            echo '<p>Introduce un número válido</p>';
        }
    ?>
</body>
</html>