<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     * Enunciado: Crear una aplicación que permita practicar tests de autoescuela.
     * 
     * Análisis: Se pide crear un formulario para seleccionar uno de los tres
     * tests (formularios) y luego decir las respuestas acertadas y si el
     * test ha sido superado.
     * 
     * Este es el formulario de selección del test.
     */

    include("./config/tests_cnf.php");

    $ID = 1;
    
    define("TESTS",array(
        array("Valor"=>$aTests[0]["idTest"],"Literal"=>"TEST A--".$aTests[0]["Permiso"]."---".$aTests[0]["Categoria"]),
        array("Valor"=>$aTests[1]["idTest"],"Literal"=>"TEST B--".$aTests[1]["Permiso"]."---".$aTests[1]["Categoria"]),
        array("Valor"=>$aTests[2]["idTest"],"Literal"=>"TEST C--".$aTests[2]["Permiso"]."---".$aTests[2]["Categoria"])
    ));
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Daniel Marín López">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluable 2</title>
</head>
<body>
    <form method="post" action="eval_cuestionario.php">
        <label>
            SELECCIONE UN TEST:
            <select name="test">
                <?php
                    foreach (TESTS as $value) {
                        $selected = ($ID == $value["Valor"]) ? "selected" : "" ;
                        echo "<option value=\"" . $value["Valor"] . "\" $selected>" . $value["Literal"] . "</option>";
                    }
                ?>
            </select>
        </label>
        <br/>
        <input type="submit" name="envio1" value="Empezar test"><br/>
    </form>
</body>
</html>