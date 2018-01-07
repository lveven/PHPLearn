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
        // $result = $this->obj->checkAdmin($user,$pwd);
        //下面方法，当管理员合法时，返回管理员信息（array）
        // 当管理员信息非法时，返回false
        $admin_info = $this->obj->checkAdminInfo($user,$pwd);
        if($admin_info){
            //登录成功。。。。
            session_start();
            $_SESSION['admin_info'] = $admin_info;
            header('Location: index.php?p=back&c=Manage&a=index');
        } else {
            $this->gotoUrl('登录失败','?p=back&c=Admin&a=login');
        }
    }
}