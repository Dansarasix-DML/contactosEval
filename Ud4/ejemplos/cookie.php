<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     */


    //Cargamos variables
    $user=$pass="";

    $procesaForm = false;

    if (isset($_POST["enviar"])) {
        //procesamos formulario
        $procesaForm = true;
        //comprobamos que recordar está activo
        if (isset($_POST["recordar"]) && $_POST["recordar"] == "on") {
            //creamos cookies
            setcookie("user", $_POST["usuario"], time()+3600);
            setcookie("pass", $_POST["passwd"], time()+3600);
        }
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
    <title>Cookies</title>
</head>
<body>
    <form method="post" action="">
        <label>Usuario: <input type="text" name="usuario" value="<?php echo $user ?>"></label>
        <br/>
        <label>Contraseña: <input type="password" name="passwd" value="<?php echo $pass ?>"></label>
        <br/>
        <label><input type="checkbox" name="recordar">Recordar</label>
        <br/>
        <label><input type="submit" name="enviar" value="Enviar"></label>
    </form>
</body>
</html>