<html>
<head>
    <title>Ámbito de Variables 2</title>
</head>

<body>
    <h1> Ámbito de Variables </h1>
    <p>
    <?php
    // ÁMBITO GLOBAL
    function duplicar(){
        global $variable;
        $variable = $variable * 2;
    }
    $variable = 5;
    duplicar();
    echo "El valor de la variable \$variable es: $variable";
    ?>
    </p>
</body>

</html>