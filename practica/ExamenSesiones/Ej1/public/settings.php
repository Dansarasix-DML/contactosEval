<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     */

    include "../config/config.php";  
    $noticiasSeleccion = [];
    $procesaForm = false;

    if (isset($_POST["envio"])) {
        $procesaForm = true;
        setcookie("noticiasSeleccion", json_encode($_POST["noticia"]), time()+3600);
        header("Location: index.php");
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
    <p>Preferencias. <a href="index.php">Salir</a></p>
    <hr/>
    <form action="" method="post">
        <?php
            foreach ($noticias as $key => $value) {
                $selected = (in_array($key, $noticiasSeleccion)) ? "checked" : "" ;
                echo "<input type=\"checkbox\" name=\"noticia[]\" value=\"".$key."\" $selected>" . $key;
                echo "<br/>";
            }        
        ?>
        <input type="submit" name="envio" value="Enviar">
    </form>
</body>
</html>