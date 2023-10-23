<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     * Actividad 4
     */

    $visitas = isset($_COOKIE["visitas"]) ? $_COOKIE["visitas"] : 0;

    if (isset($_POST["visitar"])) {
        $visitas++;
        setcookie("visitas", $visitas, time() + 3600);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Daniel Marín López">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 4</title>
</head>
<body>
    <?php
        echo "<form method=\"post\" action=\"\">";
        echo "<input type=\"submit\" name=\"visitar\" value=\"Añadir visita\">";
        echo "</form><br/>";
        echo "VISITAS TOTALES: " . $visitas;
    ?>
</body>
</html>