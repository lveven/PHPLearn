<?php
require_once('../include.php');
/**
 * 检查用户是否存在
 *
 * @param [type] $sql
 * @return void
 */
function checkAdmin($sql){
    $sqlManager = new MySqlManager();
    // return fetchOne($sql);
    return $sqlManager->fetchOne($sql);
}
/**
 * 检查是否登陆
 *
 * @return void
 */
function checkLogined(){
    if($_SESSION['adminId']=="" && $_COOKIE['adminId']==""){
        alertMsg("请登录","loginnew.php");
    }
}

/**
 * 注销用户
 *
 * @return void
 */
function logout(){
    $_SESSION=array();
    if(isset($_COOKIE[session_name()])){
        setcookie(session_name(),"",time()-1);
    }
    if(isset($_COOKIE['adminId'])){
        setcookie('adminId',"",time()-1);
    }
    if(isset($_COOKIE['adminName'])){
        setcookie('adminName',"",time()-1);
    }
    session_destroy();  
    header("location:loginnew.php");
}
/**
 * 添加管理员
 *
 * @return void
 */
function addAdmin(){
    $arr = $_POST;
    $arr["password"]=md5($arr["password"]);
    $sqlManager = new MySqlManager();
    if($sqlManager->insert('imooc_admin',$arr)){
        $msg = "添加成功!<br/><a href='addAdmin.php'>继续添加</a> | <a href='listAdmin.php'>查看管理员列表</a>";
    }else {
        $msg = "添加失败!<br/><a href='addAdmin.php'>重新添加</a>";
    }
    return $msg;
}

function getAllAdmin(){
    $sql = "select id,username,email from imooc_admin";
    $sqlManager = new MySqlManager();
    $rows = $sqlManager->fetchAll($sql);
    return $rows;
}

function editAdmin($id){
    $arr = $_POST;
    $arr['password']=md5($arr['password']);
    $sqlManager = new MySqlManager(); 
    if($sqlManager->update("imooc_admin",$arr,"id={$id}")){
           $msg = "编辑成功!<br/><a href='listAdmin.php'>查看管理员列表</a>";
    } else {
       $msg = "编辑失败!<br/><a href='listAdmin.php'>请重新修改</a>";
    }
    return $msg;
}
/**
 * 删除管理员
 *
 * @param [string] $id
 * @return void
 */
function delAdmin($id){
    $sqlManager = new MySqlManager(); 
    if($sqlManager->delete("imooc_admin","id={$id}")){
       $msg = "删除成功!<br/><a href='listAdmin.php'>查看管理员列表</a>";
    } else {
       $msg = "删除失败!<br/><a href='listAdmin.php'>请重新删除</a>";
    }
    return $msg;
}

function getAdminByPage($pageSize=2){
    $page=isset($_REQUEST['page'])?(int)$_REQUEST['page']:1;
    $sqlManager = new MySqlManager();
    $sql="select * from imooc_admin";
    $totalRows=$sqlManager->getResultNum($sql);
    global $totalPage;
    $totalPage=ceil($totalRows/$pageSize);
    $page=isset($_REQUEST['page'])?(int)$_REQUEST['page']:1;
    if($page<1||$page==null||!is_numeric($page)){
        $page=1;
    }
    if($page>=$totalPage)$page=$totalPage;
    $offset=($page-1)*$pageSize;
    $sql="select id,username,email from imooc_admin limit {$offset},{$pageSize}";
    $rows= $sqlManager->fetchAll($sql);
    return $rows;
}