<?php

class News extends Controller
{
    public function __construct()
    {
        $this->news_model = $this->model('NewsModel');
    }

    public function index()
    {
        $this->read_news('User', []);
    }

    public function admin_news()
    {
        if (!is_admin_logged_in()) {
            header('Location: ' . URLROOT);
        } else {
            $data = $this->get_session_messages($_SESSION);
            $this->read_news('Admin', $data);
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
                $this->view('Admin/addNews', $data);
            } else {
                $isSucc = $this->news_model->create($data);
                $this->set_session_messages($isSucc, 'News successfully created!', ['Error creating news!']);

                $this->go_news_main();
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
                $this->set_session_messages($isSucc, 'News ' . $news_id . ' successfully edited!', ['Error updating news ' . $news_id]);

                $this->go_news_main();
            }
        }
    }

    /**
     * Handler for deleting news
     * 
     * 1. If the admin IS NOT logged in, goes back to the main home page.
     * 2. If the admin IS logged in, then:
     *      2a. Query the database for deleting the given news_id
     *          2ai. If there ARE NO database errors, set the success message in the session.
     *          2aii. If there ARE database errors, set the failure messagei in the session.
     *      2b. Go back to the main news page for displaying the session DB messages.
     */
    public function delete_news($news_id)
    {
        if (!is_admin_logged_in()) {
            header('Location: ' . URLROOT);
        } else {
            $data = ['id' => $news_id]; // maybe check if news_id is a number?
            $isSucc = $this->news_model->delete($data);
            $this->set_session_messages($isSucc, 'News ' . $news_id . ' successfully deleted!', ['Error deleting news ' . $news_id]);

            $this->go_news_main();
        }
    }

    private function read_news($user_type, $data)
    {
        $data['news'] = $this->news_model->get();
        $this->view($user_type . '/News', $data);
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

    private function go_news_main()
    {
        header('Location: ' . URLROOT . '/news/admin_news');
    }
}
