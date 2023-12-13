<?php
    /**
     * Aplicación para resolver puzzles
     *
     * @author Daniel Marín López
     * @version 0.01a
    */

    session_start();

    if (!isset($_SESSION['puzzlePieces'])) {
        // Fichas personalizadas del rompecabezas (ajusta las rutas de las imágenes según tu estructura de archivos)
        $_SESSION['puzzlePieces'] = array(
            'piece1' => './img/1.JPG',
            'piece2' => './img/2.JPG'
        );
    }
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Aquí puedes procesar el formulario si es necesario
        // Puedes agregar lógica para verificar si el rompecabezas se resolvió correctamente, etc.
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Daniel Marín López">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="js/puzzle.js"></script>
    <title>Actividad 2: Aplicación de puzzles</title>
</head>
<body>
    <div class="container">
        <h1>Rompecabezas Infantil</h1>

        <form method="post" action="index.php">
            <div id="puzzle-container">
                <?php include('puzzle.php'); ?>
            </div>

            <p>¡Arrastra las piezas para resolver el rompecabezas!</p>

            <input type="submit" value="Verificar Solución">
        </form>

        <p><a href="logout.php">Cerrar sesión</a></p>
    </div>
</body>
</html>