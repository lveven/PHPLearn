<?php
$v1 = 1;
$v2 = 'abc';
$v3 = false;
$v4 = array(1,2,3,4,5);

$str1 = serialize($v1);
$str2 = serialize($v2);
$str3 = serialize($v3);
$str4 = serialize($v4);

file_put_contents("./file1.json",$str1);
file_put_contents("./file2.json",$str2);
file_put_contents("./file3.json",$str3);
file_put_contents("./file4.json",$str4);



