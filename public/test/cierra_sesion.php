<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     * Cierre de sesión
     */

    session_start();

    //unset($_SESSION);
    session_unset();

    session_destroy();

    header("Location: http://contactos.eval/");
?>