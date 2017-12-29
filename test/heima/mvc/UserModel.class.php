<?php
require_once './BaseModel.class.php';
class UserModel extends BaseModel{
    function getAllUser(){
        $sql = "select * from usertable";
        $data = $this->db->getRows($sql);
        return $data;
    }

    function getUserCount(){
        $sql = "select count(*) as c from usertable";
        $data = $this->db->getOneData($sql);
		return $data;
    }

    function delUserById($id){
        $sql = "delete from usertable where id = {$id}";
        $data = $this->db->exec($sql);
        return $data;
    }
}