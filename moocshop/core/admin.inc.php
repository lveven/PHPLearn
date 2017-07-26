<?php
require_once('../include.php');
function checkAdmin($sql){
    $sqlManager = new MySqlManager();
    // return fetchOne($sql);
    return $sqlManager->fetchOne($sql);
}

function checkLogined(){
    if($_SESSION['adminId']=="" && $_COOKIE['adminId']==""){
        alertMsg("请登录","loginnew.php");
    }
}

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