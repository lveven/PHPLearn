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