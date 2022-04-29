<?php

class ShampooModel {

    public function __construct(){
            $this->db = new Model;
        }
    public function getShampoos(){
        $this->db->query("SELECT * FROM shampoo");
        return $this->db->getResultSet();
    }

    public function getShampoo($id){
        $this->db->query("SELECT * FROM shampoo WHERE id = :id");
        $this->db->bind(':id',$id);
        return $this->db->getSingle();
    }

    public function create($data){
        $this->db->query("INSERT INTO shampoo (name, price, description, imgURL) values (:name, :price, :description, :imgURL)");
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':description',$data['description']);
        $this->db->bind(':imgURL',$data['imgURL']);

        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }

    }

    public function update($data){
        $this->db->query("UPDATE shampoo SET name=:name, price=:price,  description=:description, imgURL=:imgURL WHERE id=:id");
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':description',$data['description']);
        $this->db->bind(':imgURL',$data['imgURL']);
        $this->db->bind(':id',$data['id']);
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
        
    }
    public function delete($id){
        $this->db->query("DELETE FROM shampoo WHERE id=:id");
        $this->db->bind('id', $id);

        if($this->db->execute()){
            return true;
        }
        else{
            
        }
    }
}

?>