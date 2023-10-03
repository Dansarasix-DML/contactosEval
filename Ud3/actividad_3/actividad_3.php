<?php
    /**
     * Script de la Actividad 3
     *
     * @author Daniel Marín López
     * @version 0.01a
     * 
     * Enunciado:
     * Crear un array con los alumnos de clase y permitir la selección aleatoria de uno de
     * ellos. El resultado debe mostrar nombre y fotografía.
     * 
     * Analisis:
     * Hay que crear un array y sacando un número aleatorio de el nombre de un alumno
    */

    $alumnos = array("Ayala Reina, Manuel David", "Carmona Bascón, Antonio", "Castillero Moriana, Andrés",
    "Cevallos Paredes, Héctor Honorato", "Cordovero Crespo, Adrián", "Cubero Olivares, Ángel" , 
    "Fernández Ariza, Ángel", "Fernández España, Víctor", "Frías Rojas, Jesús", "Galisteo Cebrián, Adrián",
    "González Martínez, Adrián", "Luna Martín, Sergio", "Luque Bravo, Laura", "Marín López, Daniel",
    "Mérida Velasco, Pablo", "Postigo Arévalo, Javier", "Priego Izquierdo, Alejandro", 
    "Rodríguez Machado, Andrés", "Ruz Del Río, Enrique", "Ruz López, Eduardo", "Solís Tejada, Andrea",
    "Tamajón Hernández, Guillermo", "Vaquero Abad, Alejandro");

    /**
     * Función anónima que da un alumno aleatorio
     * @param array $alumnos
     */
    $elegido = function ($alumnos) {
        echo "El alumno elegido es:";
        //tandom_int devuelve un número aleatorio entre un mínimo y un máximo
        echo "<h2>" . $alumnos[random_int(0, count($alumnos) - 1)] . "</h2>";
    };

    $elegido($alumnos);
?>