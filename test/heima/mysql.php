<?php
require_once "./configure.php";
class MySQLService{
    private $link = null;
    private function __construct($host,$user,$password){
        $link = mysqli_connect('192.168.10.10','homestead','secret');
    }

    private $shareInstance = null;
    static function shareInstance(){
        if(isset(self::$shareInstance)){
            return self::$shareInstance;
        } else {
            self::$shareInstance = new self();
        }
    }
    function setCharset($charset){
        
    }

}