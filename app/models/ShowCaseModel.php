<?php
class ShowCaseModel extends Model
{
    public function get()
    {
        $this->query("SELECT * FROM show_case ORDER BY id DESC");
        return $this->getResultSet();
    }

    public function create($data)
    {
        $this->query('INSERT INTO show_case (title, image_url) VALUES (:title, :image_url)');
        $this->bind('title', $data['title']);
        $this->bind('image_url', $data['image_url']);
        return $this->execute();
    }

    public function update($data)
    {
        $this->query('UPDATE show_case SET title = :title, image_url = :image_url WHERE id = :id');
        $this->bind('title', $data['title']);
        $this->bind('image_url', $data['image_url']);
        $this->bind('id', $data['id']);
        return $this->execute();
    }

    public function delete($data)
    {
        $this->query('DELETE FROM show_case WHERE id = :id');
        $this->bind('id', $data['id']);
        return $this->execute();
    }
}
