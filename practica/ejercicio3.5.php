<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJERCICIO 3.5</title>
</head>
<body>
    <?php
        function Suma ($a, $b){
            return $a + $b;
        }
        function mensaje($texto){
            echo $texto;
        }

        mensaje("Esto es una suma<br>");
        echo Suma(5, 3);
    ?>
</body>
</html>