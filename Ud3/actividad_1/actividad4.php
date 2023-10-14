<?php
    /**
     * Script de la Actividad 4
     *
     * @author Daniel Marín López
     * @version 0.01a
    */

    $link="https://github.com/Dansarasix-DML/DWES/blob/main/Ud3/actividad_1/actividad4.php";
    echo "<h1>Ejercicio 4 Condicionales</h1>
    <p>Modifica la página inicial realizada, incluyendo una imagen de cabecera en función<br/>
    de la estación del año en la que nos encontremos y un color de fondo en función de<br/>
    la hora del día.</p>";

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
    <meta name="author" content="Daniel Marín López">
    <link rel="stylesheet" href="../../css/bootstrap.css"></link>
    <title>Unidad 3 - Ejercicio 4 Condicionales</title>
</head>
<body style="background-color: <?php echo $color?>;">
    <img src="<?php echo $cab?>">
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="git" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
        </symbol>
    </svg>
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <div class="col-md-4 d-flex align-items-center">
        <a href="/" class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1">
            <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
        </a>
        <span class="mb-3 mb-md-0 text-body-secondary">&copy; 2023 Daniel Marín López</span>
        </div>

        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3"><a class="text-body-secondary" href="<?php echo $link ?>" target="_blank"><svg class="bi" width="24" height="24"><use xlink:href="#git"/></svg></a></li>
        </ul>
  </footer>
</body>
</html>