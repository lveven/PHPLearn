<?php
$c = !empty($_GET['c']) ? $_GET['c'] : 'User';
require_once './'.$c.'Model.class.php';
require_once './ModelFactory.class.php';
require_once './BaseController.class.php';
require_once './'.$c.'Controller.class.php';

$controllerName = $c.'Controller'; 
$controller = new $controllerName();//可变类
$act = !empty($_GET['a']) ? $_GET['a'] : "index";
$action = $act."Action";
$controller->$action();//可变函数调用