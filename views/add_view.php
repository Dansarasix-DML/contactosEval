<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de contactos</title>
</head>
<body>
    <h1>Tus contactos</h1>
    <nav>
        <ul>
            <li><a href="http://contactos.eval">Home</a></li>
            <!-- <li></li>
            <li></li> -->
        </ul>
    </nav>
    <div>
        Información de cuenta: <?php 
        echo $data["profile"];
        echo "<br/>";
        if ($data["profile"] == "Invitado") {
            include "include/login_view.php";
        } else {
            echo "Estás como usuario";
            echo "<br/>";
            echo "<a href=\"http://contactos.eval/logout/\">Salir</a>";
        }        
        ?>

    </div>
    <h2>Crear contacto</h2>
    <form action="" method="post">
        Nombre del contacto: <input type="text" name="nombre">
        <br>
        Télefono del contacto: <input type="tel" name="tlf">
        <br>
        Correo del contacto: <input type="email" name="correo">
        <br>
        Provincia del contacto: <input type="text" name="prov">
        <br>
        <input type="submit" name="creacion" value="Crear contacto">
    </form>
    <footer>Pie de página</footer>
</body>
</html>