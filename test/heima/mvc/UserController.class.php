<?php
require_once './UserModel.class.php';
require_once './ModelFactory.class.php';
require_once './BaseController.class.php';

class UserController extends BaseController{
    private $obj = null;

    function __construct(){
        $this->obj = ModelFactory::M('UserModel');
    }

    function detailAction(){
        $id = $_GET['id'];
        $data = $this->obj->getUserInfoById($id);
        include './UserInfo.html';
    }

    function showFormAction(){
        include './addUserView.html';
    }

    function addUserAction(){
        $user_name = $_POST['user_name'];
        $age = $_POST['age'];
        $edu = $_POST['edu'];
        $aihao = $_POST['aihao'];
        $xingqu = implode(",",$aihao);
        $from = $_POST['from'];
        $result = $this->obj->insertUser($user_name,$age,$edu,$xingqu,$from);
        // echo "<font color=red>添加用户成功</font>";
        // echo "<a href='?'>返回</a>";
        $this->gotoUrl('添加用户成功','?',3);
    }

    function delAction(){
        $id = $_GET['id'];
        $result = $this->obj->delUserById($id);
        // echo '<font color=red> 删除成功</font>';
        // echo "<a href='?'>返回</a>";
        $this->gotoUrl('删除成功','?',3);
    }

    function indexAction(){
        $data1 = $this->obj->getAllUser();
        $data2 = $this->obj->getUserCount(); 
        //载入视图文件以显示2份数据
        include './userlist.html';
    }

    function editAction(){
        $id = $_GET['id'];
        $user = $this->obj->getUserInfoById($id);
        $aihao = explode(",",$user['xingqu']);
        include './eidtUserView.html';
    }

    function updateUserAction(){
        $userId = $_POST['id'];
        $user_name = $_POST['user_name'];
        $age = $_POST['age'];
        $edu = $_POST['edu'];
        $aihao = $_POST['aihao'];
        $xingqu = implode(",",$aihao);
        $from = $_POST['from'];
        $result = $this->obj->updateUser($userId,$user_name,$age,$edu,$xingqu,$from);
        // echo "<font color=red>添加用户成功</font>";
        // echo "<a href='?'>返回</a>";
        $this->gotoUrl('添加用户成功','?',3);
    }
}

$controller = new UserController();
$act = !empty($_GET['a']) ? $_GET['a'] : "index";
$action = $act."Action";
$controller->$action();//可变函数调用
