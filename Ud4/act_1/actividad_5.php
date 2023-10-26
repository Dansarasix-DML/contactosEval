<?php
    /**
     * Script de la Actividad 5
     *
     * @author Daniel Marín López
     * @version 0.01a
     * 
     * Cookie con mensaje de tiempo personalizado
    */

    if (isset($_COOKIE["ultimo_acceso"])) {
        $ultimo_acceso = $_COOKIE["ultimo_acceso"];

        $tiempo_transcurrido = time() - $ultimo_acceso;

        if ($tiempo_transcurrido < 60) {
            $mensaje = "¡Bienvenido de nuevo! Te acabas de conectar.";
        } elseif ($tiempo_transcurrido < 3600) {
            $mensaje = "¡Bienvenido de nuevo! Has estado ausente durante " . floor($tiempo_transcurrido / 60) . " minutos.";
        } else {
            $mensaje = "¡Bienvenido de nuevo! Has estado ausente durante " . floor($tiempo_transcurrido / 3600) . " horas.";
        }
    } else {
        $mensaje = "¡Bienvenido a nuestro sitio web!";
    }

    setcookie('ultimo_acceso', time(), time() + 3600);

    echo $mensaje;
?>