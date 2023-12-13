<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */

    include "funciones.php";

    $conexion = conexion_db();
    // var_dump($conexion);

    $sql = 'SELECT * FROM animal';
    $resultado = $conexion -> query($sql);

    $cons = "SELECT * FROM animal WHERE id LIKE ? OR nombre LIKE ? OR imagen LIKE ? OR edad LIKE ?";
    $procesaForm = false;


    if (isset($_GET["busca"])) {
        $query = '%' . $_GET['busqueda'] . '%' ?? 5;
        $procesaForm = true;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Daniel Marín López">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Base de datos</title>
</head>
<body>
    <h1>ZOOLÓGICO</h1>
    <form method="get" action="">
        <input type="text" name="busqueda">
        <input type="submit" name="busca" value="Buscar">
        <a href="nuevo.php"><input type="button" name="crea" value="Añadir animal"></a>
    </form>
    <br/>
    <?php
        if($procesaForm){
            $stmt = $conexion->prepare($cons);
            $params = array($query, $query, $query, $query);
            $stmt -> execute($params);
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo "<h2>Lista de animales</h2>";
            foreach( $resultado as $key => $value ) {
                echo $value["nombre"]." - ".$value["imagen"]." - ".$value["edad"] . " <a href=conexion_db.php?action=DEL&id=".$value["id"].">DEL</a>
                <a href=conexion_db.php?action=UPD&id=".$value["id"].">UPD</a><br/>";
            }
        }
        
    ?>
</body>
</html>