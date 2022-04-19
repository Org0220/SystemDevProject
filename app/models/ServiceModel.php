<?php

    class ServiceModel{
        public function __construct(){
            $this->db = new Model;
        }
        public function getServices(){
            $this->db->query("SELECT * FROM service");
            return $this->db->getResultSet();
        }

        public function getService($id){
            $this->db->query("SELECT * FROM service WHERE id = :id");
            $this->db->bind(':id',$id);
            return $this->db->getSingle();
        }

        public function create($data){
            $this->db->query("INSERT INTO service (name, price, duration, description, imgURL) values (:name, :price, :duration, :description, :imgURL)");
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':price', $data['price']);
            $this->db->bind(':duration', $data['duration']);
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
            $this->db->query("UPDATE service SET name=:name, price=:price, duration=:duration, description=:description, imgURL=:imgURL WHERE id=:id");
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':price', $data['price']);
            $this->db->bind(':duration', $data['duration']);
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
            $this->db->query("DELETE FROM service WHERE id=:id");
            $this->db->bind('id', $id);

            if($this->db->execute()){
                return true;
            }
            else{
                
            }
        }
    }

?>