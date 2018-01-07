<?php
ini_set('session.cookie_lifetime','3600');
ini_set('session.cookie_domain','.php7.app');
//也可以用下面
session_set_cookie_params(3600,'/','.php7.app',false,false);

session_start();
//添加
$_SESSION['user'] = 'leoliu';
$_SESSION['gender'] = 'male';

//修改
$_SESSION['gender'] = 'secret';
//删除
unset($_SESSION['user']);

//获取
var_dump($_SESSION['gender']);
var_dump(isset($_SESSION['gender']));
