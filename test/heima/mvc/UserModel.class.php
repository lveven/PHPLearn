<?php
require_once './MySQLService.class.php';
class UserModel{
    // private $config = array(
    //     'host' => '47.94.18.56',
    //     'port' => 3306,
    //     'user' => 'root',
    //     'passwd'=> 'root',
    //     'dbname'=> 'hm',
    //     'charset'=> 'utf8'
    // );

    private $config = array(
        'host' => '192.168.10.10',
        'port' => 3306,
        'user' => 'homestead',
        'passwd'=> 'secret',
        'dbname'=> 'homestead',
        'charset'=> 'utf8'
    );
    function getAllUser(){
        $sql = "select * from usertable;";
        $db = MySQLService::shareInstance($this->config);
        $data = $db->getRows($sql);
        return $data;
    }

    function getUserCount(){
        $sql = "select count(*) as c from usertable;";
        $db = MySQLService::shareInstance($this->config);
        $data = $db->getOneData($sql);
		return $data;
    }
}