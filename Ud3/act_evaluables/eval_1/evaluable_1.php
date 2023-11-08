<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     * Enunciado: Crear una aplicación que permita mediante un formulario practicar el
     * aprendizaje de los verbos irregulares en inglés.
     * 
     * Análisis: Se pide un formulario de configuración que lleve a otro formulario
     * que sea una tabla con verbos seleccionados de manera aleatoria y que el
     * usuario debe rellenar. Si acierta tendrá un punto, al final se deben ver
     * todos los aciertos al darle al botón de envio.
     * 
     * Este es el formulario de configuración de la tabla de verbos:
     *  DIF = 1 (huecos) => EASY
     *  DIF = 2 (huecos) => NORMAL
     *  DIF = 3 (huecos) => HARD
     * 
     *  N_VERBOS = Nº de verbos que desea el usuario entre 1 y la longitud del array
     */

    include "./config/verbos_cnf.php";

    $DIF=1;
    $N_VERBS=10;
    $DIF_ERR=$N_VERBS_ERR="";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Daniel Marín López">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluable 1</title>
</head>
<body>
    <form method="post" action="eval_tabla.php">
        <label>
            Dificultad: 
                <select name="dificultad">
                    <?php
                        foreach (DIFICULTADES as $value) {
                            $selected = ($DIF == $value["Valor"]) ? "selected" : "" ;
                            echo "<option value=\"" . $value["Valor"] . "\" $selected>" . $value["Literal"] . "</option>";
                        }
                    ?>
                </select>
                <br/>
        </label>
        <br/>
        <label>
            Nº Verbos: <input type="text" name="n_verbos" value="<?php echo $N_VERBS; ?>"><br/>
        </label>
        <br/>
        <input type="submit" name="envio1" value="Enviar"><br/>
    </form>
</body>
</html>