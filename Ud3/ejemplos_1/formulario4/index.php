<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     * Ejercicio de las entradas
     */


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Daniel Marín López">
    <title>Inicio</title>
</head>
<body>
    <h1>Compra de entradas</h1>
    <form action="entradas.php" method="post">
        <label>
            Primer nombre: <input type="text" name="first_name" required>
        </label>
        <br/>
        <br/>
        <label>
            Último nombre: <input type="text" name="last_name">
        </label>
        <br/>
        <br/>
        <input type="submit" name="envio" value="Enviar">
    </form>
</body>
</html>