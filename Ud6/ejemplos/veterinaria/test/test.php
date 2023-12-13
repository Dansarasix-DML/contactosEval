<?php

    include "../app/Config/config.php";
    include "Mascota.php";

    $datos = array("nombre"=>"perro");
    echo "Clases sin instanciar <br/>";
    $sh_singleton1=Mascota :: getInstancia();
    var_dump($sh_singleton1);
    $sh_singleton2=Mascota :: getInstancia();
    var_dump($sh_singleton2);
    $sh_singleton2=Mascota :: getInstancia();
    var_dump($sh_singleton2);
    echo "<br/>Instanciando objetos<br/>";
    $sh_singleton1->setNombre($datos["nombre"]);
    $sh_singleton1->set();



?>