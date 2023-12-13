<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Daniel Marín López">
    <title>Números</title>
</head>
<body>
    <h1>MVC</h1>
    <h2><?php echo $data["mensaje"]; ?></h2>
    <?php
        foreach ($data["contenido"] as $value) {
            echo $value . "<br>";
        }
    ?>
</body>
</html>