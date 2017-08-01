<?php
require_once("../include.php");
function addCate()
{
    $arr = $_POST;
    $sqlManager = new MySqlManager();
    if($sqlManager->insert('imooc_cate',$arr)){
        $msg = "分类添加成功!<br/><a href='addCate.php'>继续添加</a>|<a href='listCate.php'>查看分类</a>";
    }else {
        $msg = "分类添加失败!<br/><a href='addCate.php'>重新添加</a>|<a href='listCate.php'>查看分类</a>";
    }
    return $msg;
}

function getCateById($id)
{
    $sql = "select id,cName from imooc_cate where id={$id}";
    $sqlManager = new MySqlManager();
    $rows = $sqlManager->fetchOne($sql);
    return $rows;
}

function editCate($where)
{
    $arr = $_POST;
    $sqlManager = new MySqlManager();
    if($sqlManager->update("imooc_cate",$arr,$where)){
         $msg = "分类修改成功!<br/><a href='listCate.php'>查看分类</a>";
    }else{
        $msg = "分类修改失败!<br/><a href='listCate.php'>重新修改</a>";
    }
    return $msg;
}

function delCate($where)
{
    $sqlManager = new MySqlManager();
    if($sqlManager->delete("imooc_cate",$where)){
         $msg = "分类删除成功!<br/><a href='listCate.php'>查看分类</a>|<a href='addCate.php'>添加分类</a>";
    }else{
        $msg = "分类删除 失败!<br/><a href='listCate.php'>请重新操作</a>";
    }
    return $msg;
}

function getAllCate()
{
    $sqlManager = new MySqlManager();
    $sql = "select id,cName from imooc_cate";
    $rows = $sqlManager->fetchAll($sql);
    return $rows; 
}