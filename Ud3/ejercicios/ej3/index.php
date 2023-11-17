<?php
    /**
     * Script del Ejercicio 3
     *
     * @author Daniel Marín López
     * @version 0.01a
    */

    include "./config/config.php";
    include "./lib/lib.php";

    echo "<h1>Ejercicio 3</h1>";

    echo "<p>Usuarios creados: alumno => usuario</p>";

    foreach ($usuarios as $user_data) {
        $user = $creaUsuario($user_data);
        echo $user_data["nombre"] . " " . $user_data["apellido1"] . " " . $user_data["apellido2"] . " => " . $user . "<br/>";
    }

?>