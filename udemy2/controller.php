<?php

class Controller{
    // methods inside controllers are known as actions
    public function index(){

        require "model.php";

        $model = new Model;

        $products = $model->getData();

        require "view.php";
    }
}