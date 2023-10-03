<?php
    /**
     * Script de la Actividad 3
     *
     * @author Daniel Marín López
     * @version 0.01a
    */

    $dia = 26;
    $mes = 10;
    $ano = 2000;

    // date: Función que devuelve la fecha del sistema
    $sys_day = date("d");
    $sys_month = date("m");
    $sys_year = date("Y");
    
    // Calculo de la edad
    $edad = $sys_year - $ano;
    if ($mes > $sys_month || ($mes == $sys_month && $dia > $sys_day)){
        $edad--;
    }

    echo("La edad es de $edad");
?>