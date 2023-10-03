<?php
    /**
     * Script de la Actividad 4
     *
     * @author Daniel Marín López
     * @version 0.01a
    */

    //Variables para los switches
    $sys_day = date("d");
    $sys_month = date("m");
    $sys_year = date("Y");
    $sys_hour = date("g");
    $sys_moment = date("A"); //AM O PM
    $cab = "nada";
    $color = "nada";

    /**
     * Switch para cambiar la imagen
     */
    switch ($sys_month){
        case 1:
        case 2:
            $cab = "./img/invierno.png";
            break;
        case 3:
            if ($sys_day >= 21){
                $cab = "./img/primavera.png";
                break;
            }
            else {
                $cab = "./img/invierno.png";
                break;
            }
        case 4:
        case 5:
            $cab = "./img/primavera.png";
            break;
        case 6:
            if ($sys_day >= 21){
                $cab = "./img/verano.png";
                break;
            }
            else {
                $cab = "./img/primavera.png";
                break;
            }
        case 7:
        case 8:
            $cab = "./img/verano.png";
            break;
        case 9:
            if ($sys_day >= 21){
                $cab = "./img/otono.png";
                break;
            }
            else {
                $cab = "./img/verano.png";
                break;
            }
        case 10:
        case 11:
            $cab = "./img/otono.png";
            break;
        case 12:
            if ($sys_day >= 21){
                $cab = "./img/invierno.jpg";
                break;
            }
            else {
                $cab = "./img/otono.png";
                break;
            }
    }

    /**
     * Switch para cambiar el color
     */

     switch ($sys_hour) {
        case 1:
            if ($sys_moment == "AM") {
                $color = "#353370";
            } else {
                $color = "#DEC330";
            }
            
            break;
        case 2:
            if ($sys_moment == "AM") {
                $color = "#3E3C85";
            } else {
                $color = "#C9962A";
            }                
            break;
        case 3:
            if ($sys_moment == "AM") {
                $color = "#4E4BA6";
            } else {
                $color = "#C9662A";
            }                
            break;
        case 4:
            if ($sys_moment == "AM") {
                $color = "#5854BA";
            } else {
                $color = "#C95521";
            }                
            break;
        case 5:
            if ($sys_moment == "AM") {
                $color = "#5371BA";
            } else {
                $color = "#B84D1E";
            }                
            break;
        case 6:
            if ($sys_moment == "AM") {
                $color = "#5B7CCC";
            } else {
                $color = "#A1431A";
            }                
            break;
        case 7:
            if ($sys_moment == "AM") {
                $color = "#5ECCC5";
            } else {
                $color = "#A12650";
            }                
            break;
        case 8:
            if ($sys_moment == "AM") {
                $color = "#66DED6";
            } else {
                $color = "#883394";
            }                
            break;
        case 9:
            if ($sys_moment == "AM") {
                $color = "#5ADE5F";
            } else {
                $color = "#5B247D";
            }                
            break;
        case 10:
            if ($sys_moment == "AM") {
                $color = "#A2DE54";
            } else {
                $color = "#402D7D";
            }                
            break;
        case 11:
            if ($sys_moment == "AM") {
                $color = "#CFDE4C";
            } else {
                $color = "#2E3070";
            }                
            break;
        case 12:
            if ($sys_moment == "AM") {
                $color = "#DEDB34";
            } else {
                $color = "#363570";
            }                
            break;
     }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad4</title>
</head>
<body style="background-color: <?php echo $color?>;">
    <img src="<?php echo $cab?>">
</body>
</html>