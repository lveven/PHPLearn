<?php
require_once("../include.php");

function uploadFile($fileInfo,$path = "uploads",$allowUploadExt = array('jpeg','jpg','png','gif','wbmp'),$maxSize = 1048576,$imageFlag = true){
    $filename = $fileInfo['name'];
    $tmpName = $fileInfo['tmp_name'];
    $error = $fileInfo['error'];
    $size = $fileInfo['size'];

    if($error == UPLOAD_ERR_OK){
        $ext = getExt($filename);
        //限制上传文件类型
        if(!in_array($ext,$allowUploadExt)){
            exit('文件类型非法');
        }
        if($size > $maxSize){
            exit('文件过大');
        }

        if($imageFlag){
            //验证图片是否是真正的图片类型
            $info = getimagesize($tmpName);
            // var_dump($info);exit;
            if(!$info){
                exit('不是真正的图片类型');
            }
        }
        $filename = getUniName().".".$ext;
        if(!file_exists($path)){
            mkdir($path,0777,true);
        }
        $destination = $path."/".$filename;
        // 判断文件是否是通过HTTP POST 方式上传的
        if(is_uploaded_file($tmpName)){
            if(move_uploaded_file($tmpName,$destination)){
                $msg = "文件移动成功";
            } else {
                $msg = "文件移动失败";
            }
        } else {
            $msg = "文件不是通过HTTP POST 上传上来的";
        }
    } else {
        switch($error){
            case UPLOAD_ERR_INI_SIZE:
            // 其值为 1，上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值。
            $msg = "超过了配置文件设置的上传大小"; 
            break;
            case UPLOAD_ERR_FORM_SIZE:
            // 其值为 2，上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值。
            $msg = "超过了Form表单中设置的最大大小";
            break;
            case UPLOAD_ERR_PARTIAL:
            // 其值为 3，文件只有部分被上传。
            $msg = "文件只有部分被上传";
            break;
            case UPLOAD_ERR_NO_FILE:
            // 其值为 4，没有文件被上传。
            $msg = "没有文件被上传";
            break;
            case UPLOAD_ERR_NO_TMP_DIR:
            // 其值为 6，找不到临时文件夹。PHP 4.3.10 和 PHP 5.0.3 引进。
            $msg = "没有找到临时文件";
            break;
            case UPLOAD_ERR_CANT_WRITE:
            // 其值为 7，文件写入失败。PHP 5.1.0 引进。
            $msg = "文件不可写";
            break;
            case UPLOAD_ERR_EXTENTION:
            $msg = "由于PHP的扩展中断了文件上传";
            break;
            default:
            $msg = "未知错误";
        }
    }
    return $msg;
}

