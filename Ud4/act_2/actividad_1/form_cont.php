<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     * Enunciado:
     * Crear una pequeña aplicación para gestionar una agenda de contactos.
     * 
     * Análisis:
     * Se pueden guardar los contactos en un array indexado con arrays que tienen
     * el nombre y teléfono del contacto. Este array se asignará al usuario que haya 
     * iniciado sesión.
     */

    session_start();

    if (!isset($_SESSION["user"])) {
        $_SESSION["user"] = $_COOKIE["user"];
    }
    
    echo "Sesión iniciada con el siguiente usuario: ".$_SESSION["user"];
    echo "<br/>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Daniel Marín López">
    <title>Añadir Contacto</title>
</head>
<body>
    <form method="post" action="">
        <label>
            NOMBRE: <input type="text" name="name">
        </label><br/>
        <label>
            NÚMERO: <input type="tel" name="number">
        </label><br/>
        <label>
            <input type="submit" name="anadir" value="Añadir contacto">
        </label>
    </form>
    <?php
        if (isset($_POST["anadir"])) {
            if (isset($_POST["name"]) && isset($_POST["number"])) {
                $name = $_POST["name"];
                $number = $_POST["number"];
                $_SESSION["contactos"][$name] = $number;
                echo "Contacto añadido: ".$name." => ".$number;
            }
        }
    ?>
    <form method="post" action="mostrar_agenda.php">
        <input type="submit" name="mostar" value="Mostrar agenda">
    </form>
</body>
</html>