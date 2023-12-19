<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     */

    if (!isset($_POST["enviar"])) {
        header("location: calendario.php");
        exit();
    }
    
    session_start();
    
    $credentials_file = "./files/users.txt";
    include "./lib/funciones.php";
    
    $user = test_input($_POST["usuario"]);
    $pass = test_input($_POST["passwd"]);
    
    $credentials = file($credentials_file, FILE_IGNORE_NEW_LINES);
    
    foreach ($credentials as $credential) {
        list($stored_username, $stored_password) = explode(":", $credential);
        // Verificar las credenciales
        if ($user == $stored_username && $pass == $stored_password) {
            $_SESSION["auth"] = true;
            $_SESSION["user"] = $user;
            header("location: calendario.php");
            exit();
        }
    }
    
    // Si llegamos aquí, las credenciales no son válidas
    // Mostrar mensaje de error o redirigir a página de inicio de sesión
    die("Acceso no autorizado");
?>