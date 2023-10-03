<?php
    /**
     * Script de datos personales
     *
     * @author Daniel Marín López
     * @version 0.02a
    */

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
</body>
</html>