<?php
class Products extends model {
    public function getList($offset = 0, $limit = 3, $filters = array()){
        $array = array();

        $where = array(
            "1=1"
        );

        if(!empty($filters["category"])){
            $where[] = "idCategory = :idCategory";
        }

        $sql = "SELECT *, 
        (SELECT brands.name FROM brands WHERE brands.id = products.idBrand) AS brandName, 
        (SELECT categories.name FROM categories WHERE categories.id = products.idCategory) AS categoryName 
        FROM products 
        WHERE ".implode(' AND ', $where)." LIMIT $offset, $limit ";
        $sql = $this->db->prepare($sql);

        if(!empty($filters["category"])){
            $sql->bindValue(":idCategory", $filters["category"]);
        }

        $sql->execute();

        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();

            foreach($array AS $key => $item){
                $array[$key]["images"] = $this->getImagesByProductId($item["id"]);
            }
        }

        return $array;
    }

    public function getTotal($filters = array()){
        $where = array(
            "1=1"
        );

        if(!empty($filters["category"])){
            $where[] = "idCategory = :idCategory";
        }

        $sql = "SELECT COUNT(*) as c 
        FROM products
        WHERE ".implode(' AND ', $where)." ";
        $sql = $this->db->prepare($sql);
        

        if(!empty($filters["category"])){
            $sql->bindValue(":idCategory", $filters["category"]);
        }

        $sql->execute();
        $sql = $sql->fetch();
        
        return $sql["c"];
    }

    public function getImagesByProductId($id) {
        $array = array();

        $sql = "SELECT product_images.url FROM product_images WHERE product_images.idProduct = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
        }

        return $array;
    }
}