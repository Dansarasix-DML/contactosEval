<?php
    /**
     * Script de la Actividad 1
     *
     * @author Daniel Marín López
     * @version 0.01a
    */
    $a = 8;
    $b = 5;
    $c = 7;
    /* if ($a < $b && $a < $c){
         if ($b < $c){
             echo("$a, $b, $c");
         }
         else{
             echo("$a, $c, $b");
         }
     }
     else if ($b < $a && $b < $c){
         if ($a < $c){
             echo("$b, $a, $c");
         }
         else{
             echo("$b, $c, $a");
         }
     }
     else{
         if ($a < $b){
             echo("$c, $a, $b");
         }
         else{
             echo("$c, $b, $a");
         }
     }*/
    if ($a < $b and $b < $c){
        echo("$a, $b, $c");
    }
    if ($a < $c and $c < $b){
        echo("$a, $c, $b");
    }
    if ($b < $a and $a < $c){
        echo("$b, $a, $c");
    }
    if ($b < $c and $c < $a){
        echo("$b, $c, $a");
    }
    if ($c < $a and $a < $b){
        echo("$c, $a, $b");
    }
    if ($c < $b and $b < $a){
        echo("$c, $b, $a");
    }
?>