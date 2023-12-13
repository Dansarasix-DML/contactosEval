<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */

    include "funciones.php";

    $conexion = conexion_db();

    if(isset($_POST["envio"])){
        $sql = "INSERT INTO animal(nombre, imagen, edad) VALUES(:nombre, :imagen, :edad)";
        $nombre = clear_data($_POST["nombre"]);
        $imagen = clear_data($_POST["imagen"]);
        $edad = clear_data(intval($_POST["edad"]));
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':nombre',$nombre);
        $stmt->bindParam(':imagen',$imagen);
        $stmt->bindParam(':edad',$edad);
        // $params = array(
        //     ":id" => $id ?? 1, 
        //     ":nombre"=> $nombre ?? "defecto", 
        //     ":imagen"=> $imagen ?? "imagen", 
        //     ":edad"=> $edad ?? 5
        // );
        $stmt -> execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // $resultado = $conexion -> query($sql);
        header("Location: index.php");
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Daniel Marín López">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo animal</title>
</head>
<body>
    <h1>ZOOLÓGICO</h1>
    <form action="" method="post">
        NOMBRE: <input type="text" name="nombre"><br/><br/>
        IMAGEN: <input type="text" name="imagen"><br/><br/>
        EDAD: <input type="text" name="edad"><br/><br/>
        <input type="submit" name="envio" value="Enviar">
    </form>
</body>
</html>