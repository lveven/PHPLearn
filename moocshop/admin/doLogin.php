<?php 
require_once '../include.php';
$username=$_POST['username'];
$username=addslashes($username);
$password=md5($_POST['password']);
$verify=$_POST['verify'];
$verify1=$_SESSION['verify'];
$autoFlag=isset($_POST['autoFlag']) ? $_POST['autoFlag'] : false;
echo $username;
if($verify==$verify1){
	$sql="select * from imooc_admin where username='{$username}' and password='{$password}'";
	$row=checkAdmin($sql);
	if($row){
		//如果选了一周内自动登陆
		if($autoFlag){
			setcookie("adminId",$row['id'],time()+7*24*3600);
			setcookie("adminName",$row['username'],time()+7*24*3600);
		}
		$_SESSION['adminName']=$row['username'];
		$_SESSION['adminId']=$row['id'];
		alertMsg("登陆成功","index.php");
	}else{
		alertMsg("登陆失败，重新登陆","loginnew.php");
	}
}else{
	alertMsg("验证码错误","loginnew.php");
}