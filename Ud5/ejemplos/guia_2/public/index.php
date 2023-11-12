<?php
    /**
     * @author Daniel Marín López
     * @version 0.01a
     * 
     */

    require "../app/Config/config.php";
    require_once "../vendor/autoload.php";

    use App\Controllers\IndexController;
    use App\Controllers\NumerosController;
    use App\Core\Router;

    $router = new Router();
    $saludo = new Router();

    $router->add(array(
        "name"=> "home",
        "path"=>"/^\/$/",
        "action"=>[IndexController::class, "IndexAction"]
    ));

    $router->add(array(
        "name"=> "saludo",
        "path"=>"/^\/saludo\/[A-z]+\/$/",
        "action"=>[IndexController::class, "SaludaAction"]
    ));

    $router->add(array(
        "name"=> "numeros",
        "path"=>"/^\/numeros\/$/",
        "action"=>[NumerosController::class, "NumerosAction"]
    ));
    
    $request=str_replace(DIRURL,"", $_SERVER["REQUEST_URI"]);
    $route=$router->match($request);
    if($route) {
        $controllerName = $route["action"][0];
        $actionName = $route["action"][1];
        $controller = new $controllerName;
        $controller->$actionName($request);
    } else {
        echo "No route";
    }
?>