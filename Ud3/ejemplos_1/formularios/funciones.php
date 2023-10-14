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
     function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }

    function test_input2($data){
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }
?>