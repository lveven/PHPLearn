<?php
echo "<table border='1'>";
foreach($_SERVER as $key => $value){
    echo "<tr>";
    echo "<td>$key</td>";
    echo "<td>$value</td>";
    echo "</tr>";
}
echo "</table>";

define("PI",3.14);
define('ZERO',0);

echo "hello world".PI;

const CONSTPI = 3.13;
echo "<br>";
echo constant("CONSTPI");
echo "<br>".CONSTPI;


if(defined("ZERO")){
    echo "<br>存在";
} else {
    echo "<br>不存在";
}

echo "<hr>";
echo "最大整数值：".PHP_INT_MAX;
echo "PHP版本：".PHP_VERSION;
echo "PHP运行系统：".PHP_OS;
echo "<hr>";
echo "<br>".__FILE__;
echo "<br>".__DIR__;
echo "<br>".__LINE__;
echo "<br>".__LINE__;

echo "<hr>进制转换";
$n1 = 123;      //十进制
$n2 = 0123;     //八进制
$n3 = 0x123;    //十六进制
$n4 = 0b1010;   //二进制

echo "<br>".bindec("1010")."<br>";
echo "<br>".octdec("1010")."<br>";
echo "<br>".hexdec("1010")."<br>";

echo "<hr>浮点数";
$v1 = 8.1;
if($v1 >= 2.7){
    echo "==";
} else {
    echo "!=";
}
echo gettype($v1);
var_dump($v1);

$str3 = <<<"TAG_A"
hello "leoliu"\n\n
hi 'leoliu'
TAG_A;

$str4 = <<<'EOF'
"hahaha"
sldkfsjdfsdf
EOF;
echo $str4;

echo "<br>";
$v2 = 300;
echo $v2;
settype($v2,"string");
echo "类型转化:".$v2;


echo "<br>";
echo "相对路径引入:<br>";
include "./page1.php"; 

echo "<br>绝对路径引入:";
echo __DIR__."/page1.php<br>";
include __DIR__."/page1.php";


echo "<br>绝对路径引入:";
$root = $_SERVER["DOCUMENT_ROOT"];
echo $root."/PHPLearn/test/heima/page1.php<br>";
include $root."/PHPLearn/test/heima/page1.php";

//不显示错误
ini_set("display_errors",0);
echo $abc;

ini_set("error_reporting",E_NOTICE | E_WARNING);//显示2个级别的错误

//记录错误日志
ini_set("log_erros",1); 

ini_set("error_log","abc.txt");

//记录到系统日志中
ini_set("error_log","syslog");

set_error_handler("my_error_handler");

/**
 * 错误处理
 *
 * @param [int] $errorCode  错误码
 * @param [type] $errMsg    错误信息
 * @param [type] $errFile   发生错误的文件名
 * @param [type] $errLine   发生错误的行号
 * @return void
 */
function my_error_handler($errorCode,$errMsg,$errFile,$errLine)
{
    echo "<h1><font color='red'>大事不好发生错误</font></h1>";
    echo "<br/>错误号：".$errorCode;
    echo "<br/>错误信息：".$errMsg;
    echo "<br/>错误文件：".$errFile;
    echo "<br/>错误行号：".$errLine;
    echo "<br/>错误发生时间：".date("Y-d-m H:i:s");
}

echo $bcd;