<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */

    include "../config/conifg.php";

    session_start();
    $procesaForm = false;

    if(!isset($_SESSION["pedido"])){
        $_SESSION["pedido"] = json_encode([]);
    }

    if (isset($_POST["envio"])) {
        $procesaForm = true;
        $pedido = json_decode($_SESSION["pedido"], true);

        $id = $_POST["key"];
        $tamano = $_POST["tamano"];
        $cantidad = $_POST["cantidad"];

        $pedido[] = array(
            "id" => $id, 
            "tipo" => "pizza",
            "tamano" => $tamano, 
            "cantidad" => $cantidad);
        
        $_SESSION["pedido"] = json_encode($pedido);
        
    }
    
    // echo "<p>".var_dump($_SESSION["pizzas"])."</p>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>faMia: Inicio</title>
</head>
<body>
    <h1>FaMia</h1>
    <p>Pizzas | <a href="bebidas.php">Bebidas</a> | <a href="postres.php">Postres</a> :: <a href="carrito.php">Carrito</a></p>
    <h3>Productos a escoger</h3>
    <?php
        foreach (PRODUCTOS["pizzas"] as $key => $pizza) {?>
            <div>
                <form action="" method="post">
                    <?php
                        // $_SESSION["currentKey"] = $key;
                        echo "<input type=\"hidden\" name=\"key\" value=\"" . $key . "\">";
                        echo "<img src=\"".$pizza["imagen"]."\" alt=\"".$pizza["nombre"]."\">";
                        echo "<br/>";
                        echo "<p>".$pizza["nombre"]."</p>";
                        echo "Tamaño: <select name=\"tamano\">";
                        foreach ($pizza["precio"] as $tamano => $precio) {
                            echo "<option value=\"" . $tamano . "\">" . $tamano . ": " . $precio . "€</option>";
                        }
                        echo "</select><br/><br/>";
                        echo "Cantidad: <select name=\"cantidad\">";
                        foreach (CANTIDAD as $value) {
                            echo "<option value=\"" . $value . "\">" . $value . "</option>";
                        }
                        echo "</select><br/><br/>";
                    ?>
                    <input type="submit" name="envio" value="Añadir al carrito">
                </form>
            </div>
        <?php }    
    ?>
    <footer>
        <hr>
        <?php
            echo "Recomendaciones:<br/>";
            if (isset($_COOKIE["ultimoPedido"])) {
                $ultimoPedido = json_decode($_COOKIE["ultimoPedido"], true);        
                if ($ultimoPedido != null) {
                    foreach ($ultimoPedido as $producto) {
                        $tipo = ($producto["tipo"] == "pizza") ? 
                        "pizzas" : (($producto["tipo"] == "bebida") ? 
                        "bebidas" : "postres"); 
                        $nombre = PRODUCTOS[$tipo][$producto["id"]]["nombre"];               
                        $imagen = PRODUCTOS[$tipo][$producto["id"]]["imagen"];               
                    ?>
                        <div>
                            <?php
                                echo "<img src=\"".$imagen."\" alt=\"".$nombre."\">";
                                echo "<br/>";
                                echo "<p>".$nombre."</p>";
                            ?>
                        </div>
                    <?php }
                }        
            }
        ?>
    </footer>
</body>
</html>