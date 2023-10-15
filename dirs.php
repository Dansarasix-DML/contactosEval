<?php
    /**
     * Script adicional de carpetas
     *
     * @author Daniel Marín López
     * @version 0.01a
    */

    include "../porfolio/config/config.php";

    $iconos = array(
        "<img src=\"/icons/folder.gif\" alt=\"[DIR]\">",
        "<img src=\"/icons/text.gif\" alt=\"[TXT]\">"
    );

    $carpetas = array(
        "Unidad 1" => array(
            "ejercicio 1" => "http://".$serverIp."/DWES/Ud1/hola_mundo.php"
        ),
        "Unidad 2" => array(
            "ejercicios" => array(
                "ejercicio 1" => "http://".$serverIp."/DWES/Ud2/ejercicios/ej1.php",
                "ejercicio 2" => "http://".$serverIp."/DWES/Ud2/ejercicios/ej2.php",
                "ejercicio 3" => "http://".$serverIp."/DWES/Ud2/ejercicios/ej3.php",
                "ejercicio 4" => "http://".$serverIp."/DWES/Ud2/ejercicios/ej4.php",
                "ejercicio 5" => "http://".$serverIp."/DWES/Ud2/ejercicios/ej5.php",
                "ejercicio 6" => "http://".$serverIp."/DWES/Ud2/ejercicios/ej6.php",
                "ejercicio 7" => "http://".$serverIp."/DWES/Ud2/ejercicios/ej7.php",
                "ejercicio 8" => "http://".$serverIp."/DWES/Ud2/ejercicios/ej8.php",
                "ejercicio 9" => "http://".$serverIp."/DWES/Ud2/ejercicios/ej9.php",
                "ejercicio 10" => "http://".$serverIp."/DWES/Ud2/ejercicios/ej10.php"
            ),
            "porfolio" => "http://".$serverIp."/DWES/Ud2/porfolio/plantilla.php"
        ),
        "Unidad 3" => array(
            "Condicionales" => array(
                "ejercicio 1" => "http://".$serverIp."/DWES/Ud3/actividad_1/actividad1.php",
                "ejercicio 2" => "http://".$serverIp."/DWES/Ud3/actividad_1/actividad2.php",
                "ejercicio 3" => "http://".$serverIp."/DWES/Ud3/actividad_1/actividad3.php",
                "ejercicio 4" => "http://".$serverIp."/DWES/Ud3/actividad_1/actividad4.php"
            ),
            "Bucles" => array(
                "ejercicio 1" => "http://".$serverIp."/DWES/Ud3/actividad_2/actividad_1.php",
                "ejercicio 2" => "http://".$serverIp."/DWES/Ud3/actividad_2/actividad_2.php",
                "ejercicio 3" => "http://".$serverIp."/DWES/Ud3/actividad_2/actividad_3.php",
                "ejercicio 4" => "http://".$serverIp."/DWES/Ud3/actividad_2/actividad_4.php",
                "ejercicio 5" => "http://".$serverIp."/DWES/Ud3/actividad_2/actividad_5.php"
            ),
            "Arrays" => array(
                "ejercicio 1" => "http://".$serverIp."/DWES/Ud3/actividad_3/actividad_1.php",
                "ejercicio 2" => "http://".$serverIp."/DWES/Ud3/actividad_3/actividad_2.php",
                "ejercicio 3" => "http://".$serverIp."/DWES/Ud3/actividad_3/actividad_3.php",
                "ejercicio 4" => "http://".$serverIp."/DWES/Ud3/actividad_3/actividad_4.php",
                "ejercicio 5" => "http://".$serverIp."/DWES/Ud3/actividad_3/actividad_5.php"
            ),
            "Formularios" => array(
                "ejercicio 2" => "http://".$serverIp."/DWES/Ud3/actividad_4/actividad_1.php",
                "ejercicio 5" => "http://".$serverIp."/DWES/Ud3/actividad_4/actividad_5.php"
            ),
            "ejemplos 1" => array(
                "ejemplo 1" => "http://".$serverIp."/DWES/Ud3/ejemplos_1/ejemplo1.php",
                "ejemplo 2" => "http://".$serverIp."/DWES/Ud3/ejemplos_1/ejemplo2.php",
                "ejemplo 3" => "http://".$serverIp."/DWES/Ud3/ejemplos_1/ejemplo3.php",
                "ejemplo 4" => "http://".$serverIp."/DWES/Ud3/ejemplos_1/ejemplo4.php",
                "ejemplo 5" => "http://".$serverIp."/DWES/Ud3/ejemplos_1/ejemplo5.php",
                "formulario" => "http://".$serverIp."/DWES/Ud3/ejemplos_1/formulario.html",
                "formulario2" => "http://".$serverIp."/DWES/Ud3/ejemplos_1/ejemplo_formulario/formulario_3.php",
                "formulario3" => "http://".$serverIp."/DWES/Ud3/ejemplos_1/formulario2/index_2.php",
                "tabla de multiplicar" => "http://".$serverIp."/DWES/Ud3/ejemplos_1/formularios/tabla_form/form_2.php"
            ),
            "porfolio" => "http://".$serverIp."/DWES/Ud3/porfolio/index.php"
        ),
        "Práctica" => array(
            "ambito 1" => "http://".$serverIp."/DWES/practica/ambito1.php",
            "ambito 2" => "http://".$serverIp."/DWES/practica/ambito2.php",
            "array 1" => "http://".$serverIp."/DWES/practica/array1.php",
            "burbuja" => "http://".$serverIp."/DWES/practica/burbuja.php",
            "ejercicio 2.1" => "http://".$serverIp."/DWES/practica/ejercicio2.1.php",
            "ejercicio 3.1" => "http://".$serverIp."/DWES/practica/ejercicio3.1.php",
            "ejercicio 3.2" => "http://".$serverIp."/DWES/practica/ejercicio3.2.php",
            "ejercicio 3.3" => "http://".$serverIp."/DWES/practica/ejercicio3.3.php",
            "ejercicio 3.4" => "http://".$serverIp."/DWES/practica/ejercicio3.4.php",
            "ejercicio 3.5" => "http://".$serverIp."/DWES/practica/ejercicio3.5.php",
            "estado 1" => "http://".$serverIp."/DWES/practica/estado1.php",
            "expresion 1" => "http://".$serverIp."/DWES/practica/expresion1.php",
            "info" => "http://".$serverIp."/DWES/practica/info.php",
            "matriz 1" => "http://".$serverIp."/DWES/practica/matriz1.php",
            "operaciones 1" => "http://".$serverIp."/DWES/practica/operaciones1.php",
            "ordenacion 2" => "http://".$serverIp."/DWES/practica/ordenacion2.php",
            "ordenación 3" => "http://".$serverIp."/DWES/practica/ordenacion3.php",
            "propuesto 2.1" => "http://".$serverIp."/DWES/practica/propuesto2.1.php",
            "propuesto 2.2" => "http://".$serverIp."/DWES/practica/propuesto2.2.php",
            "propuesto 2.3" => "http://".$serverIp."/DWES/practica/propuesto2.3.php",
            "propuesto 2.4" => "http://".$serverIp."/DWES/practica/propuesto2.4.php",
            "propuesto 2.5" => "http://".$serverIp."/DWES/practica/propuesto2.5.php",
            "variables 1" => "http://".$serverIp."/DWES/practica/variables1.php",
            "variables 2" => "http://".$serverIp."/DWES/practica/variables2.php",
            "formulario_prueba1" => "http://".$serverIp."/DWES/Ud3/ejemplos_1/formularios/form_1.php"
        )
    );

?>