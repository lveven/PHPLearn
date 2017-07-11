<?php
/**
 * 单例模式
 */
class Db{
    private $_dbConfig = array(
        'host' => 'localhost',
        'user' => 'homestead',
        'password' => 'secret',
        'port' => '33060',
        'database' => 'video'
    );

    static private $_link;
    static private $_instance;
    private function __construct(){

    }
    static public function getInstance(){
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function connect(){
        if(!self::$_link){
            self::$_link = mysqli_connect($this->_dbConfig['host'],$this->_dbConfig['user'],$this->_dbConfig['password']);
            if(!self::$_link){
                die('mysql connect error. errorno:' . mysqli_connect_errno() . 'errorinfo:'.mysqli_connect_error());
            }

            mysqli_select_db(self::$_link,$this->_dbConfig['database']);
            $sql = 'SET NAMES UTF8';
            mysqli_query(self::$_link,$sql);
        }
        return self::$_link;
    }
}
$db = Db::getInstance();
$connect = $db->connect();
$sql = "select * from video";
$result = mysqli_query($connect,$sql);
var_dump($result);
?>