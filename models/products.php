<?php
class Products extends model {
    public function getList(){
        $array = array();

        $sql = "SELECT *, 
        (SELECT brands.name FROM brands WHERE brands.id = products.idBrand) AS brandName, 
        (SELECT categories.name FROM categories WHERE categories.id = products.idCategory) AS categoryName 
        FROM products";
        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();

            foreach($array AS $key => $item){

            }
        }

        return $array;
    }
}