<?php
//设置值
// $result = setcookie('is_login',true);
// var_dump($result);

// // 设置了一个1小时后失效的cookie
// $result = setcookie('long_time','after-3600',time()+3600);

// //删除cookie的方法
// // 1、设置过期时间(通用做法)
// $result = setcookie('expires','expires',time()-1);//删除cookie

// //2、设置空字符串
// $result = setcookie('autoDelete','');//删除cookie
// var_dump($result);

// //该cookie在homestead.app的二级域名下都有效
// $result = setcookie('subDomain','allowDomain',0,'','.homestead.app');

// $result = setcookie('secure_no','no',0,'','',false);//在https和http都允许传输
// $result = setcookie('secure_yes','yes',0,'','',true);//在https和http都允许传输

setcookie('httponly_no','no',0,'','',false,false);//除了http请求其他地方也可以使用
setcookie('httponly_yes','yes',0,'','',false,true);//除了http请求其他地方不可以使用
