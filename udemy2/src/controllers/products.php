<?php

class Products{
    // methods inside controllers are known as actions
    public function index(){

        require "src/models/product.php";

        $model = new Product;

        $products = $model->getData();

        require "views/products_index.php";
    }

    public function show(){
        // will use Model class to show an individual record
        echo "show function";
    }
}