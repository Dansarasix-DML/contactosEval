<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */

    include "./config/conifg.php";

    session_start();
    $total = 0;
    $ultimoPedido = [];
    $procesaForm = false;

    if(!isset($_SESSION["pizzas"])){
        $_SESSION["pizzas"] = json_encode(null);
    }

    if(!isset($_SESSION["bebidas"])){
        $_SESSION["bebidas"] = json_encode(null);
    }

    if(!isset($_SESSION["postres"])){
        $_SESSION["postres"] = json_encode(null);
    }

    $pizzas = json_decode($_SESSION["pizzas"], true);
    $bebidas = json_decode($_SESSION["bebidas"], true);
    $postres = json_decode($_SESSION["postres"], true);

    if (isset($_POST["tramite"])) {
        $procesaForm = true;
        foreach ($pizzas[0] as $pizza) {
            $nombre = PRODUCTOS["pizzas"][$pizza]["nombre"];
            $ultimoPedido[] = $nombre;
        }
        setcookie("ultimoPedido", json_encode($ultimoPedido), time()+3600);
        header("Location: index.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Daniel Marín López">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FaMia: Carrito</title>
</head>
<body>
    <h1>FaMia</h1>
    <p><a href="index.php">Pizzas</a> | <a href="bebidas.php">Bebidas</a> | <a href="postres.php">Postres</a> :: Carrito</p>
    <h3>Su carrito</h3>
    <p>Descripción | Unidades | Precio | Total</p>
    <hr/>
    <form action="" method="post">
        <?php
            echo "<h4>Pizzas</h4>";
            if ($pizzas == null){
                echo "<br/>";
            }
            else{
                foreach ($pizzas[0] as $key => $pizza) {
                    $nombre = PRODUCTOS["pizzas"][$pizza]["nombre"];
                    $tamano = $pizzas[1][$key];
                    $cantidad = $pizzas[2][$key];
                    $precio = PRODUCTOS["pizzas"][$pizza]["precio"][$tamano];
                    echo "<p>".$nombre." | Unidades: ".$cantidad." | Precio: ".$precio."€ | Total: ".$precio*$cantidad."€</p>";
                    $total = $total + ($precio*$cantidad);
                }
            }

            echo "<hr/>";
            echo "<h4>Bebidas</h4>";

            if ($bebidas == null) {
                echo "<br/>";
            } else {
                foreach ($bebidas[0] as $key => $bebida) {
                    $nombre = PRODUCTOS["bebidas"][$bebida]["nombre"];
                    $cantidad = $bebidas[1][$key];
                    $precio = PRODUCTOS["bebidas"][$bebida]["precio"];
                    echo "<p>".$nombre." | Unidades: ".$cantidad." | Precio: ".$precio."€ | Total: ".$precio*$cantidad."€</p>";
                    $total = $total + ($precio*$cantidad);
                }
            }
            

            echo "<hr/>";
            echo "<h4>Postres</h4>";

            if ($postres == null) {
                echo "<br/>";
            } else {
                foreach ($postres[0] as $key => $postre) {
                    $nombre = PRODUCTOS["postres"][$postre]["nombre"];
                    $cantidad = $postres[1][$key];
                    $precio = PRODUCTOS["postres"][$postre]["precio"];
                    echo "<p>".$nombre." | Unidades: ".$cantidad." | Precio: ".$precio."€ | Total: ".$precio*$cantidad."€</p>";
                    $total = $total + ($precio*$cantidad);
                }
            }
            

            echo "<hr/>";
            echo "<h3>EL TOTAL DE SU PEDIDO ES " . $total . "€.</h3>";
        
        ?>
        <input type="submit" name="tramite" value="Tramitar Pedido">
    </form>
</body>
</html>