<?php
    require "../app/config/config.php";
    require "../app/config/users.php";
    require_once "../vendor/autoload.php";

    use App\Controllers\PizzasController;
    use App\Controllers\BebidasController;
    use App\Controllers\PostresController;
    use App\Controllers\CarritoController;
    use App\Controllers\ComandasController;
    use App\Controllers\TestingController;
    use App\Core\Router;

    $router = new Router();

    $router->add(array(
        "name"=> "home",
        "path"=>"/^\/$/",
        "action"=>[ComandasController::class, "ComandasAction"]
    ));

    $router->add(array(
        "name"=> "pizzas",
        "path"=>"/^\/pizzas$/",
        "action"=>[PizzasController::class, "PizzasAction"]
    ));

    $router->add(array(
        "name"=> "bebidas",
        "path"=>"/^\/bebidas$/",
        "action"=>[BebidasController::class, "BebidasAction"]
    ));

    $router->add(array(
        "name"=> "postres",
        "path"=>"/^\/postres$/",
        "action"=>[PostresController::class, "PostresAction"]
    ));

    $router->add(array(
        "name"=> "carrito",
        "path"=>"/^\/carrito$/",
        "action"=>[CarritoController::class, "CarritoAction"]
    ));

    $router->add(array(
        "name"=> "test",
        "path"=>"/^\/test$/",
        "action"=>[TestingController::class, "TestingAction"]
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