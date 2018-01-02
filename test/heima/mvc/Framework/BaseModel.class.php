<?php
require_once FRAMEWORK.'MySQLService.class.php';
class BaseModel{
    protected $db = null;
    function __construct(){
    //$config = array(
    //     'host' => '47.94.18.56',
    //     'port' => 3306,
    //     'user' => 'root',
    //     'passwd'=> 'root',
    //     'dbname'=> 'hm',
    //     'charset'=> 'utf8'
    // );
        $config = array(
            'host' => '192.168.10.10',
            'port' => 3306,
            'user' => 'homestead',
            'passwd'=> 'secret',
            'dbname'=> 'homestead',
            'charset'=> 'utf8'
        );
        $this->db = MySQLService::shareInstance($config);
    }
}