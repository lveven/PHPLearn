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
            echo '登录成功。。。。';
            // header('');
        } else {
            $this->gotoUrl('登录失败','?p=back?c=admin&a=login');
        }
    }
}