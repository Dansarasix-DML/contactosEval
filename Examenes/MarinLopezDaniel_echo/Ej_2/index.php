<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * @DNI: 31880329
     */

    include "../config/config.php";

    $idiomasSeleccion = [];
    $procesaForm = false;
    $procesaForm2 = false;
    $nombre = "";
    $opcion = "";
    $totalAciertos = 0;
    $aciertos = [];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["envio"])) {
            $procesaForm = true;
            if (isset($_POST["nombre"])) {
                $nombre = $_POST["nombre"];
            }

            if (isset($_POST["idioma"])) {
                $idiomasSeleccion = $_POST["idioma"];
            }
        }

        if (isset($_POST["envio2"])) {
            $procesaForm2 = true;
            foreach ($_POST["respuestas"] as $key1 => $value) {
                $nombre = $key1;
                foreach ($value as $key2 => $value2) {
                    $idioms = $key2;
                    $respuestas_usuario = $_POST["respuestas"][$key1][$key2];
                }
            }
            foreach ($respuestas_usuario as $pregunta => $respuesta) {
                $cond = (gettype($test[$pregunta]["Respuesta"]) != "array") ?
                $respuesta == $test[$pregunta]["Respuesta"] : 
                in_array($respuesta ,$test[$pregunta]["Respuesta"]) ;
                $RESP = (gettype($test[$pregunta]["Respuesta"]) == "array") ? 
                implode(", ", $test[$pregunta]["Respuesta"]) : 
                $test[$pregunta]["Respuesta"] ;
                if ($cond){
                    $totalAciertos = $totalAciertos + $test[$pregunta]["Acierto"];
                    $aciertos[] = $respuesta . " (acierto ✅)";
                } else {
                    $totalAciertos = $totalAciertos + $test[$pregunta]["Fallo"];
                    $aciertos[] = $respuesta . " (fallo ❌) La respuesta es: " . $RESP;
                }
            }

        }

        if (isset($_POST["volver"])){
            header("location: index.php");
        }        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Daniel Marín López">
    <title>Test</title>
</head>
<body>
    <h1>DANIEL MARÍN LÓPEZ, PASSWORD: ECHO</h1>
    <?php if ($procesaForm) {?>
        <p>NOMBRE: <?php echo $nombre ?></p>
        <p>IDIOMAS: <?php echo implode(", ", $idiomasSeleccion) ?></p>

        <?php
            echo "<form action=\"\" method=\"post\">";
            foreach ($test as $num => $pregunta) {
                $tipo = ($pregunta["Tipo"] == "text") ? "text" : "radio";
                echo $pregunta["pregunta"] . "<br/><br/>";
                if ($tipo == "radio") {
                    foreach ($pregunta["Opciones"] as $key => $value) {
                        $check="";
                        if ($opcion == $value) {$check = "checked";}
                            echo "<input type=\"radio\" name=\"respuestas[".$nombre."][".implode(", ", $idiomasSeleccion)."][".$num."]\" value=\"$value\" $check>$value";
                        echo "<br/>";
                    }
                } else {
                    echo "<input type=\"text\" name=\"respuestas[".$nombre."][".implode(", ", $idiomasSeleccion)."][".$num."]\">";
                }
                echo "<br/><br/>";
            }
            echo "<input type=\"submit\" name=\"envio2\" value=\"Corregir\">";
            echo "</form>";
        
        ?>
    <?php } else if($procesaForm2) {?>
        <p>NOMBRE: <?php echo $nombre ?></p>
        <p>IDIOMAS: <?php echo $idioms ?></p>
        <p>RESULTADO: <?php echo $totalAciertos ?></p>

        <?php
            foreach ($aciertos as $key => $value) {
                if ($key == count($aciertos)-1) {
                    echo ($key+1).". ".$value;
                } else {
                    echo ($key+1).". ".$value.", ";
                }
                echo "<br/>";
            }
        ?>
        <br/><br/>
        <form action="" method="post">
            <input type="submit" name="volver" value="Volver">
        </form>
    <?php } else {?>
        <form action="" method="post">
            <label>
                NOMBRE: <input type="text" name="nombre" value="<?php echo $nombre ?>">
            </label>
            <br/><br/>
            <label>
                IDIOMAS:<br/>
                <?php
                    foreach ($idiomas as $value) {
                        $selected = (in_array($value, $idiomasSeleccion)) ? "checked" : "" ;
                        echo "<input type=\"checkbox\" name=\"idioma[]\" value=\"".$value."\" $selected>" . $value;
                    }
                ?>
            </label>
            <br/><br/>
            <input type="submit" name="envio" value="Enviar">
        </form>
    <?php }?>
</body>
</html>