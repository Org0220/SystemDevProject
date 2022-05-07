<?php

class AvailabilitiesModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        $this->query('SELECT * FROM availabilities');
        return $this->getResultSet();
    }

    public function getByDate($day)
    {
        $this->query('SELECT * FROM availabilities WHERE day = :day');
        $this->bind('day', $day);
        return $this->getResultSet();
    }
    
    public function create($data)
    {
        $this->query('INSERT INTO availabilities (day, start, end) VALUES (:day, :start, :end)');
        $this->bind('day', $data['day']);
        $this->bind('start', $data['start']);
        $this->bind('end', $data['end']);
        return $this->execute();
    }

    public function update($data)
    {
        $this->query('UPDATE availabilities SET day = :day, start = :start, end = :end WHERE id = :id');
        $this->bind('day', $data['day']);
        $this->bind('start', $data['start']);
        $this->bind('end', $data['end']);
        $this->bind('id', $data['id']);
        return $this->execute();
    }

    public function delete($data)
    {
        $this->query('DELETE FROM availabilities WHERE id = :id');
        $this->bind('id', $data['id']);
        return $this->execute();
    }
}