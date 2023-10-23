<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     * Actividad 1
     */
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Daniel Marín López">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 1</title>
</head>
<body>
    <form method="post">
        <input type="submit" name="crear" value="Crear cookie">
        <br/>
        <?php
            if (isset($_POST["crear"])) {
                setcookie("cookie_temp", "Soy temporal", time()+60);
                echo "Cookie creada";
            }
        ?>
        <br/>
        <input type="submit" name="status" value="Status de la cookie">
        <br/>
        <?php
            if (isset($_POST["status"])) {
                if (isset($_COOKIE["cookie_temp"])) {
                    echo $_COOKIE["cookie_temp"]." => OK";
                } else {
                    echo "Error de cookie";
                }
                
            }
        ?>
        <br/>
        <input type="submit" name="eliminar" value="Eliminar cookie">
        <br/>
        <?php
            if (isset($_POST["eliminar"])) {
                setcookie("cookie_temp", "Soy temporal", time()-60);
                echo "Cookie eliminada";
                
            }
        ?>
    </form>
    
</body>
</html>