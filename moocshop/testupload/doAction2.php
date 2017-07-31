<?php
require_once("../include.php");
// $fileInfo = $_FILES['myFile'];
foreach($_FILES as $val){
    $msg = uploadFile($val);
    echo $msg;
}