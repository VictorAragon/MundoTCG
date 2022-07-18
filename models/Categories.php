<?php
class Categories extends model {

    public function getList() {
        $array = array();

        $sql = "SELECT * FROM categories ORDER BY subcat DESC";
        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0){
            foreach($sql->fetchAll() AS $item){
                $item["subs"] = array();
                $array[$item["id"]] = $item;
            }

            while($this->stillNeed($array)){
                $this->organizeCategory($array);
            }

        }

        return $array;
    }
    
    public function getCategoryTree($id){
        $array = array();

        $haveChild = "true";
        while($haveChild){
            $sql = "SELECT * FROM categories WHERE id = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":id", $id);
            $sql->execute();
            if($sql->rowCount() > 0){
                $sql = $sql->fetch();
                $array[] = $sql;

                if(!empty($sql["subcat"])){
                    $id = $sql["subcat"];
                }else{
                    $haveChild = false;
                }
            }

        }

        $array = array_reverse($array);

        return $array;
    }

    public function getCategoryName($id){
        $array = array();
        $sql = "SELECT categories.name FROM categories WHERE categories.id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $sql = $sql->fetch();
            return $sql["name"];
        }
    }
    

    private function organizeCategory(&$array){
        foreach($array AS $id => $item){
            if(isset($array[$item["subcat"]])){
                $array[$item["subcat"]]["subs"][$item["id"]] = $item;
                unset($array[$id]);
                break;
            }
        }

    }

    private function stillNeed($array){
        foreach($array AS $item){
            if(!empty($item["subcat"])){
                return true;
            }
        }

        return false;
    }


}