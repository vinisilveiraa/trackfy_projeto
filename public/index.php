<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

require_once "../routes.php";
require_once "../controllers/AuthController.php";

session_start();

// pega tudo que vem dps do dominio na url 
// EX:(http://localhost:8000/search?q=rock), VAI PEGAR (search?q=rock)
// parse url quebra em partes, 
// parse_url("/search?q=rock", PHP_URL_PATH) -> /search
// entao, url = /search
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// remover barra final
$url = rtrim($url, '/') ?: '/';

// se url existe em rotas em (../routes.php)
if (array_key_exists($url, $routes)) {

    // junta ambas as partes
    $route = $routes[$url];

    //se essa rota possuir uma view
    if (isset($route['view'])) {
        // apenas mostra ela
        require '../' . $route['view'];
    }

    //se essa rota possuir um controller
    if (isset($route['controller'])) {
        //pega o nome do controller
        $controllerName = $route['controller'];
        // pega o nome do metodo
        $method = $route['method'];

        // chama o controller e seu metodo (chamando a view por la)
        require_once "../controllers/$controllerName.php";

        // cria um novo controller com o nome mesmo
        $controller = new $controllerName;
        // executa o metodo pelo criado
        $controller->$method();
    }
} else {
    require '../views/404.php';
}
