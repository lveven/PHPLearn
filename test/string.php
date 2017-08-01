<?php
$str = "hello world";
$length = strlen($str);
echo "字符串长度：{$length}".'<br>';

$backslash = addcslashes($str,'w');
echo "在指定字母前加反斜杠:{$backslash}".'<br>';

$quotStr = "hello 'w'orld";
$slash = addslashes($quotStr);
echo "在指定字母前加斜杠:{$slash}"."<br>";

$tag = get_magic_quotes_gpc();
// echo $tag;
var_dump($tag);

/*
    print 相关
*/

echo "----printf-----"."<hr>";

$number = 9;
$str = "Beijing";

echo "----printf:打印格式化字符串"."<br>";
printf("There are %u million bicycles in %s.",$number,$str);
echo "<br>";

$file = fopen('test.txt','w');
echo "----fprintf:向文件中写入"."<br>";
echo fprintf($file,"There art %u million bicycles in %s.",$number,$str);

echo "----sprintf:把格式化的字符串写入一个变量中"."<br>";
$txt = sprintf("There are %u million bicycles in %s.",$number,$str);
echo $txt;
echo "<br>";

echo addcslashes("----vprintfvsprintfvfprintf:打印格式化字符串"."<br>","v");
vprintf("There are %u million bicycles in %s.",array($number,$str));

echo "<br>";

echo "----chop()-----"."<hr>";
echo "----chop() 函数移除字符串右侧的空白字符或其他预定义字符"."<br>";
$chop = "hello world!";
// $newChop = chop($chop);
$newChop = chop($chop,"world!");
echo $newChop;
echo "<br>";

echo "----explode()-----"."<hr>";
echo "----explode() 使用一个字符串分割另一个字符串，并返回由字符串组成的数组"."<br>";
$explode = "www.baidu.com";
// $newChop = chop($chop);
$newExplode = explode(".",$explode);
print_r($newExplode);
echo "<br>";
?>