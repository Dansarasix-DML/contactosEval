<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     */

    if (!isset($_POST["enviar"])) {
        header("location: index.php");
    }
    session_start();

    include "../config/config.php";
    include "../lib/funciones.php";

    $user = test_input($_POST["usuario"]);
    $pass = test_input($_POST["passwd"]);


    foreach ($aUsuarios as $key => $value) {
        if ($user == $aUsuarios[$key]["usuario"] && $pass == $aUsuarios[$key]["psw"]) {
            $_SESSION["auth"] = true;
            $_SESSION["user"] = $aUsuarios[$key]["usuario"];
            $_SESSION["profile"] = $aUsuarios[$key]["perfil"];
        }
    }    

    header("location: index.php");
?>