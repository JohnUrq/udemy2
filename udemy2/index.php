<?php


ini_set('display_errors', 1);
error_reporting(E_ALL);

$basePath = '/udemy2/Untitled/udemy2';
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$path = substr($path, strlen($basePath));

spl_autoload_register(function (string $class_name){
    require "src/$class_name.php";
    
});


// Ensure we remove only the base path if it exists at the start of $path
if (substr($path, 0, strlen($basePath)) == $basePath) {
    $path = substr($path, strlen($basePath));
}

// var_dump($path); // Check the modified $path
// require "src/router.php";
$segments = explode("/", $path);
// print_r($segments); // See the segments after adjustment
// exit();

$router = new Router;

$router->add("/home/index", ["controller" => "home", "action" => "index"]);
$router->add("/products", ["controller" => "products", "action" => "index"]);
$router->add("/", ["controller" => "home", "action" => "index"]);
$router->add("/products/show", ["controller" => "products", "action" => "show"]);

$params = $router->match($path);
// error_log($path, 3, "src/debug.log");


$action = !empty($segments[2]) ? $segments[2] : 'index';
$controller = !empty($segments[1]) ? $segments[1] : 'home';

// $action = $params($action);
// $controller = $params($controller);

// Assuming $params has been set by $router->match($path)
if ($params) {
    $action = $params['action'];
    $controller = $params['controller'];

    $controllerFile = "src/controllers/" . ucfirst($controller) . ".php";

    if (file_exists($controllerFile)) {
        require $controllerFile;
        $controllerClass = ucfirst($controller);

        if (class_exists($controllerClass)) {
            $controllerObject = new $controllerClass();
            if (method_exists($controllerObject, $action)) {
                $controllerObject->$action();
            } else {
                // Handle missing action
                echo "Action $action not found in $controllerClass.";
            }
        } else {
            // Handle missing controller class
            echo "Controller class $controllerClass not found.";
        }
    } else {
        // Handle missing controller file
        echo "Controller file $controllerFile not found.";
    }
} else {
    // Route not found
    echo "No route matched.";
}

