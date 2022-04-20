<?php

class News extends Controller
{
    public function __construct()
    {
        $this->news_model = $this->model('NewsModel');
    }

    public function index()
    {
        $this->read_news('User/News');
    }

    public function admin_news()
    {
        $this->read_news('Admin/News');
    }

    public function create_news()
    {
        if (!is_admin_logged_in()) {
            header('Location: ' . URLROOT);
        } else if (!isset($_POST['Create News'])) {
            header('Location: ' . URLROOT . '/news/admin_news');
        } else {
            $data = $this->validate_news($_POST);
            if (empty($data['error'])) {
                $this->view('Admin/News', $data);
            } else {
                $isSucc = $this->news_model->create($data);

                if ($isSucc) {
                    $this->view('Admin/News', ['msg' => 'News successfully created!']);
                } else {
                    $this->view('Admin/News', ['error' => ['Error creating news!']]);
                }
            }
        }
    }

    public function update_news($news_id)
    {
    }

    public function delete_news($news_id)
    {
    }

    private function read_news($view_name)
    {
        $news = $this->news_model->get();
        $this->view($view_name, $news);
    }

    private function validate_news($raw_data)
    {
        $data = ['error' => []];
        $data['title'] = isset($raw_data['title']) ? trim($raw_data['title']) : '';
        $data['content'] = isset($raw_data['content']) ? trim($raw_data['content']) : '';

        if (!$data['title']) {
            $data['error'][] = 'Title must not be empty!';
        }
        if (!$data['content']) {
            $data['error'][] = 'Content must not be empty!';
        }

        return $data;
    }
}
