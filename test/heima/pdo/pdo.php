<?php

class AdminModel{

}
$dsn = 'mysql:host=192.168.10.10;port=3306;dbname=homestead';
$opt = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'set names utf8');
$pdo = new PDO($dsn,'homestead','secret',$opt);
var_dump($pdo);
echo '<br>';
 
$sql = 'select * from admin_user';
$result = $pdo->query($sql);
echo 'rowcount = '.$result->rowCount();
echo '<br>columncount = '.$result->columnCount();

// 从结果集中获取下一行  
echo '<br>fetch(PDO::FETCH_ASSOC):';//返回一个索引为结果集列名的数组
echo '<br>';
var_dump($result->fetch(PDO::FETCH_ASSOC));

// PDO::FETCH_BOTH（默认）：返回一个索引为结果集列名和以0开始的列号的数组
echo '<br>fetch(PDO::FETCH_BOTH):';
echo '<br>';
var_dump($result->fetch(PDO::FETCH_BOTH));

// PDOStatement::fetchColumn — 从结果集中的下一行返回单独的一列。
echo '<br>fetchColumn():';
echo '<br>';
var_dump($result->fetchColumn(1));

echo '<br>';
echo "<hr>";
$sql = 'select * from admin_user where id = ? and admin_name = ?';
$stmt = $pdo->prepare($sql);
// $stmt->execute(array(1));
$stmt->bindValue(1,1);
$stmt->bindValue(2,'leoliu');
$stmt->execute();
// $userInfo = $stmt->fetch(PDO::FETCH_ASSOC);
// echo $userInfo['admin_name'];
$userInfo = $stmt->fetchObject('AdminModel');
var_dump($userInfo);
echo 'username='.$userInfo->admin_name;
die();

$sql1 = 'updateeee admin_user set a=1';
$result = $pdo->exec($sql1);
if($result === false){
    echo "<br>错误代号:".$pdo->errorCode();
    $e = $pdo->errorInfo();
    echo "<br>错误信息:".$e[2];
} else {

}

//让pdo的错误处理模式切换到 异常处理模式
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
try{
    $sql = 'delete from user_list';
    $result = $pdo->exec($sql);
} catch(PDOException $e){
    echo "<br>错误代号:".$e->GetCode();
    echo "<br>错误信息:".$e->GetMessage();
}
