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
    $bebidasSeleccion = [];
    $bebidasCant = [];

    if (isset($_POST["envio"])) {
        $procesaForm = true;

        $bebidasSeleccion = $_POST["bebidas"];
        foreach ($bebidasSeleccion as $value) {
            $bebidasCant[] = $_POST["cantidad"][$value];
        }

        $bebidas = array($bebidasSeleccion,$bebidasCant);

        $_SESSION["bebidas"] = json_encode($bebidas);
        
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
    <p><a href="index.php">Pizzas</a> | Bebidas | <a href="postres.php">Postres</a> :: <a href="carrito.php">Carrito</a></p>
    <h3>Productos a escoger</h3>
    <form action="" method="post">
        <?php
            foreach (PRODUCTOS["bebidas"] as $key => $bebida) {
                echo "<img src=\"".$bebida["imagen"]."\" alt=\"".$bebida["nombre"]."\">";
                echo "<br/>";
                echo "<p>".$bebida["nombre"]."</p>";
                echo "<p>Precio: ".$bebida["precio"]."€</p>";
                echo "Cantidad: <select name=\"cantidad[".$key."]\">";
                foreach (CANTIDAD as $value) {
                    echo "<option value=\"" . $value . "\">" . $value . "</option>";
                }
                echo "</select><br/><br/>";
                echo "Selección: <input type=\"checkbox\" name=\"bebidas[]\" value=\"".$key."\"><br/><br/>";

            }
        
        ?>
        <input type="submit" name="envio" value="Añadir al carrito">
    </form>
</body>
</html>