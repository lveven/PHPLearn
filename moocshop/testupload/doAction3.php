<?php
require_once("../include.php");
// $fileInfo = $_FILES['myFile'];
function buildInfo(){
    $i = 0;
    foreach($_FILES as $val){
        if(is_string($val['name'])){
            $files[$i]=$val;
            $i++;
        } else {
            foreach($val['name'] as $key=>$value){
                $files[$i]['name'] = $value;
                $files[$i]['size'] = $val['size'][$key];
                $files[$i]['error'] = $val['error'][$key];
                $files[$i]['type'] = $val['type'][$key];
                $files[$i]['tmp_name'] = $val['tmp_name'][$key];
                $i++;
            }
        }
    }
    return $files;
}

$files = buildInfo();
var_dump($files);