<?php

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

$segments = explode("/", $path);

require "src/router.php";

$router = new Router;

$router->add("/home/index", ["controller" => "home", "action" => "index"]);
$router->add("/products", ["controller" => "products", "action" => "index"]);
$router->add("/", ["controller" => "home", "action" => "index"]);

$router->match($path);

$action = $segments[5];
$controller = $segments[4];

require "src/controllers/$controller.php";

// if ($controller === 'products') {

//     $controller_object = new Products;

// }   elseif ($controller === 'home') {

//     $controller_object = new Home;
// }

// replace the entire if block with:
    $controller_object = new $controller;

// if ($action === "index") {

//     $controller_object->index();

// } elseif ($action === "show") {

//     $controller_object->show();
// }

// run the action method on the controller object to replace this if block

    $controller_object->$action();