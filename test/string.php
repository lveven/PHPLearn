<?php
$str = "hello world";
$length = strlen($str);
echo "字符串长度：{$length}".'<br>';

$backslash = addcslashes($str,'w');
echo "在指定字母前加反斜杠:{$backslash}".'<br>';

$quotStr = "hello 'w'orld";
$slash = addslashes($quotStr);
echo "在指定字母前加斜杠:{$slash}"."<br>";
?>