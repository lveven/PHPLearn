<?php
// require "./ProductModel.class.php";
// require "./ModelFactory.class.php";
// require_once './BaseController.class.php';
class ProductController extends BaseController{
    private $obj = null;
    function __construct(){
        $this->obj = ModelFactory::M('ProductModel');
    }
    function showAllProductAction(){
        // echo "".__FUNCTION__;
        $data1 = $this->obj->getAllProduct();
        include './Application/front/Views/productlist.html';
    }
    function detailAction(){
        echo "".__FUNCTION__;
    }
    function delAction(){ 
        echo "".__FUNCTION__;
        $id = $_GET['id']; 
        $result = $this->obj->delProductById($id);
        $this->gotoUrl('删除成功','?c=Product&a=showAllProduct',1);
    }
}

// $controller = new ProductController();
// $act = !empty($_GET['a']) ? $_GET['a'] : "index";
// $action = $act."Action";
// $controller->$action();//可变函数调用
