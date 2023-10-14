<?php
    /**
     * Script de la Actividad 5
     * 
     * @author Daniel Marín López
     * @version 0.05a
     * 
     * Enunciado:
     * Crear un script para sumar una serie de números. El nº de números a sumar
     * será introducido en un formulario.
     * 
     * Analisis:
     * Tenemos un formulario con un campo que pedirá una cantidad de
     * números (posiblemente aleatorios) a sumar.
     */

    //Cargamos respuesta
    $cont = "";
    $cont_Err = "";

    // Cargamos suma
    $cadena = "";
    $suma = 0;

    $procesaForm = false;
    $error = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["envio1"])) {
            $procesaForm = true;
            $cont = $_POST["numeros"];
            if (!is_numeric($cont) || $cont <= 0) {
                $cont_Err = "Formato incorrecto";
                $error = true;
            }
        }

        if (isset($_POST["envio2"])) {
            $procesaForm = true;
            $cont = $_POST["numeros"];
            for ($i = 1; $i <= $cont; $i++) {
                if (isset($_POST["numero" . $i]) && is_numeric($_POST["numero" . $i])) {
                    $n = intval($_POST["numero" . $i]);
                    $cadena = $cadena.$n;
                    $cadena = ($i == ($cont)) ? $cadena." = " : $cadena."+";
                    $suma += $n;
                }
            }
        }

        if ($error) {
            $procesaForm = false;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Daniel Marín López">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suma de números</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <form method="post" action="">
        <input type="text" name="numeros" value="<?php echo $cont; ?>">
        <span class="error"><?php echo $cont_Err; ?></span>
        <br/>
        <input type="submit" name="envio1" value="Enviar"/>
        
        <?php if ($procesaForm && isset($_POST["envio1"]) && !$error) { ?>
            <br/><br/>
            <?php
            for ($i = 1; $i <= $cont; $i++) {
                echo "<input type=\"text\" name=\"numero" . $i . "\" value=\"" . (isset($_POST["numero" . $i]) ? $_POST["numero" . $i] : "") . "\"><br/>";
            }
            ?>
            <br/>
            <input type="submit" name="envio2" value="Calcular Suma"/>
        <?php } ?>
    </form>

    <?php if ($procesaForm && isset($_POST["envio2"])) { ?>
        <br/>
        <?php 
        echo $cadena;
        echo $suma; ?>
    <?php } ?>
</body>
</html>