<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     * Actividad 2
     */

    include "../../../../porfolio/config/config.php";

    if (isset($_COOKIE)) {
        header("Location: http://".$serverIp."/DWES/Ud4/act_1/act_2.1.php");
    } else {
        header("Location: http://".$serverIp."/DWES/Ud4/act_1/act_2.2.php");
    }

?>