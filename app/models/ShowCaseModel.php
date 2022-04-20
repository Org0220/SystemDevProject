<?php
class ShowCaseModel extends Model
{
    public function get()
    {
        $this->db->query("SELECT * FROM show_case ORDER BY id DESC");
        return $this->db->getResultSet();
    }

    public function create($data)
    {
    }

    public function update($data)
    {
    }

    public function delete($data)
    {
    }
}
