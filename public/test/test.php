<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */
    
    require "../../bootstrap.php";
    

    use App\Models\Contacto;
    use App\Models\Usuario;

    // include "../app/config/config.php";
    // include "../app/models/Contacto.php";
    

    $datos = array(
        "nombre" => "Patata", 
        "telefono" => "616123456", 
        "email" => "example.com"
    );

    echo "Clases sin instanciar <br/>";

    $sh_singleton1 = Contacto::getInstancia();

    $contactos = $sh_singleton1->getContactosByProvincia("Córdoba");

    var_dump($contactos);

    // $sh_singleton1=Usuario::getInstancia();


    // $user = $sh_singleton1->getByCredentials("Admin", "admin");

    // echo "CREDENCIALES OK";

    // var_dump($user);

    // $user = $sh_singleton1->getByCredentials("kk", "1234");

    // echo "CREDENCIALES BAD";

    // var_dump($user);

    // $sh_singleton1->set($datos);
    // var_dump($sh_singleton1->edit("1", ["freddy", "618367935", "freddyfazbear1996@gmail.com"]));
    // var_dump($sh_singleton1->get(7));
    // echo "<br/>";
    // echo $sh_singleton1->getMensaje();

    // //Nuevo contacto

    // $sh_singleton1->setNombre("Patata");
    // $sh_singleton1->setTelefono("616123456");
    // $sh_singleton1->setEmail("example.com");

    // // $sh_singleton1->set();
    // // echo "<br/>";
    // // echo $sh_singleton1->getMensaje();

    // //Modificamos contacto

    // $sh_singleton1->setID(10);
    // $sh_singleton1->setNombre("Luis");
    // $sh_singleton1->setTelefono("616123456");
    // $sh_singleton1->setEmail("luisToro.com");

    // $sh_singleton1->set();
    // $sh_singleton1->edit();
    // echo "<br/>";
    // echo $sh_singleton1->getMensaje();

    // $sh_singleton1->delete(10);
    // echo "<br/>";
    // echo $sh_singleton1->getMensaje();





?>