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

    if (!isset($_SESSION["contactos"])) {
        echo "No hay contactos en la agenda.";
    } else {
        $contactos = $_SESSION["contactos"];
        echo "<h3>SU AGENDA ES LA SIGUIENTE</h3>";
        echo "<ul>";
        foreach ($contactos as $contact => $number) {
            echo "<li>".$contact." - ".$number."</li>";
        }
        echo "</ul>";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="cierra_sesion.php">
        <input type="submit" name="cerrar" value="Cerrar Sesión">
    </form>
</body>
</html>