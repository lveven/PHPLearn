<?php
class AdminController extends BaseController{
    private $obj = null;

    function __construct(){
        $this->obj = ModelFactory::M('AdminModel');
    }

    function loginAction(){
        include './Application/back/Views/login.html';
    }

    function checkLoginAction(){
        $user = $_POST['username'];
        $pwd = $_POST['password'];
        $result = $this->obj->checkAdmin($user,$pwd);
        if($result){
            //登录成功。。。。
            header('Location: index.php?p=back&c=Manage&a=index');
        } else {
            $this->gotoUrl('登录失败','?p=back&c=Admin&a=login');
        }
    }
}