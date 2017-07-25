<?php
header('content-type:text/html;charset=utf8');
//时区设置 中国
date_default_timezone_set('PRC');
session_start();
// define('ROOT',__DIR__);
define('ROOT',dirname(__FILE__));
set_include_path('.'.PATH_SEPARATOR.ROOT.'/lib'.PATH_SEPARATOR.ROOT.'/core'.PATH_SEPARATOR.ROOT.'/configs'.PATH_SEPARATOR.get_include_path());

// echo  PATH_SEPARATOR."<br>"; //:
// echo PATH_SEPARATOR.ROOT.'/lib'; //:/home/vagrant/Code/phplearn/moocshop/lib
require_once('configs.php');
require_once('mysql.func.php');
require_once('image.func.php');
require_once('string.func.php');
require_once('common.func.php');
require_once('admin.inc.php');
// connect();