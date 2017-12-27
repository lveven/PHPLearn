<?php
class Single{
    
    //禁止外部创建对象
    private function __construct(){
    }

    private static $instance = null;

    static function shareInstance(){
        if(isset(self::$instance)){
            return self::$instance;
        } else {
            self::$instance = new self();
            return self::$instance;
        }
    }
}


$obj = Single::shareInstance();
var_dump($obj);

echo "<br>";
$obj1 = Single::shareInstance();
var_dump($obj1);
