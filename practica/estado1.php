<html>
<head>
    <title>Estado de Variables 1</title>
</head>

<body>
    <h1> Estado de Variables </h1>
    <p>
    <?php
    $variable = "prueba";
    // Comprobar si la variable está definida:
    // imprimirá el texto “variable está definida”
    if (isset($variable)) echo "variable está definida<br>";
    // Comprobar si la variable está vacía:
    // no imprimirá nada
    if (empty($variable)) echo "variable está vacía<br>";
    // Una variable puede ser “destruida” utilizando la función unset():
    //unset(mixed var [, mixed var [, ...]])
    $var = "algo";
    unset($var);
    // La siguiente sentencia no imprime nada
    if (isset($var)) echo "var está definida<br>";
    $var = "foo";
    if ((bool)$var) echo "var no está vacía<br>";
    if (!empty($var)) echo "var no está vacía<br>";
    ?>
    </p>
</body>

</html>