<?php
require_once './BaseModel.class.php';
class ProductModel extends BaseModel{
    function getAllProduct(){
        $sql = "SELECT p.*,t.protype_name FROM product AS p INNER JOIN product_type AS t ON p.protype_id = t.protype_id";
        return $this->db->getRows($sql);
    }
}