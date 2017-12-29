<?php
require_once './UserModel.class.php';
require_once './ModelFactory.class.php';
$obj = ModelFactory::M('UserModel');
if(!empty($_GET['act']) && $_GET['act'] == 'del'){
    $id = $_GET['id'];
    $result = $obj->delUserById($id);
    echo '<font color=red> 删除成功</font>';
} 
$data1 = $obj->getAllUser();
$data2 = $obj->getUserCount(); 

//载入视图文件以显示2份数据
include './showAllUserView.html';