<?php
require_once FRAMEWORK . 'BaseModel.class.php';
class ProductModel extends BaseModel{
    function getAllProduct(){
        $sql = "SELECT p.*,t.protype_name FROM product AS p INNER JOIN product_type AS t ON p.protype_id = t.protype_id";
        return $this->db->getRows($sql);
    }
    function delProductById($id){
        $sql = "delete from product where pro_id = $id";
        return $this->db->exec($sql);
    } 
}