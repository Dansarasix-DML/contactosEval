<?php
    session_start();

    unset($_SESSION);

    session_destroy();

    header("Location: actividad_1.php");
?>