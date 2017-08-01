<?php
require_once("../include.php");
function addPro()
{
    $sqlManager = new MySqlManager();
    $arr = $_POST;
    $arr['pubTime'] = time();
    $path = "./uploads";
    $uploadFiles = uploadFile($path);
    if(is_array($uploadFiles)&&$uploadFiles){
        foreach($uploadFiles as $uploadfile){
            $filename = $path."/".$uploadfile['name'];
            $dstfilenames = "../image_50/".$uploadfile['name'];
            $dstfilenamem = "../image_220/".$uploadfile['name'];
            $dstfilenamel = "../image_350/".$uploadfile['name'];
            $dstfilenamell = "../image_800/".$uploadfile['name'];
            thumb($filename,$dstfilenames,50,50,FALSE);
            thumb($filename,$dstfilenamem,220,220,FALSE);
            thumb($filename,$dstfilenamel,350,350,FALSE);
            thumb($filename,$dstfilenamell,800,800,FALSE);
        }
    }
    $res = $sqlManager->insert("imooc_pro",$arr); 
    $pid = $sqlManager->getInsertId();
    if($res&&$pid){
        $arr1['pid']=$pid;
        $arr1['albumPath']=$uploadfile['name'];
        addAlbum($arr1);
        $msg = "<p>添加成功！</p><a href='addPro.php' target='mainFrame'>继续添加</a>|<a href='listPro.php' target='mainFrame'>查看商品列表</a>";
    } else {
        foreach($uploadFiles as $uploadfile){
            $file80 = "../image_800/".$uploadfile['name'];
            $file50 = "../image_50/".$uploadfile['name'];
            $file22 = "../image_220/".$uploadfile['name'];
            $file35 = "../image_350/".$uploadfile['name'];
            if(file_exists($file80)){
                unlink($file80);
            }

            if(file_exists($file35)){
                unlink($file35);
            }

            if(file_exists($file50)){
                unlink($file50);
            }

            if(file_exists($file22)){
                unlink($file22);
            }
        }
        $msg = "<p>添加失败！</p><a href='addPro.php' target='mainFrame'>重新添加</a>";
    }
    return $msg;
}