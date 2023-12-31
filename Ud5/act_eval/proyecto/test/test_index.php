<?php

    use App\Models\Pizza;

    session_start();

    if(!isset($_SESSION["pedido"])){
        $_SESSION["pedido"] = [];
    }

    $kk = array();
    $pedido = $_SESSION["pedido"];

    $pizza = new Pizza(0, "Ejemplo", "individual", 5.99, 2);

    $pedido[] = $pizza;

    $kk[] = $pizza;
    $kk[] = $pizza;

    $_SESSION["pedido"] = $pedido;

    var_dump($_SESSION["pedido"]);
    echo "<br/>";
    var_dump(json_encode($kk));

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Daniel Marín López">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FaMia: Testing</title>
</head>
<body>
    <h1>FaMia</h1>
    <h3>Testing</h3>
    <p><?php echo $data["mensaje"]; ?></p>
</body>
</html>