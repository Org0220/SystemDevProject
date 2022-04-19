<?php

    class AppointmentModel{
        public function __construct(){
            $this->db = new Model;
        }
        public function getAppointments(){
            $this->db->query("SELECT * FROM users");
            return $this->db->getResultSet();
        }

        public function getAppointment($user_id){
            $this->db->query("SELECT * FROM users WHERE ID = :user_id");
            $this->db->bind(':user_id',$user_id);
            return $this->db->getSingle();
        }

        public function create($data){
            $this->db->query("INSERT INTO service (date, time, client_id, service_id) values (:date, :time, :client_id, :service_id)");
            $this->db->bind(':date', $data['date']);
            $this->db->bind(':time', $data['time']);
            $this->db->bind(':client_id', $data['client_id']);
            $this->db->bind(':service_id',$data['service_id']);
            

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }

        }

        public function update($data){
            $this->db->query("UPDATE service SET date=:date, time=:time, client_id=:client_id, service_id=:service_id WHERE id=:id");
            $this->db->bind(':date', $data['date']);
            $this->db->bind(':time', $data['time']);
            $this->db->bind(':client_id', $data['client_id']);
            $this->db->bind(':service_id',$data['service_id']);
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