<?php
require_once './Framework/BaseModel.class.php';
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

    function getUserInfoById($id){
        $sql = "select * from usertable where id = {$id}";
        $data = $this->db->getOneRow($sql);
        return $data;
    }

    function delUserById($id){
        $sql = "delete from usertable where id = {$id}";
        $data = $this->db->exec($sql);
        return $data;
    }

    function insertUser($user_name,$age,$edu,$xingqu,$from){
        $sql = "insert into usertable (user_name,age,edu,xingqu,fromwhere,reg_time)values(";
        $sql .= "'$user_name',$age,'$edu','$xingqu','$from',now())";
        $result = $this->db->exec($sql);
        return $result;
    }

    function updateUser($userId,$user_name,$age,$edu,$xingqu,$from){
        $sql = "update usertable set user_name='$user_name'";
        $sql .= ",age=$age";
        $sql .= ",edu='$edu'";
        $sql .= ",xingqu='$xingqu'";
        $sql .= ",fromwhere='$from'";
        $sql .= "where id = $userId";
        $result = $this->db->exec($sql);
        return $result;
    }
}