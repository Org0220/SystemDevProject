<?php

    class AppointmentModel extends Model{
        public function __construct(){
            $this->db = new Model;
        }
        public function getAppointments(){
            $this->db->query("SELECT * FROM appointment");
            return $this->db->getResultSet();
        }

        public function getAppointment($id){
            $this->db->query("SELECT * FROM appointment WHERE id = :id");
            $this->db->bind(':id',$id);
            return $this->db->getSingle();
        }

        public function getAppointmentWithClient(){
            $this->db->query("SELECT appointment.id, appointment.date, appointment.time, client.name, client.email
            FROM appointment
            INNER JOIN client ON client.id= appointment.client_id ");
            return $this->db->getResultSet();
        }

        public function getAppointmentByDate($date){
            $this->db->query("SELECT appointment.id, appointment.date, appointment.time, service.duration
            FROM appointment
            INNER JOIN service ON service.id= appointment.service_id WHERE date = :date");
            $this->db->bind(':date',$date);
            return $this->db->getResultSet();
        }

        public function getAppointmentWithClientByDate($date){
            $this->db->query("SELECT appointment.id, appointment.date, appointment.time, client.name, client.email
            FROM appointment
            INNER JOIN client ON client.id= appointment.client_id WHERE date = :date");
            $this->db->bind(':date',$date);
            return $this->db->getResultSet();
        }

        public function getAppointmentByName($name){
            $this->db->query("SELECT appointment.id, appointment.date, appointment.time, client.name, client.email
            FROM appointment
            INNER JOIN client ON client.id= appointment.client_id WHERE client.name = :name");
            $this->db->bind(':name',$name);
            return $this->db->getResultSet();
        }

        public function create($data){
            $this->db->query("INSERT INTO appointment (date, time, client_id, service_id) values (:date, :time, :client_id, :service_id)");
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
            $this->db->query("UPDATE appointment SET date=:date, time=:time WHERE id=:id");
            $this->db->bind(':date', $data['date']);
            $this->db->bind(':time', $data['time']);
            $this->db->bind(':id',$data['id']);
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
            
        }
        public function delete($id){
            $this->db->query("DELETE FROM appointment WHERE id=:id");
            $this->db->bind('id', $id);

            if($this->db->execute()){
                return true;
            }
            else{
                
            }
        }
    }

?>