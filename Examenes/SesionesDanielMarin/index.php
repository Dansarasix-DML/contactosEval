<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */

    include "./config/conifg.php";

    session_start();

    if(!isset($_SESSION["pizzas"])){
        $_SESSION["pizzas"] = json_encode([]);
    }

    $procesaForm = false;
    $pizzasSeleccion = [];
    $pizzasTam = [];
    $pizzasCant = [];

    if (isset($_POST["envio"])) {
        $procesaForm = true;

        $pizzasSeleccion = $_POST["pizzas"];
        foreach ($pizzasSeleccion as $value) {
            $pizzasTam[] = $_POST["tamano"][$value];
            $pizzasCant[] = $_POST["cantidad"][$value];
        }

        $pizzas = array($pizzasSeleccion,$pizzasTam,$pizzasCant);

        $_SESSION["pizzas"] = json_encode($pizzas);
        
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
    <p>Pizzas | <a href="bebidas.php">Bebidas</a> | <a href="postres.php">Postres</a> :: <a href="carrito.php">Carrito</a></p>
    <h3>Productos a escoger</h3>
    <form action="" method="post">
        <?php
            foreach (PRODUCTOS["pizzas"] as $key => $pizza) {
                echo "<img src=\"".$pizza["imagen"]."\" alt=\"".$pizza["nombre"]."\">";
                echo "<br/>";
                echo "<p>".$pizza["nombre"]."</p>";
                foreach ($pizza["precio"] as $tamano => $precio) {
                    echo "<p>Precio del tamaño ".$tamano." => ".$precio."€</p>";
                }
                echo "Tamaño: <select name=\"tamano[".$key."]\">";
                foreach ($pizza["precio"] as $tamano => $precio) {
                    echo "<option value=\"" . $tamano . "\">" . $tamano . "</option>";
                }
                echo "</select><br/><br/>";
                echo "Cantidad: <select name=\"cantidad[".$key."]\">";
                foreach (CANTIDAD as $value) {
                    echo "<option value=\"" . $value . "\">" . $value . "</option>";
                }
                echo "</select><br/><br/>";
                $selectedPizza = (in_array($key, $pizzasSeleccion)) ? "checked" : "" ;
                echo "Selección: <input type=\"checkbox\" name=\"pizzas[]\" value=\"".$key."\" $selectedPizza><br/><br/>";

            }        
        ?>
        <input type="submit" name="envio" value="Añadir al carrito">
    </form>
    <footer>
        <hr>
        <?php
            echo "Tú último pedido: ";
            $ultimoPedido = json_decode($_COOKIE["ultimoPedido"], true);

            foreach ($ultimoPedido as $key => $value) {
                if (($key + 1) == count($ultimoPedido)) {
                    echo $value;
                }
                else {echo $value . " | ";}
            }
        ?>
    </footer>
</body>
</html>