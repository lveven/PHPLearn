<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
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
$sql = "SHOW TABLES";
$result = mysqli_query($link,$sql); 
if($result === false){
    echo "执行查询语句失败：".mysqli_error($link);
} else {
    echo "执行成功！数据如下:";
    while($rowResult = mysqli_fetch_array($result)){
        $tb_name = $rowResult[0];
        echo "<br/>".$tb_name;
        echo "<a href='./tables1.php?db={$db_name}&tb={$tb_name}&type=1'>查看表结构</a>";
        echo "<a href='./tables1.php?db={$db_name}&tb={$tb_name}&type=2'>查看表数据</a>";
    }
}
?>
</body>
</html>

