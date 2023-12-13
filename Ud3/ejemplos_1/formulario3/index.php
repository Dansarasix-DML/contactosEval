<?php
    /**
     * @author Daniel Marñin López
     * @version 0.01a
     * 
     */

    include "./config/config.php";

    $procesaForm = false;
    $procesaForm2 = false;
    $opcion = "";
    $ID = 0;
    $opciones = array();
    $totalAciertos = 0;
    $aciertos = array();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST["envio1"])) {
            $procesaForm = true;
            $ID=intval($_POST["test"]);
        }

        if (isset($_POST["corregir"])) {
            $procesaForm2 = true;
            foreach ($_POST["opcion"] as $key => $value) {
                $ID = $key;
                $respuestas_usuario = $_POST["opcion"][$ID];
            };
            foreach ($respuestas_usuario as $pregunta => $respuesta) {
                $letra = substr($respuesta, 0, 1);
                if ($letra == $preguntas[$ID]["Corrector"][$pregunta]){
                    $totalAciertos++;
                    $aciertos[] = $letra." (acierto ✅)";
                } else {
                    $aciertos[] = $letra." (fallo ❌)";
                }
            }
        }

        if (isset($_POST["volver"])) {
            header("location: index.php");
        }
        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Daniel Marín López">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    <?php if ($procesaForm) { ?>
        <form method="post" action="">
            <?php
                foreach ($preguntas[$ID-1]["Preguntas"] as $key1 => $value) {
                    echo "<label>";
                    echo $preguntas[$ID-1]["Preguntas"][$key1]["Pregunta"]."</br>";
                    if (isset($tests_imgs[$ID-1][$key1])) {
                        echo "<img src=\"".$tests_imgs[$ID-1][$key1]."\"></br>";
                    }
                    foreach ($preguntas[$ID-1]["Preguntas"][$key1]["respuestas"] as $key2 => $value) {
                        $check="";
                        if ($opcion == $value) {$check = "checked";}
                            echo "<input type=\"radio\" name=\"opcion[".($ID-1)."][".$key1."]\" value=\"$value\" $check>$value";
                            echo "</br>";
                    }
                    echo "</label><br/>";
                }
            ?>
            </br>
            <input type="submit" name="corregir" value="Corregir test"><br/>
    <?php } else if ($procesaForm2){
        echo "<h2>Total de aciertos: ".$totalAciertos."/10</h2>";

        foreach ($aciertos as $key => $value) {
            if ($key == count($aciertos)-1) {
                echo ($key+1).". ".$value;
            } else {
                echo ($key+1).". ".$value.", ";
            }
        }

        if ($totalAciertos >= 5) {
            echo "<h2>TEST SUPERADO ✅</h2>";
        } else {
            echo "<h2>TEST NO SUPERADO ❌</h2>";
        }

        echo "<form method=\"post\" action=\"\">";
        echo "<br/><input type=\"submit\" name=\"volver\" value=\"Volver al menú\">";
        echo "<form>";
    } else { ?>
        <form action="" method="post">
            <label>
                SELECCIONE UN TEST:<br/>
                <select name="test">
                    <?php
                        foreach (TESTS as $value) {
                            $selected = ($ID == $value["Valor"]) ? "selected" : "" ;
                            echo "<option value=\"" . $value["Valor"] . "\" $selected>" . $value["Literal"] . "</option>";
                        }
                    ?>
                </select>
                <br/><br/>
                <input type="submit" name="envio1" value="Enviar">
            </label>
        </form>
    <?php } ?>
</body>
</html>