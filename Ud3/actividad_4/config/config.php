<?php
    /**
     * @author Daniel Marín López
     * @version 1.00a
     * 
     * Archivo de configuración
     */

    //Array de meses
    $meses = array(
        1 => "Enero",
        2 => "Febrero",
        3 => "Marzo",
        4 => "Abril",
        5 => "Mayo",
        6 => "Junio",
        7 => "Julio",
        8 => "Agosto",
        9 => "Septiembre",
        10 => "Octubre",
        11 => "Noviembre",
        12 => "Diciembre"
    );

    //Añadiendo festivos, array multidimensional asociativo
    $festivos = array(
        "local" => array(
            10 => array(24),
        ),
        "nacional" => array(
            1 => array(1, 6),
            3 => array(28, 29),
            10 => array(12),
            11 => array(1),
            12 => array(25, 31)
        ),
        "comunidad" => array(
            2 => array(28)
        )
    );
?>