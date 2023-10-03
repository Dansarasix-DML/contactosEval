<html>
<head>
    <title>Variables 2</title>
</head>

<body>
    <h1> Variables de variables </h1>
    <p>
    <?php
    $normal = 22;
    $oferta = 20;
    $devaluado = 15;
    $finMes = false;
    $articuloDeteriodado = false;
    if ($finMes)
        $precio = "oferta";
    else{
        if ($articuloDeteriodado)
            $precio = "devaluado";
        else
            $precio = "normal";
    }      
    echo "El precio es: ".$$precio
    ?>
    </p>
</body>

</html>