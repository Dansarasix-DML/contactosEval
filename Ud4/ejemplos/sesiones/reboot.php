<?php
    session_start();

    unset($_SESSION);

    session_destroy();

    header("Location: index3.php");
?>