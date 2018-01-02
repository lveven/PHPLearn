<?php
class BaseController {
    function __construct(){
        header("content-type:text/html;charset=utf-8");
    }

    /**
     * 显示一定的简短的文字提示，然后自动跳转(可以设定停留的时间秒数)
     *
     * @param [string] $msg
     * @param [string] $url
     * @param integer $time 单位s
     * @return void
     */
    function gotoUrl($msg,$url,$time=3){
        echo "<font color=red>$msg</font>";
        echo "<br /><a href='$url'>返回</a>";
        echo "<br/>页面将在{$time}秒后自动跳转.";
        header("refresh:$time;url=$url");//自动定时跳转
    }
}