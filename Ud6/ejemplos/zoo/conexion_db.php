<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */

    function conexion_db(){
        try {
            $dsn = "mysql:host=localhost; dbname=zoologico";
            $db = new PDO ("mysql:host=localhost; dbname=zoologico", "zoologico", "root");
            $db->setAttribute (PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
            $db->setAttribute (PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'utf8'");
            return ($db) ;
        } catch (PDOException $e) {
            echo "Error de conexión";
            exit();
        }
    }

    $conexion = conexion_db();
    // var_dump($conexion);

    $sql = 'SELECT * FROM animal';
    $resultado = $conexion -> query($sql);

    if(isset($_POST["envio"])){
        $sql = "INSERT INTO animal(nombre) VALUES('".$_POST["nombre_animal"]."')";
        $resultado = $conexion -> query($sql);
        header("Location: conexion_db.php");
    }

    if (isset($_GET["action"])&& ($_GET["action"] == "DEL")) {
        $sql = "DELETE FROM animal WHERE id=".$_GET['id'];
        $resultado = $conexion -> query($sql);
        header("Location: conexion_db.php");
    }

    // foreach( $resultado as $key => $value ) {
    //     echo $value["nombre"];
    // }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Base de datos</title>
</head>
<body>
    <form method="post" action="conexion_db.php">
        Nombre de animal: <input type="text" name="nombre_animal">
        <input type="submit" name="envio" value="Enviar">
    </form>
    <h2>Lista de animales</h2>
    <?php
        foreach( $resultado as $key => $value ) {
            echo $value["id"]." - ".$value["nombre"] . " <a href=conexion_db.php?action=DEL&id=".$value["id"].">DEL</a>
            <a href=conexion_db.php?action=UPD&id=".$value["id"].">UPD</a><br/>";
        }
    ?>
</body>
</html>