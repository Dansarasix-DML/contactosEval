<?php
    /**
     * @author Daniel Marín López
     * @version 1.00a
     */

    /**
     * @name test_input
     * @param $data
     * @return $data
     * 
     * Función que trata la información de los input
     */

    //Meses de 30 días
    define('MESES_30D', [4,6,9,11]);
    

    //Meses de 31 días
    define("MESES_31D", [1,3,5,7,8,10,12]);

    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }

    function n_dias($mes, $ano){
        if (in_array($mes, MESES_30D)) {
            return 30;
        } 
        if (in_array($mes, MESES_31D)) {
            return 31;
        } 
        if ($ano % 4 == 0 and ($ano % 100 != 0 or $ano % 400 == 0)){
            return 29;
        }
        else{
            return 28;
        }
    }
?>