<?php

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

$segments = explode("/", $path);



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