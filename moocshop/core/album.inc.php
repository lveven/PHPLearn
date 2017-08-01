<?php
require_once("../include.php");
function addAlbum($arr){
    $sqlManager = new MySqlManager();
    $sqlManager->insert("imooc_album",$arr);
}