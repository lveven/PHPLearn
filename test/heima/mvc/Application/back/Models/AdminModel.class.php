<?php
require_once './Framework/BaseModel.class.php';
class AdminModel extends BaseModel{
    function checkAdmin($user,$pwd){
        $sql = "SELECT COUNT(*) AS c FROM admin_user where admin_name='$user' AND admin_pass=md5('$pwd');";
        $result = $this->db->getOneData($sql);
        if($result === 1){
            return true;
        } else {
            return false;
        }
    }
}