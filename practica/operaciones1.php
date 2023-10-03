<html>
<head>
    <title>Variables 1</title>
</head>

<body>
    <h1> Trabajo con variables 1 </h1>
    <p>
    <?php
    $a = 8;
    $b = 6;
    $bol1 = true;
    $bol2 = false;
    if ($bol1 == true) {
        echo $a + $b . "<br>";
        if ($bol2 == true) {
            echo $a - $b . "<br>";
        }
    } else {
        if ($bol2 == true) {
            echo $a * $b . "<br>";
        } else {
            echo $a / $b . "<br>";
        }
    }

    ?>
    </p>
</body>

</html>