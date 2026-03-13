<?php
require_once "../routes.php";

session_start();

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// remove barra final
if ($uri !== '/') {
    $uri = rtrim($uri, '/');
}

foreach ($routes as $route => $action) {

    $pattern = preg_replace('/\{[a-zA-Z]+\}/', '([^/]+)', $route);
    $pattern = "#^" . $pattern . "$#";

    if (preg_match($pattern, $uri, $matches)) {

        array_shift($matches);

        if (isset($action['view'])) {
            require "../" . $action['view'];
            exit;
        }

        if (isset($action['controller'])) {

            require "../controllers/" . $action['controller'] . ".php";

            $controllerName = $action['controller'];
            $method = $action['method'];

            $controller = new $controllerName;

            $controller->$method(...$matches);
            exit;
        }
    }
}

http_response_code(404);
echo "404 - Página não encontrada";
