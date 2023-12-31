<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */

    if (isset($_POST["elaborar"])) {
        $directorio = "../files/";
        $file = $_POST["archivo"];

        // echo var_dump($file);

        list($init, $fecha, $hora, $estado) = explode("_", $file);

        rename($directorio.$file, $directorio."{$init}_{$fecha}_{$hora}_elaborada.txt");

        header("Location: comandas.php");
    }

    if (isset($_POST["borrar"])) {
        $directorio = "../files/";
        $file = $_POST["archivo"];

        // echo var_dump($file);

        unlink($directorio.$file);
        
        header("Location: comandas.php");
    }

?>