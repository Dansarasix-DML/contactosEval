<html>
<head>
    <title>Ámbito de Variables 1</title>
</head>

<body>
    <h1> Ámbito de Variables </h1>
    <p>
    <?php
    // ÁMBITO LOCAL
    function duplicar($var){
        $temp = $var * 2;
        return ($temp);
    }
    $variable = 5;
    $temp = duplicar($variable);
    echo "El valor de la variable \$temp es: $temp";
    ?>
    </p>
</body>

</html>