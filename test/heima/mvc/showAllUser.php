<?php
require_once './UserModel.class.php';
$obj_user = new UserModel();
$data1 = $obj_user->getAllUser();
$data2 = $obj_user->getUserCount(); 

//载入视图文件以显示2份数据
include './showAllUserView.html';