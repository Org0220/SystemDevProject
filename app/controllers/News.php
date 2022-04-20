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
            header('Location: ' . URLROOT . '/news/admin_news');
        } else {
            $data = $this->validate_news($_POST);
            if (!empty($data['error'])) {
                $this->read_news('Admin/News', $data);
            } else {
                $isSucc = $this->news_model->create($data);

                if ($isSucc) {
                    $this->read_news('Admin/News', ['msg' => 'News successfully created!']);
                } else {
                    $this->read_news('Admin/News', ['error' => ['Error creating news!']]);
                }
            }
        }
    }

    public function update_news($news_id)
    {
        if (!is_admin_logged_in()) {
            header('Location: ' . URLROOT);
        } else if (!isset($_POST['Update News'])) {
            // Update News View
        } else {
            $data = $this->validate_news($_POST);
            if (!empty($data['error'])) {
                // Update News View with Validation Error
            } else {
                $data['id'] = $news_id; // maybe check if news_id is a number?
                $isSucc = $this->news_model->update($data);
                if ($isSucc) {
                    // Update News View with Success
                } else {
                    // Update News View with Update Error
                }
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
            if ($isSucc) {
                // Maybe go back to the Admin News View
            } else {
                // Maybe go back to admin news view but with Delete Error
            }
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
        if (!$data['content']) {
            $data['error'][] = 'Content must not be empty!';
        }

        return $data;
    }
}
