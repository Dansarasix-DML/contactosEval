<?php
    /**
     * Script del Ejercicio 2
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
    <title>Ejercicio 2</title>
</head>
<body>
    <h1>Ejercicio 2</h1>
    <form action="index.php" method="get">
        <label>
            Número a factorizar: <input type="text" name="numero" placeholder="Pon un número a factorizar">
        </label>
        <input type="submit" name="envio" value="Enviar"><br/><br/>
    </form>
    <?php
        if ($procesaForm && isset($numero)) {
            $factores = factorizar($numero);

            echo '<table>';

            foreach ($factores as $factor) {
                echo '<tr>';
                echo '<td class="numero">' . $numero . '</td>';
                echo '<td class="factor">' . $factor . '</td>';
                echo '</tr>';
                $numero /= $factor;
            }

            echo '<tr><td class="last">1</td><td></td></tr>'; // Última fila con 1
            echo '</table>';
        } else {
            echo '<p>Introduce un número válido</p>';
        }
    ?>
</body>
</html>