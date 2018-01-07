<?php
require_once './Framework/BaseModel.class.php';
class AdminModel extends BaseModel{
    public function checkAdmin($user,$pwd){
        $sql = "SELECT COUNT(*) AS c FROM admin_user where admin_name='$user' AND admin_pass=md5('$pwd');";
        $result = $this->db->getOneData($sql);
        if($result == 1){
            $sql = "UPDATE admin_user SET login_times = login_times+1,last_login_time = now()";
            $sql .= "where admin_name='$user' AND admin_pass=md5('$pwd');";
            $result = $this->db->exec($sql);
            return true;
        } else {
            return false;
        }
    }
    /**
     * 校验管理员是否合法
     *
     * @param string $user管理员名
     * @param stirng $pwd密码 
     * @return mixed array:合法，管理员信息数组；false:非法
     */
    public function checkAdminInfo($user,$pwd){
        $sql = "SELECT * FROM admin_user where admin_name='$user' AND admin_pass=md5('$pwd')";
        $result = $this->db->getOneRow($sql);
        return $result;
    }
}