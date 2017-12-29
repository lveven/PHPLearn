<?php
require "./ProductModel.class.php";
require "./ModelFactory.class.php";
class ProductController{
    private $obj = null;
    function __construct(){
        $this->obj = ModelFactory::M('ProductModel');
    }
    function showAllProductAction(){
        // echo "".__FUNCTION__;
        $data1 = $this->obj->getAllProduct();
        include './productlist.html';
    }
    function detailAction(){
        echo "".__FUNCTION__;
    }
    function delAction(){ 
        echo "".__FUNCTION__;
    }
}

$controller = new ProductController();
$act = !empty($_GET['act']) ? $_GET['act'] : "index";
$action = $act."Action";
$controller->$action();//可变函数调用
