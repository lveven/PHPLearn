<?php
$str1 = file_get_contents('./file1.json');
$str2 = file_get_contents('./file2.json');
$str3 = file_get_contents('./file3.json');
$str4 = file_get_contents('./file4.json');

$v1 = unserialize($str1);
$v2 = unserialize($str2);
$v3 = unserialize($str3);
$v4 = unserialize($str4);

var_dump($v1);echo "<br>";
var_dump($v2);echo "<br>";
var_dump($v3);echo "<br>";
var_dump($v4);echo "<br>";