<?php
/**
 * 提示并跳转
 *
 * @param [string] $msg
 * @param [string] $url
 * @return void
 */
function alertMsg($msg,$url){
    echo "<script>alert('{$msg}');</script>";
    echo "<script>window.location='{$url}'</script>";
}