<?php

class SampooModel{
        
    public function __construct(){
        $this->db = new Model;
    }
    public function get(){
        $this->db->query("SELECT * FROM users");
        return $this->db->getResultSet();
    }

    public function get($user_id){
        $this->db->query("SELECT * FROM users WHERE ID = :user_id");
        $this->db->bind(':user_id',$user_id);
        return $this->db->getSingle();
    }

    public function create($data){
        

    }

    public function update($data){
        
        
    }

    public function delete($data){

    }
}

?>