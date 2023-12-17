<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     */

    include "../config/config.php";

    echo "<p>Resumen de noticias. <a href=\"settings.php\">Settings</a></p>";
    echo "<hr/>";

    if (isset($_COOKIE["noticiasSeleccion"])) {
        $noticiasSeleccion = json_decode($_COOKIE["noticiasSeleccion"], true);
        // echo var_dump($noticiasSeleccion);

        foreach ($noticiasSeleccion as $value) {
            foreach ($noticias[$value] as $noticia) {
                echo $noticia."<br/>";
            }
        }
    }

?>

