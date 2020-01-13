<?php

include 'config.php';
// echo '<pre>'.print_r($_GET,1).'</pre>';

// $url = isset($_GET['url']) ? $_GET['url'] : 'home';
$url = filter_input(INPUT_GET, 'url', FILTER_DEFAULT);
$url = strip_tags(trim($url));
$url = empty($url) ? 'home' : $url;

getController($url);

function getController($url)
{
    $path = REQUIRE_PATH .'system/controller';
    $page = '';

    # Carregar as rotas
    $routes = json_decode(file_get_contents(REQUIRE_PATH .'routes.json'), true);
    // echo '<pre>'.var_export($routes, 1).'</pre>';
    
    if (isset($routes[$url])) {
        $controller = $routes[$url];
    } else {
        $controller = (file_exists("$url") || ! file_exists($path .'/' .ucfirst($url) .'.php')) ? 'Errors' : ucfirst($url);
    }

    $controller = "Controller\\$controller";
    $action = 'index';
    $params = array();

    if (class_exists($controller)) {
        $obj = new $controller();
        if (method_exists($obj, $action)) {
            if (is_callable(array($obj, $action))) {
                call_user_func_array(array($obj, $action), $params);
                $res = true;
            }
        }
    } else {
        trigger_error("Unable to load Controller: $controller", E_USER_WARNING);
    }
}