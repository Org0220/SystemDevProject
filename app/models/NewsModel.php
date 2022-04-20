<?php
class NewsModel extends Model
{
    public function get()
    {
        $this->query('SELECT * FROM news ORDER BY date DESC');
        return $this->db->getResultSet();
    }

    public function create($data)
    {
        $this->query('INSERT INTO news (title, content, date) VALUES (:title, :content, CURDATE())');
        $this->bind('title', $data['title']);
        $this->bind('content', $data['content']);
        return $this->execute();
    }

    public function update($data)
    {
    }

    public function delete($data)
    {
    }
}
