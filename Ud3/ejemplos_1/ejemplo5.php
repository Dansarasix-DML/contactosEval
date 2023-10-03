<?php
    /**
     * Script del Ejemplo 5
     * 
     * @author Daniel Marín López
     * @version 0.01a
     * 
     * Ejemplo de uso de las funciones anónimas II.
     *
    */

    //Declaramos array
    $numeros = array(5, 8, 12);

    //Función anónima para sacar los cuadrados
    $cuadrados = array_map(function ($numero) {
        return $numero**2;
    }, $numeros);

    print_r($cuadrados);
?>