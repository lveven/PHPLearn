<?php

/**
 * 读操作用到的数据
 *
 * @param [string] $sess_id
 * @return string 
 */
function sessRead($sess_id){
    echo __FUNCTION__;
    $link = mysqli_connect('192.168.10.10','homestead','secret');
    mysqli_query($link,'set names utf8');
    mysqli_query($link,'use homestead');
    $sql = "select sess_content from session where sess_id='$sess_id'";
    $result = mysqli_query($link,$sql);
    $row = mysqli_fetch_assoc($result);
    if($row){
        return $row['sess_content'];
    } else {
        return '';
    }
}
/**
 * 写入操作
 *
 * @param [string] $sess_id
 * @param [string] $sess_content
 * @return mixed 
 */
function sessWrite($sess_id,$sess_content){
    echo __FUNCTION__;
    $link = mysqli_connect('192.168.10.10','homestead','secret');
    mysqli_query($link,'set names utf8');
    mysqli_query($link,'use homestead');
    //执行写操作
    //利用sess_id判断是否已经存在该记录，存在则update，不存在则insert
    // replace into：如果主键存在，则替换，否则插入语法与insert into一致
    $sql = "replace into session values('$sess_id','$sess_content',unix_timestamp())";
    return mysqli_query($link,$sql);
}

function sessOpen(){
    echo __FUNCTION__;
    //连接数据库
}

function sessClose(){
    echo __FUNCTION__;
    return true;
}
/**
 * 用户强制执行session_destroy()时，删除对应的session数据
 *
 * @param [string] $sess_id
 * @return bool
 */
function sessDestroy($sess_id){
    echo __FUNCTION__;
    $link = mysqli_connect('192.168.10.10','homestead','secret');
    mysqli_query($link,'set names utf8');
    mysqli_query($link,'use homestead');
    $sql = "delete from session where sess_id='$sess_id'";
    return mysqli_query($link,$sql);
}
function sessGC($maxlifetime){
    echo __FUNCTION__;
    $link = mysqli_connect('192.168.10.10','homestead','secret');
    mysqli_query($link,'set names utf8');
    mysqli_query($link,'use homestead');
    $sql = "delete from session where last_write<unix_timestamp()-$maxlifetime";
    return mysqli_query($link,$sql);
}

//设置session机制存储处理函数
session_set_save_handler('sessOpen','sessClose','sessRead','sessWrite','sessDestroy','sessGC');
