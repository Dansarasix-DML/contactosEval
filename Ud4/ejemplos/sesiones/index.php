<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     * Sesiones 1
     */

    session_start();

    if (!isset($_SESSION["count"])) {
        $_SESSION["count"]=0;
    } else {
        $_SESSION["count"]++;
    }

    $cont=$_SESSION["count"];
     
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Daniel Marín López">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesión</title>
</head>
<body>
    <h1>Contador</h1>
    <h2><?php echo $cont ?></h2>
</body>
</html>