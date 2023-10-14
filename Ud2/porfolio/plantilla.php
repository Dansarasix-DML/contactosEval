<?php
    /**
     * Script de datos personales
     *
     * @author Daniel Marín López
     * @version 0.02a
    */

    $link="https://github.com/Dansarasix-DML/DWES/blob/main/Ud2/porfolio/plantilla.php";

    //Cargamos datos
    $nombre = "Daniel";
    $apellidos = "Marín López";
    $mail = "a21maloda@iesgrancapitan.org";
    $phone = "618367935";
    $linkedin = "https://es.linkedin.com/";
    $twitter = "https://twitter.com/";

    //Cargamos datos sistema
    $sys_day = date("d");
    $sys_month = date("m");
    $sys_year = date("Y");
    $cab = "nada";

    switch ($sys_month){
        case 1:
        case 2:
            $cab = "./img/cab_inv.jpg";
            break;
        case 3:
            if ($sys_day >= 21){
                $cab = "./img/marzo_cabecera.jpg";
                break;
            }
            else {
                $cab = "./img/cab_inv.jpg";
                break;
            }
        case 4:
        case 5:
            $cab = "./img/marzo_cabecera.jpg";
            break;
        case 6:
            if ($sys_day >= 21){
                $cab = "./img/cabecera-verano.jpg";
                break;
            }
            else {
                $cab = "./img/marzo_cabecera.jpg";
                break;
            }
        case 7:
        case 8:
            $cab = "./img/cabecera-verano.jpg";
            break;
        case 9:
            if ($sys_day >= 21){
                $cab = "./img/otono_experiencia_cabecera.jpg";
                break;
            }
            else {
                $cab = "./img/cabecera-verano.jpg";
                break;
            }
        case 10:
        case 11:
            $cab = "./img/otono_experiencia_cabecera.jpg";
            break;
        case 12:
            if ($sys_day >= 21){
                $cab = "./img/cab_inv.jpg";
                break;
            }
            else {
                $cab = "./img/otono_experiencia_cabecera.jpg";
                break;
            }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Plantilla</title>
</head>
<body>
    <header>
        <img src="<?php echo $cab?>">
    </header>
    <div class="foto">
        <img src="./img/foto.jpg">
    </div>
    <div class="Datos">
        <p>Alumno: <?php echo $nombre . " " . $apellidos?></p>
        <p>Email: <?php echo $mail?></p>
        <p>Teléfono: <?php echo $phone?></p>
        <p>Linkedin: <a href="<?php echo $linkedin?>">Linkedin</a></p>
        <p>Twitter: <a href="<?php echo $twitter?>">Twitter</a></p>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="git" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
        </symbol>
    </svg>
    <div class="peg">
    <a href="<?php echo $link ?>" target="_blank"><svg class="bi" width="24" height="24"><use xlink:href="#git"/></svg></a>
    </div>
</body>
</html>