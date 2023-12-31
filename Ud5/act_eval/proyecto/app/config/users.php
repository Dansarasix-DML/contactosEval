<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */


    require_once '../app/models/Usuario.php';
    use App\Models\Usuario;

    define("USERS", array(
        // array("user" => "Daniel",
        // "passwd" => "Marin")
        new Usuario("Daniel", "Marin")
    ));

?>