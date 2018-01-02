<?php
$p = !empty($_GET['p']) ? $_GET['p'] : 'front';

define('PLATFORM',$p);
define('DS',DIRECTORY_SEPARATOR); //目录分隔符 只有两个：'/'(unix系统) '\'(window系统)
define('ROOT',__DIR__.DS);
define('APP',ROOT.'Application'.DS);//application 的完整路径
define('FRAMEWORK',ROOT.'Framework'.DS);//框架基础类 的完整路径
define('PLAT_PATH',APP.PLATFORM.DS);//平台所在目录
define('CTRL_PATH',PLAT_PATH.'Controllers'.DS);//当前控制器所在目录
define('MODEL_PATH',PLAT_PATH.'Models'.DS);//当前模型所在目录
define('VIEW_PATH',PLAT_PATH.'Views'.DS);//当前视图所在目录
echo CTRL_PATH;
$c = !empty($_GET['c']) ? $_GET['c'] : 'User';
require_once MODEL_PATH.$c.'Model.class.php';
require_once FRAMEWORK.'ModelFactory.class.php';
require_once FRAMEWORK.'BaseController.class.php';
require_once CTRL_PATH.$c.'Controller.class.php';

$controllerName = $c.'Controller'; 
$controller = new $controllerName();//可变类
$act = !empty($_GET['a']) ? $_GET['a'] : "index";
$action = $act."Action";
$controller->$action();//可变函数调用