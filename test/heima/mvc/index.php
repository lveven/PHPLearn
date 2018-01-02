<?php
$p = !empty($_GET['p']) ? $_GET['p'] : 'front';
$c = !empty($_GET['c']) ? $_GET['c'] : 'User';
require_once './Application/'.$p.'/Models/'.$c.'Model.class.php';
require_once './Framework/ModelFactory.class.php';
require_once './Framework/BaseController.class.php';
require_once './Application/'.$p.'/Controllers/'.$c.'Controller.class.php';

$controllerName = $c.'Controller'; 
$controller = new $controllerName();//可变类
$act = !empty($_GET['a']) ? $_GET['a'] : "index";
$action = $act."Action";
$controller->$action();//可变函数调用