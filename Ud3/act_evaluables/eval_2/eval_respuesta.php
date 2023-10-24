<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     * Página donde se muestra el resultado
     */

    include "./config/tests_cnf.php";

    $totalAciertos = 0;

    if (isset($_COOKIE["ID"])) {
        $ID = $_COOKIE["ID"];
    }

    echo "<h2>RESULTADOS DEL TEST ".LETTERS[$ID-1]."</h2>";

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if (isset($_POST["corregir"])) {
            $procesaForm = true;
            $respuestas_usuario = $_POST["opcion"];
            foreach ($respuestas_usuario as $pregunta => $respuesta) {
                $letra = substr($respuesta, 0, 1);
                    if ($letra == $aTests[$ID-1]["Corrector"][$pregunta]){
                        $totalAciertos++;
                    }
            }
        }
    }

    echo "<h2>Total de aciertos: ".$totalAciertos."/10</h2>";

    if ($totalAciertos >= 5) {
        echo "<h2>TEST SUPERADO ✅</h2>";
    } else {
        echo "<h2>TEST NO SUPERADO ❌</h2>";
    }

    if (isset($_POST["volver"])) {
        header("location: evaluable_2.php");
    }

    echo "<form method=\"post\" action=\"\">";
    echo "<br/><input type=\"submit\" name=\"volver\" value=\"Volver al menú\">";
    echo "<form>";

?>