<?php
/**
 * Created by PhpStorm.
 * User: leoliu
 * Date: 2016/11/27
 * Time: 下午12:00
 */

function sendHttpRespond(int $statusCode,string $statusText){}
sendHttpRespond(200,"OK");

//coercive type
function coerciveInt(int $a){
    echo "a=".$a.'<br>';
}
coerciveInt(1);
coerciveInt("100");
coerciveInt("3.14PI");

function coeriveString(string $b){
    echo "a".$b.'<br>';
}
coeriveString("aaa");
phpinfo();