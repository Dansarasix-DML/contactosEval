<?php
    
    if (!isset($_POST["enviar"])){
        //echo "LOURDES PROHIBE EL ACCESO A ESTA PÁGINA";
        echo "ACCESO RESTRINGIDO <br/>";
        header("Location: formulario_3.php");
    } else {
        var_dump($_POST);
    }
    
    
?>