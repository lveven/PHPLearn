<?php
//连接数据库
define("HOST","192.168.10.10");
define("USER_NAME","homestead");
define("USER_PASSWORD","secret");
$link = mysqli_connect(HOST,USER_NAME,USER_PASSWORD);

//设置连接编码
mysqli_query($link,"set names utf8");

$db_name = "homestead";
if(isset($_GET["db"])){
    $db_name = $_GET["db"];
}

//选择使用的数据库
mysqli_query($link,"use {$db_name}");
$sql = "select * from user_info";
$sql = "SHOW TABLES";
$result = mysqli_query($link,$sql); 
if($result === false){
    echo "执行查询语句失败：".mysqli_error($link);
} else {
    echo "执行成功！数据如下:";
    echo "<table border='1'>";
    $field_count = mysqli_num_fields($result);
    echo "<tr>";
    for( $i = 0 ; $i < $field_count; ++$i){
       $fInfo = mysqli_fetch_field_direct($result,$i); 
       echo "<td>".$fInfo->name."</td>";
    }
    echo "</tr>";
    // 写法一
    // while($rowResult = mysqli_fetch_assoc($result)){
    //     echo "<tr>";
    //     foreach($rowResult as $key => $value){
    //         // var_dump($rowResult);
    //         echo "<td>".$value."</td>";
    //     }
    //     echo "</tr>";
    // }
    // 写法二
    while($rowResult = mysqli_fetch_array($result)){
        echo "<tr>";
        for($i = 0 ; $i < $field_count ; ++$i){
            $fInfo = mysqli_fetch_field_direct($result,$i); 
            echo "<td>{$rowResult[$fInfo->name]}</td>";
        }
        echo "</tr>";
    }
    
    echo "</table>";
}