<?php

    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     * Index que crea un perro de la clase Perro y lo entrena varias veces
     */

    // require_once "./app/models/Perro.php";
    // require_once "./app/models/Persona.php";

    require_once "./vendor/autoload.php";

    use App\Models\Perro;
    use App\Models\Persona;

    $perro = new Perro("Alex", "Marrón");
    echo "Dame la pata<br/>";
    echo$perro->darPata()."<br/>";
    $perro->entrenar();
    $perro->entrenar();
    $perro->entrenar();
    $perro->entrenar();
    $perro->entrenar();
    $perro->entrenar();
    echo "Dame la pata<br/>";
    echo $perro->darPata()."<br/>";

?>