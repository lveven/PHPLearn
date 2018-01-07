<?php
/**
 * 后台管理首页相关控制器
 */
class ManageController extends BaseController{
    /**
     * 首页动作
     *
     * @return void
     */
    public function indexAction(){
        session_start();
        if(!isset($_SESSION['admin_info'])){
            header('location: index.php?p=back&c=Admin&a=login');
            die();
        } else {
            $user = $_SESSION['admin_info'];
            echo '这里是后台首页！';
            echo '<hr>';
            echo '你好:',$user['admin_name'];
        }
    }
}