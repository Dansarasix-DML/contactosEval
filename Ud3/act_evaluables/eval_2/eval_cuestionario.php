<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     * Formulario de test
     */

    include "./config/tests_cnf.php";

    $procesaForm = false;
    $opcion = "";
    $ID = 0;
    $opciones = array();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST["envio1"])) {
            $procesaForm = true;

            $ID=intval($_POST["test"]);
            setcookie("ID", intval($_POST["test"]), time()+3600);
        }
    }    

    echo "<h2>TEST ".LETTERS[$ID-1]."</h2>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Daniel Marín López">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
</head>
<body>
    <form method="post" action="eval_respuesta.php">
        <?php
            foreach ($aTests[$ID-1]["Preguntas"] as $key1 => $value) {
                echo "<label>";
                echo $aTests[$ID-1]["Preguntas"][$key1]["Pregunta"]."</br>";
                if (isset($tests_imgs[$ID-1][$key1])) {
                    echo "<img src=\"".$tests_imgs[$ID-1][$key1]."\"></br>";
                }
                foreach ($aTests[$ID-1]["Preguntas"][$key1]["respuestas"] as $key2 => $value) {
                    $check="";
                    if ($opcion == $value) {$check = "checked";}
                        echo "<input type=\"radio\" name=\"opcion[".$key1."]\" value=\"$value\" $check>$value";
                        echo "</br>";
                }
                echo "</label>";
            }
        ?>
        </br>
        <input type="submit" name="corregir" value="Corregir test"><br/>
    </form>
</body>
</html>