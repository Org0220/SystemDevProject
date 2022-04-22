<?php
class NewsModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        $this->query('SELECT * FROM news ORDER BY date DESC');
        return $this->getResultSet();
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
        $this->query('UPDATE news SET title = :title, content = :content WHERE id = :id');
        $this->bind('title', $data['title']);
        $this->bind('content', $data['content']);
        $this->bind('id', $data['id']);
        return $this->execute();
    }

    public function delete($data)
    {
        $this->query('DELETE FROM news WHERE id = :id');
        $this->bind('id', $data['id']);
        return $this->execute();
    }
}
