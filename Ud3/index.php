<?php
$lsprocesaFormulario1 = false;
$pagina1 = false;
$sumar = null;
$numeroAsignado = $numeroAsignado2 = $numeroAsignado3 = $numeroAsignado4 = $numeroAsignado5 = 0;
$numerosAsignados = [];

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $numeroAsignado = test_input($_POST['numero']);
    $enviar = isset($_POST['enviar']); // Verificar si se envió "enviar"

    if ($enviar) {
        $pagina1 = true;
    }

    $sumar = isset($_POST['sumar']); // Verificar si se envió "sumar"

    if ($sumar) {
        for ($i = 1; $i <= $numeroAsignado; $i++) {
            $numerosAsignados[] = test_input($_POST['numero' . $i]);
        }
        $pagina1 = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Sumas</title>
</head>

<body>
    <?php if (!$pagina1) { ?>
        <form method="POST" action="">
            <?php
            echo "<input type='number' name='numero'> <br/>";
            echo '<input type="submit" name="enviar" value="Enviar"><br/>';
            ?>
        </form>
    <?php } elseif ($pagina1 && !$sumar) { ?>
        <form method="POST" action="">
            <?php
            echo "<input type='number' name='numero' value='" . $numeroAsignado . "'> <br/><br/><br/>";
            for ($i = 1; $i <= $numeroAsignado; $i++) {
                echo "<input type='number' name='numero" . $i . "'> <br/>";
                echo "+<br/>";
            }
            echo '<input type="submit" name="sumar" value="Sumar"><br/>';
            ?>
        </form>
    <?php } elseif ($sumar) { ?>
        <form method='POST' action="">
            <?php
            echo "<input type='number' name='numero' value='" . $numeroAsignado . "'> <br/><br/><br/>";

            for ($i = 0; $i < count($numerosAsignados); $i++) {
                echo "<input type='number' name='numero" . ($i + 1) . "' value='" . $numerosAsignados[$i] . "'> <br/>";
                echo "+<br/>";
            }
            echo '<input type="submit" name="sumar" value="Sumar"><br/>';

            $sumatorio = array_sum($numerosAsignados);
            echo "<h1>Resultado del formulario</h1>";
            echo "<h3> La suma de los números es: " . $sumatorio . " </h3>";
            ?>
        </form>
    <?php } ?>
</body>
</html>
