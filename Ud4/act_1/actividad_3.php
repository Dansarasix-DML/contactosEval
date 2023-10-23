<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     * Actividad 3
     */

    //Cargamos variables
    $user=$pass="";

    $procesaForm = false;

    if (isset($_POST["enviar"])) {
        //procesamos formulario
        $procesaForm = true;
        setcookie("user", $_POST["usuario"], time()+3600);
        setcookie("pass", $_POST["passwd"], time()+3600);
    } 

    if (isset($_POST["borrar"])) {
        setcookie("user", $_POST["usuario"], time()-3600);
        setcookie("pass", $_POST["passwd"], time()-3600);
    }

    if (isset($_COOKIE["user"])) {
        $user = $_COOKIE["user"];
        $pass = $_COOKIE["pass"];
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 3</title>
</head>
<body>
    <form method="post" action="">
        <label>Usuario: <input type="text" name="usuario" value="<?php echo $user ?>"></label>
        <br/>
        <label>Contraseña: <input type="password" name="passwd" value="<?php echo $pass ?>"></label>
        <br/>
        <label>
            <input type="submit" name="enviar" value="Enviar">
            <input type="submit" name="borrar" value="Borrar">
        </label>
    </form>
</body>
</html>