<?php

    class UserModel{
        
        public function __construct(){
            $this->db = new Model;
        }
        public function getUsers(){
            $this->db->query("SELECT * FROM client");
            return $this->db->getResultSet();
        }

        public function getUser($email){
            $this->db->query("SELECT * FROM client WHERE email = :email");
            $this->db->bind(':email',$email);
            return $this->db->getSingle();
        }

        public function create($data){
            $this->db->query("INSERT INTO client (email, pass_hash, name, phone_number) values (:email, :pass_hash, :name, :phone_number)");
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':pass_hash', $data['pass_hash']);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':phone_number',$data['phone_number']);
            

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }

        }

        public function update($data){
            $this->db->query("UPDATE client SET email=:email, pass_hash=:pass_hash, name=:name, phone_number=:phone_number WHERE id=:id");
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':pass_hash', $data['pass_hash']);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':phone_number',$data['phone_number']);
            $this->db->bind(':id',$data['id']);
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
            
        }

        public function delete($id){
            $this->db->query("DELETE FROM client WHERE id=:id");
            $this->db->bind('id', $id);

            if($this->db->execute()){
                return true;
            }
            else{
                
            }
        }
    }

?>