<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Daniel Marín López">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficheros</title>
</head>
<body>
    <form method="post" action="upload_file.php" enctype="multipart/form-data">
        <label for="file">
            Fichero: <input type="file" name="file" id="file">
        </label>
        <br/>
        <input type="submit" name="envio" value="Enviar">
    </form>
    <h2>Listado de imágenes</h2>
    <?php
        $dir = "files";
        $files = scandir($dir);

        foreach ($files as $file) {
            if ($file != "."&& $file != "..") {
                $extension = pathinfo($file, PATHINFO_EXTENSION);
                if (in_array($extension, array("jpg", "gif", "png", "jpeg"))) {
                    echo "<img src=\"" . $dir . "/" . $file . "\" alt=\"" . $file . "\">&nbsp;&nbsp;&nbsp;";
                }
            }
        }
    ?>
</body>
</html>