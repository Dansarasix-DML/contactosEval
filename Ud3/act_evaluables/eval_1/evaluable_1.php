<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     * Formulario de configuración de la tabla
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