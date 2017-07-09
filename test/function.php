<?php

header('content-type:text/html;charset=utf-8');
echo mt_rand(1000,9999);
echo '<hr/>';

$length = strlen("leoliu");
echo "{$length}".'<br>';

echo strlen('leoliu').'<br>';

var_dump(function_exists('test'));

if(!function_exists('test')){
    function test(){
        echo 'create test function';
    }
}
test();

test1();
function test1(){
        echo 'create test1 function';
}
$funca = function(){
    echo 'create no name function';
};

call_user_func($funca);
?>