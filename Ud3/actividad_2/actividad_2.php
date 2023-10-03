<?php
    /**
     * Script de la Actividad 2
     *
     * @author Daniel Marín López
     * @version 0.01a
    */

    // for ($i = 1; $i <= 6; $i++){
    //     $suma = 0;
    //     if ($i % 2 == 0){
    //         $suma = $suma + $i;
    //     }
    // }

    //Cargamos datos
    $suma = 0;
    $i = 1;

    while ($i <= 3){
        $suma = $suma + ($i * 2);
        $i++;        
    }
    echo("$suma");
?>