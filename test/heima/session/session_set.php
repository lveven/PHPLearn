<?php
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
