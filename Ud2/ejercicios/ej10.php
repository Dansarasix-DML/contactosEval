<?php
   /**
    * Script del Ejercicio 10
    *
    * @author Daniel Marín López
    * @version 0.01a
    */

    //Escribir de la forma Heredoc

    $nombre = "Juan";
    $edad = 30;

    
    $informacionPersonal = <<<EOD
    Nombre: $nombre <br>
    Edad: $edad años <br>
    Profesión: Desarrollador <br>
    EOD;

    echo $informacionPersonal;
    echo "<a href=\"https://github.com/Dansarasix-DML/DWES_practica2/blob/main/ej10.php\">GitHub</a>";

?>