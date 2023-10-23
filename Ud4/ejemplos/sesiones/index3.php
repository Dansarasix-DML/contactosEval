<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     */

    //include "../../../../porfolio/config/config.php";

    session_start();

    if (!isset($_SESSION["count"])) {
        $_SESSION["count"]=0;
    }

    if (isset($_POST["boton"])) {
        $_SESSION["count"]++;
    }
    
    $_SESSION['intervaloTime'] = 0.5;
    if(isset($_SESSION['inicioTime'])) {
        $tiempo_transcurrido = time();
        /*se multiplica por 60 segundos ya que se configura en minutos*/
        $tiempo_maximo = $_SESSION['inicioTime'] + ( $_SESSION['intervaloTime'] * 60 ) ;
        if($tiempo_transcurrido > $tiempo_maximo){
            $_SESSION['count'] = 0;
            $_SESSION['inicioTime'] = time();
            //header("Location: http://".$serverIp."/DWES/Ud4/ejemplos/sesiones/reboot.php");
        } else {
            /*se resetea el inicio*/
            $_SESSION['inicioTime'] = time();
        }
    } else {
        /*Si no existe se crea o si lo prefiere destruya la sesión*/
        $_SESSION['inicioTime'] = time();
    }

    $_SESSION['inicioTime'] = time();
    $cont = $_SESSION["count"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo 1</title>
</head>
<body>
    <h1>Pincha en el enlace</h1>
    <br/>
    <!-- <a href="#">Pincha aquí</a> -->
    <form method="post" action=""><input type="submit" name="boton" value="Pincha aquí"></form>
    <br/>
    <p><?php echo $cont ?></p>
</body>
</html>