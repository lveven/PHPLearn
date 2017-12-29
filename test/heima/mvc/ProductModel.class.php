<?php
require_once './BaseModel.class.php';
class ProductModel extends BaseModel{
    function getAllProduct(){
        $sql = "select * from product";
        return $this->db->getRows($sql);
    }
}