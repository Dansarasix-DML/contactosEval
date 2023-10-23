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

    //Cargamos variables
    session_start();
    $user=$pass="";

    $procesaForm = false;

    if (isset($_POST["enviar"])) {
        //procesamos formulario
        $procesaForm = true;
        $_SESSION["user"] = $_POST["usuario"];
        $_SESSION["pass"] = $_POST["passwd"];
        //comprobamos que recordar está activo
        if (isset($_POST["recordar"]) && $_POST["recordar"] == "on") {
            $user = $_SESSION["user"];
            $pass = $_SESSION["pass"];
        }

        header ("Location: form_cont.php");

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Daniel Marín López">
    <title>Actividad 1</title>
</head>
<body>
    <form method="post" action="">
        <label>Usuario: <input type="text" name="usuario" value="<?php echo $user ?>"></label>
        <br/>
        <label>Contraseña: <input type="password" name="passwd" value="<?php echo $pass ?>"></label>
        <br/>
        <label><input type="checkbox" name="recordar">Recordar</label>
        <br/>
        <label><input type="submit" name="enviar" value="Iniciar Sesión"></label>
    </form>
</body>
</html>