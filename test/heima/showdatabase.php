<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>showdatabases</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
<?php
define("HOST","192.168.10.10");
define("USER_NAME","homestead");
define("USER_PASSWORD","secret");
$link = mysqli_connect(HOST,USER_NAME,USER_PASSWORD);
mysqli_query($link,"set names utf8");
$sql = "show databases";
$result = mysqli_query($link,$sql);
if($result === false){
    echo "发生错误：".mysqli_error($link);
} else {
    while($rowResult = mysqli_fetch_array($result)){
        $db_name = $rowResult[0];
        echo "<br/>".$db_name;
        echo "<a href='./tables.php?db={$db_name}'>查看表</a>";
    }
}
?>
</body>
</html>