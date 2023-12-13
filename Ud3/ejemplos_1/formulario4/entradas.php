<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     * Ejercicio de las entradas
     */

    include "./config/config.php";

    $procesaForm = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["envio"])) {
            $procesaForm = true;
            $nombre = $_POST["first_name"];
            $apellido = $_POST["last_name"];
        }
    }

    $asientos = [];
        
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Daniel Marín López">
    <title>Compra de entradas</title>
</head>
<body>
    <form action="" method="post">
        <?php if ($procesaForm) {?>
            <table border="1px">
                <?php
                    for ($i=1; $i <= N_FILAS; $i++) { 
                        echo "<tr>";
                        for ($j=1; $j < 10; $j++) { 
                            $asientos[$i][$j] = "";
                            $selected = (in_array($j, $asientos[$i])) ? "checked" : "" ;
                            echo "<td><input type=\"checkbox\" name=\"entrada[".$i."][".$j."]\" value=\"".$asientos[$i][$j]."\" $selected></td>";
                        }
                        echo "</tr>";
                    }
                ?>
            </table>
            <input type="submit" name="compra" value="Comprar">
        <?php }?>
    </form>
</body>
</html>