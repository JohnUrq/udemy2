<?php

class Products{
    // methods inside controllers are known as actions
    public function index(){

        require "../models/product.php";

        $model = new Model;

        $products = $model->getData();

        require "view.php";
    }
}