<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     */

    if (!isset($_POST["enviar"])) {
        header("location: comandas.php");
    }
    session_start();

    include "../config/users.php";
    include "../lib/funciones.php";

    $user = test_input($_POST["usuario"]);
    $pass = test_input($_POST["passwd"]);


    foreach (USERS as $key => $value) {
        if ($user == USERS[$key]["user"] && $pass == USERS[$key]["passwd"]) {
            $_SESSION["auth"] = true;
            $_SESSION["user"] = USERS[$key]["user"];
        }
    }    

    header("location: comandas.php");
?>