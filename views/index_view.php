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
            <?php
                if ($data["profile"] == "Usuario") {
                    echo "<li><a href=\"http://contactos.eval/add/\">Nuevo contacto</a></li>";
                }
            
            ?>
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
        include "include/search_view.php";     
        ?>

    </div>
    <h2>Listado de contactos</h2>
    <?php                

        foreach ($data["contacto"] as $key => $value) {
            echo $value["nombre"].", ".$value["telefono"].", ".$value["email"].", ".$value["provincia"];
            if ($data["profile"] == "Usuario") {
                include "include/actions_view.php";
            }
            echo "</br>";

        }
    
    ?>
    <footer>Pie de página</footer>
</body>
</html>