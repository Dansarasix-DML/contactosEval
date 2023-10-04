<?php
    /**
     * Script de Formulario
     *
     * @author Daniel Marín López
     * @version 0.01a
     * 
    */

    $info = array("nombre", "apellidos");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario_Alumnos</title>
</head>
<body>
    <form action="formulario.php" method="post">
        <?php
            foreach ($info as $key => $value) {
                echo "<input type=\"text\" required name=\"" . $value . "\" placeholder=\"" . $value . "\"/>";
                echo "<br/>";
            }
        ?>
        <button type="submit" name="enviar">Enviar</button>
    </form>
</body>
</html>