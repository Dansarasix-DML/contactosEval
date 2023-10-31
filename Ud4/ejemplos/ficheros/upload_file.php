<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     * 
     */

    //Comprobamos que el fichero se puede ejecutar
    if (!isset($_POST["envio"])) {
        header("location: index.php");
    }

    //Cargamos constantes
    define("DIR_LOAD","./files/");
    define("MAX_SIZE","200000");
    $extensions = array("jpg", "gif", "png", "jpeg", "pdf", "txt");
    $formats = array("image/gif", "image/png", "image/jpg", "image/jpeg", "application/pdf");
    //var_dump($_FILES);
    $aux = explode(".", $_FILES["file"]["name"]);
    $extension = end($aux);

    if (($_FILES["file"]["size"] <= MAX_SIZE) and (in_array($extension, $extensions)) and (in_array($_FILES["file"]["type"], $formats))) {
        if ($_FILES["file"]["error"] > 0) {
            echo "Error: ". $_FILES["file"]["error"];
        } else {
            $file_name = uniqid().".".pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
            if (file_exists(DIR_LOAD . $file_name)) {
                echo "El fichero ya existe";
            } else {
                move_uploaded_file($_FILES["file"]["tmp_name"], DIR_LOAD . $file_name);
            }
        }
    } else {
        echo "Ha ocurrido un error.";
    }

    echo "<a href=\"index.php\">Volver</a>";
?>