<?php
    /**
     * @author Daniel Marñin López
     * @version 0.01a
     * 
     * Desarrolla una aplicación que genere un script para la creación de usuarios a partir
     * de un fichero.
     */

    include "./config/config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Daniel Marín López">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subida de archivos</title>
</head>
<body>
    <h1>Creación de usuarios</h1>
    <form method="post" action="upload_file.php" enctype="multipart/form-data">
        <label>
            Seleccione una opción: 
                <select name="tipo">
                    <?php
                        foreach (OPCIONES as $value) {
                            $selected = ($DIF == $value["Valor"]) ? "selected" : "" ;
                            echo "<option value=\"" . $value["Valor"] . "\" $selected>" . $value["Literal"] . "</option>";
                        }
                    ?>
                </select>
        </label>
        <br/><br/>
        <label>
            Seleccione un curso: 
                <select name="curso">
                    <?php
                        foreach (CURSOS as $value) {
                            $selected = ($DIF == $value["Valor"]) ? "selected" : "" ;
                            echo "<option value=\"" . $value["Valor"] . "\" $selected>" . $value["Literal"] . "</option>";
                        }
                    ?>
                </select>
        </label>
        <br/><br/>
        <label for="file">
            Fichero: <input type="file" name="file" id="file">
        </label>
        <br/><br/>
        <input type="submit" name="envio" value="Descargar">
    </form>
</body>
</html>