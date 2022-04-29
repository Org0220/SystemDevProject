<?php

class News extends Controller
{
    public function __construct()
    {
        $this->news_model = $this->model('NewsModel');
    }

    public function index()
    {
        $this->read_news('User/News', []);
    }

    public function admin_news()
    {
        if (!is_admin_logged_in()) {
            header('Location: ' . URLROOT);
        } else {
            $this->read_news('Admin/News', []);
        }
    }

    public function create_news()
    {
        if (!is_admin_logged_in()) {
            header('Location: ' . URLROOT);
        } else if (!isset($_POST['Create News'])) {
            $this->view('Admin/addNews');
        } else {
            $data = $this->validate_news($_POST);
            if (!empty($data['error'])) {
                $this->read_news('Admin/addNews', $data);
            } else {
                $isSucc = $this->news_model->create($data);

                $this->view_selector(
                    $isSucc,
                    'News successfully created!',
                    'Error creating news!'
                );
            }
        }
    }

    public function update_news($news_id)
    {
        if (!is_admin_logged_in()) {
            header('Location: ' . URLROOT);
        } else if (!isset($_POST['Update News'])) {
            $this->view('Admin/editNews');
        } else {
            $data = $this->validate_news($_POST);
            if (!empty($data['error'])) {
                $this->view('Admin/editNews', $data);
            } else {
                $data['id'] = $news_id; // maybe check if news_id is a number?
                $isSucc = $this->news_model->update($data);
                $this->view_selector(
                    $isSucc,
                    'News ' . $news_id . ' successfully edited!',
                    'Error updating news ' . $news_id
                );
            }
        }
    }

    public function delete_news($news_id)
    {
        if (!is_admin_logged_in()) {
            header('Location: ' . URLROOT);
        } else {
            $data = ['id' => $news_id]; // maybe check if news_id is a number?
            $isSucc = $this->news_model->delete($data);
            $this->view_selector(
                $isSucc,
                'News ' . $news_id . ' successfully deleted!',
                'Error deleting news ' . $news_id
            );
        }
    }

    private function read_news($view_name, $data)
    {
        $data['news'] = $this->news_model->get();
        $this->view($view_name, $data);
    }

    private function validate_news($raw_data)
    {
        $data = ['error' => []];
        $data['title'] = isset($raw_data['title']) ? trim($raw_data['title']) : '';
        $data['content'] = isset($raw_data['content']) ? trim($raw_data['content']) : '';

        if (!$data['title']) {
            $data['error'][] = 'Title must not be empty!';
        }
        if (!$data['description']) {
            $data['error'][] = 'Content must not be empty!';
        }

        return $data;
    }

    private function view_selector($isSucc, $msg, $error)
    {
        $prop = $isSucc ? 'msg' : 'error';
        $message = $isSucc ? $msg : $error;
        $this->view('Admin/News', [$prop => $message]);
    }
}
