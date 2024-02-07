<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */

    require "../bootstrap.php";
    
    use App\Core\Router;
    use App\Controllers\ContactoController;
    use App\Controllers\AuthController;

    session_start();

    if (!isset($_SESSION["profile"])) {
        $_SESSION["profile"] = "Invitado";
    }

    $router = new Router;

    $router->add(array(
        "name"=>"home",
        "path"=>"/^\/$/",
        "action"=>array(ContactoController::Class, "IndexAction"),
        "auth"=>array("Invitado", "Usuario")
    ));

    $router->add(array(
        "name"=>"login",
        "path"=>"/^\/login\/$/",
        "action"=>array(AuthController::Class, "LoginAction"),
        "auth"=>array("Invitado", "Usuario")
    ));

    $router->add(array(
        "name"=>"logout",
        "path"=>"/^\/logout\/$/",
        "action"=>array(AuthController::Class, "LogoutAction"),
        "auth"=>array("Invitado", "Usuario")
    ));

    $router->add(array(
        "name"=>"creacion",
        "path"=>"/^\/add\/$/",
        "action"=>array(ContactoController::Class, "setAction"),
        "auth"=>array("Usuario")
    ));

    $router->add(array(
        "name"=>"edicion",
        "path"=>"/^\/edit\/\d+\/$/",
        "action"=>array(ContactoController::Class, "editAction"),
        "auth"=>array("Usuario")
    ));

    $router->add(array(
        "name"=>"borrado",
        "path"=>"/^\/del\/\d+\/$/",
        "action"=>array(ContactoController::Class, "deleteAction"),
        "auth"=>array("Usuario")
    ));

    $router->add(array(
        "name"=>"borrado_conf",
        "path"=>"/^\/delconf\/\d+\/$/",
        "action"=>array(ContactoController::Class, "deleteConfAction"),
        "auth"=>array("Usuario")
    ));

    $router->add(array(
        "name"=>"provincia",
        "path"=>"/^\/getprov\/\w+\/$/",
        "action"=>array(ContactoController::Class, "getProvinciaAction"),
        "auth"=>array("Invitado", "Usuario")
    ));

    $request = $_SERVER['REQUEST_URI'];

    $route=$router->match($request);

    if($route) {
        if (in_array($_SESSION["profile"], $route["auth"])) {
            $controllerName = $route["action"][0];
            $actionName = $route["action"][1];
            $controller = new $controllerName;
            $controller->$actionName($request);
        } else {
            echo "NO AUTORIZADO";
        }
    } else {
        echo "No route";
    }

?>