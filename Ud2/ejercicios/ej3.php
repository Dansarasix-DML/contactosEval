<?php
/**
 * Script del Ejercicio 3
 *
 * @author Daniel Marín López
 * @version 0.01a
*/

//Cragamos datos
$link = "https://github.com/Dansarasix-DML/DWES_practica2/blob/main/ej3.php";
$r = 5;
define("PI", 3.14);
$area = 2 * PI * $r;
$longitud = (2 * $r) * PI;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .circle {
            width: 200px;
            height: 200px;
            background-color: lightblue;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
    <title>Document</title>
</head>
<body>
<h1>Área y Longitud del Círculo</h1>
    <p>Valor del radio: <?php echo $r; ?></p>
    <p>Longitud de la circunferencia: <?php echo $longitud; ?></p>
    <p>Área del círculo: <?php echo $area; ?></p>
    <div class="circle">
        <p></p>
    </div>
    <a href="<?php echo $link?>">GitHub</a>
</body>
</html>