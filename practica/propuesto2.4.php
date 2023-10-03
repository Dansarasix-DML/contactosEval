<html>
<head>
    <title>PROPUESTO 2.3</title>
</head>

<body>
    <?php
        $nombre = "Juan";
        echo "Información de la variable \"nombre\":<br>";
        echo var_dump($nombre) . "<br>";
        echo "Contenido de la variable: " . $nombre . "<br>";
        $nombre = null;
        echo "Información de la variable \"nombre\":<br>";
        echo var_dump($nombre);
    ?>
</body>