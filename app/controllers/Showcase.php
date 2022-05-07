<?php

class Showcase extends Controller
{
    public function __construct()
    {
        $this->showcase_model = $this->model('ShowCaseModel');
    }

    public function index()
    {
        $this->read_showcase('User', []);
    }

    public function admin_showcases()
    {
        if (!is_admin_logged_in()) {
            header('Location: ' . URLROOT);
        } else {
            $data = $this->get_session_messages($_SESSION);
            $this->read_showcase('Admin', $data);
        }
    }

    public function create_showcase()
    {
        if (!is_admin_logged_in()) {
            header('Location: ' . URLROOT);
        } else if (!isset($_POST['Create Showcase'])) {
            $this->view('Admin/addShowCase');
        } else {
            $data = $this->validate_showcase($_POST);
            if (!empty($data['error'])) {
                $this->view('Admin/addShowCase', $data);
            } else {
                $isSucc = $this->showcase_model->create($data);
                $this->set_session_messages($isSucc, 'Showcase successfully created!', 'Error creating showcase!');

                $this->go_showcase_main();
            }
        }
    }

    public function update_showcase($showcase_id)
    {
        if (!is_admin_logged_in()) {
            header('Location: ' . URLROOT);
        } else if (!isset($_POST['Update Showcase'])) {
            $this->view('Admin/editShowCase');
        } else {
            $data = $this->validate_showcase($_POST);
            if (!empty($data['error'])) {
                $this->view('Admin/editShowCase', $data);
            } else {
                $data['id'] = $showcase_id; // Maybe check if it's a number
                $isSucc = $this->showcase_model->update($data);
                $this->set_session_messages($isSucc, 'Showcase ' . $showcase_id . ' successfully edited!', ['Error editing showcase ' . $showcase_id]);

                $this->go_showcase_main();
            }
        }
    }

    public function delete_showcase($showcase_id)
    {
        if (!is_admin_logged_in()) {
            header('Location: ' . URLROOT);
        } else {
            $data['id'] = $showcase_id;
            $isSucc = $this->showcase_model->delete($data);
            $this->set_session_messages($isSucc, 'Showcase ' . $showcase_id . ' successfully deleted!', ['Error deleting showcase ' . $showcase_id]);

            $this->go_showcase_main();
        }
    }

    private function read_showcase($user_type, $data)
    {
        $data['showcase'] = $this->showcase_model->get();
        $this->view($user_type . '/Gallery', $data);
    }

    private function validate_showcase($raw_data)
    {
        $data = ['error' => []];
        $data['title'] = isset($raw_data['title']) ? trim($raw_data['title']) : '';
        $data['image_url'] = image_upload();

        if (!$data['title']) {
            $data['error'][] = 'Title must not be empty!';
        }
        if (!$data['image_url']) {
            $data['error'][] = 'Image must be JPG, GIF, or PNG!';
        }

        return $data;
    }

    private function go_showcase_main()
    {
        header('Location: ' . URLROOT . '/showcase/admin_showcase');
    }
}
