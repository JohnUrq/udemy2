<?php

$action = $_GET['action'];
$controller = $_GET['controller'];

require "src/controllers/$controller.php";

if ($controller === 'products') {

    $controller_object = new Products;

}   elseif ($controller === 'home') {

    $controller_object = new Home;
}

if ($action === "index") {

    $controller_object->index();

} elseif ($action === "show") {

    $controller_object->show();
}