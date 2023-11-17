<?php
    /**
     * Script del Ejercicio 3
     *
     * @author Daniel Marín López
     * @version 0.01a
    */

    $usuarios = array(
        array('nombre'=>'Jesús','apellido1'=>'Martínez','apellido2'=>'García'),
        array('nombre'=>'Mercedes','apellido1'=>'Calamaro','apellido2'=>'Pedrajas'),
        array('nombre'=>'Elena','apellido1'=>'Pérez','apellido2'=>''),
    );

    define("ACENTOS", array('á', 'é', 'í', 'ó', 'ú', 'ñ', 'Á', 'É', 'Í', 'Ó', 'Ú', 'Ñ'));
    define("SIN_ACENTOS", array('a', 'e', 'i', 'o', 'u', 'n', 'A', 'E', 'I', 'O', 'U', 'N'));
?>