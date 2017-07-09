<?php
$a = 10;
$b = 20;

$c = '0'; // true
$c = '';//true
$c = '0.0';//empty= false

$c = 0.0;//true
$c = 0;//true
$c = null;//true
$c = array();//true

if(empty($c)){
    echo '\'0\''.' is empty<br>';
} else {
    echo '\'0\''.'is not empty<br>';
}

if(isset($c)){
    echo '\'0\''.' is set<br>';
} else {
    echo '\'0\''.' is not set<br>';
}

phpinfo();
