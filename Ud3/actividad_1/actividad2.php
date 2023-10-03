<?php
    /**
     * Script de la Actividad 2
     *
     * @author Daniel Marín López
     * @version 0.01a
    */
    $ano = 2016;
    $mes = 8;

    switch ($mes){
        case 1:
        case 3:
        case 5:
        case 7:
        case 8:
        case 10:
        case 12:
            echo("El mes tiene 31 días");
            break;
        case 2:
            if ($ano % 4 == 0 or ($ano % 400 == 0 and $ano % 100 == 0)){
                echo("El mes tiene 29 días");
                break;
            }
            else{
                echo("El mes tiene 28 días");
                break;
            }
        case 4:
        case 6:
        case 9:
        case 11:
            echo("El mes tiene 30 días");
            break;
        default:
            echo("Mes no válido");
    }
?>