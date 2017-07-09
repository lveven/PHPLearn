<?php
$servername = "localhost";
$username = "homestead";
$password = "secret";

//面向对象
$conn = new mysqli($servername,$username,$password);
if($conn->connect_error){
    die("连接失败：".$conn->connect_error);
}

$sql = "SHOW DATABASES;";
$result = $conn->query($sql);
var_dump($result);

if($result->num_rows > 0)
{
    while($row = $result->fetch_assoc())
    {
        echo $row['Database']."<br>";
    }
}

//面向过程
// // 创建连接
// $conn = mysqli_connect($servername, $username, $password);
// // 检测连接
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }
echo "connect success";

$conn->close();
?>