<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */

    include "../config/conifg.php";
    include "../lib/funciones.php";
    
    session_start();
    $total = 0;
    $ultimoPedido = [];
    $procesaForm = false;

    if(!isset($_SESSION["pedido"])){
        $_SESSION["pedido"] = json_encode([]);
    }

    $pedido = json_decode($_SESSION["pedido"], true);

    if (isset($_POST["tramite"])) {
        $procesaForm = true;
        $longitud = count($pedido);
        $ultimoPedido = array_reverse(array_slice($pedido, $longitud - 3, 3));
        setcookie("ultimoPedido", json_encode($ultimoPedido), time()+3600);
        generarComanda($pedido);  
        generarTicket($pedido);
        // header("Location: pizzas.php");
        exit;
    }

    if (isset($_POST["cierre"])) {
        session_unset();
        session_destroy();
        header("Location: pizzas.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Carrito</title>
</head>
<body>
    <h1>FaMia</h1>
    <p><a href="pizzas.php">Pizzas</a> | <a href="bebidas.php">Bebidas</a> | <a href="postres.php">Postres</a> :: Carrito</p>
    <h3>Su carrito</h3>
    <table>
        <tbody>
            <tr><th>Descripción</th><th>Unidades</th><th>Precio</th><th>Total</th></tr>
            <?php
                if ($pedido != null) {
                    foreach ($pedido as $producto) {
                        $tipo = ($producto["tipo"] == "pizza") ? 
                        "pizzas" : (($producto["tipo"] == "bebida") ? 
                        "bebidas" : "postres");
                        $nombre = PRODUCTOS[$tipo][$producto["id"]]["nombre"];
                        $precio = ($producto["tipo"] == "pizza") ? 
                        PRODUCTOS[$tipo][$producto["id"]]["precio"][$producto["tamano"]] : 
                        PRODUCTOS[$tipo][$producto["id"]]["precio"];
                        $cantidad = $producto["cantidad"];
                        $total += $precio*$cantidad;
                        echo "<tr><td>".$nombre."</td><td>".$cantidad."</td><td>".$precio." €</td><td>".$precio*$cantidad." €</td></tr>";
                    }
                }
                echo "<tr><td></td><td></td><td></td><td>".$total." €</td></tr>";
            ?>
        </tbody>
    </table>
    <h3>EL TOTAL A PAGAR DEL PEDIDO ES DE <?php echo $total ?>€.</h3>
    <form action="" method="post">
        <input type="submit" name="tramite" value="Tramitar pedido">
        <input type="submit" name="cierre" value="Cierre de sesión">
    </form>
</body>
</html>