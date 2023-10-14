<?php
    /**
     * Script de la Actividad 5
     * 
     * @author Daniel Marín López
     * @version 0.01a
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

    //Cargamos suma
    $cadena = "";
    $suma = 0;

    $procesaForm = false;
    $error = false;

    echo "<form method=\"post\" action=\"\">";
    echo "<input type=\"text\" name=\"numeros\" value=\"".$cont."\">";
    echo "<span class=\"error\">".$cont_Err."</span>";
    echo "<br/>";
    echo "<input type=\"submit\" name=\"envio1\" value=\"Enviar\"/>";
    echo "</form>";

    if (isset($_POST["envio1"])) {
        $procesaForm = true;
        if ($_POST["numeros"] <= 0) {
            $cont_Err = "Formato incorrecto";
            $error = true;
        } else {
            $cont = $_POST["numeros"];
            echo "<form>";
            for ($i=1; $i <= $cont; $i++) { 
                echo "<br/>";
                echo "<input type=\"text\" name=\"numero".$i."\">";
                // $n = random_int(1, 100);
                // $cadena = $cadena.$n;
                // $cadena = ($i == ($cont-1)) ? $cadena." = " : $cadena."+";
                // $suma += $n;
            }
            echo "<br/>";
            echo"<input type=\"submit\" name=\"envio2\" value=\"Enviar\"/>";
            echo "</form>";

            if (isset($_POST["envio1"]) && isset($_POST["envio2"])) {
                $procesaForm = true;
                for ($i=1; $i <= $cont; $i++) {
                    $suma += intval($_POST["numero".$i]);
                }
                echo "<br/>";
                echo $suma;
            }
        }

        if ($error){
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
    <link rel="stylesheet" href="./css/style.css"></link>
</head>
<body>
</body>
</html>