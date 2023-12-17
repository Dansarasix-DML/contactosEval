<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */

    include "./config/conifg.php";

    session_start();
    if(!isset($_SESSION["bebidas"])){
        $_SESSION["bebidas"] = json_encode([]);
    }

    $procesaForm = false;
    $postresSeleccion = [];
    $postresCant = [];

    if (isset($_POST["envio"])) {
        $procesaForm = true;

        $postresSeleccion = $_POST["postres"];
        foreach ($postresSeleccion as $value) {
            $postresCant[] = $_POST["cantidad"][$value];
        }

        $postres = array($postresSeleccion,$postresCant);

        $_SESSION["postres"] = json_encode($postres);
        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Daniel Marín López">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>FaMia: Inicio</title>
</head>
<body>
    <h1>FaMia</h1>
    <p><a href="index.php">Pizzas</a> | <a href="bebidas.php">Bebidas</a> | Postres :: <a href="carrito.php">Carrito</a></p>
    <h3>Productos a escoger</h3>
    <form action="" method="post">
        <?php
            foreach (PRODUCTOS["postres"] as $key => $postre) {
                echo "<img src=\"".$postre["imagen"]."\" alt=\"".$postre["nombre"]."\">";
                echo "<br/>";
                echo "<p>".$postre["nombre"]."</p>";
                echo "<p>Precio: ".$postre["precio"]."€</p>";
                echo "Cantidad: <select name=\"cantidad[".$key."]\">";
                foreach (CANTIDAD as $value) {
                    echo "<option value=\"" . $value . "\">" . $value . "</option>";
                }
                echo "</select><br/><br/>";
                echo "Selección: <input type=\"checkbox\" name=\"postres[]\" value=\"".$key."\"><br/><br/>";

            }        
        ?>
        <input type="submit" name="envio" value="Añadir al carrito">
    </form>
</body>
</html>