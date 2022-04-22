<?php

class Showcase extends Controller
{
    public function __construct()
    {
        $this->showcase_model = $this->model('ShowCaseModel');
    }

    public function index()
    {
        $this->read_showcase('User/Gallery', []);
    }

    public function admin_showcase()
    {
        if (!is_admin_logged_in()) {
            header('Location: ' . URLROOT);
        } else {
            $this->read_showcase('Admin/Gallery', []);
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
                $this->view_selector(
                    $isSucc,
                    'Showcase successfully created!',
                    'Error creating showcase!'
                );
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
                $this->view_selector(
                    $isSucc,
                    'Showcase ' . $showcase_id . ' successfully edited!',
                    'Error editing showcase ' . $showcase_id
                );
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
            $this->view_selector(
                $isSucc,
                'Showcase ' . $showcase_id . ' successfully deleted!',
                'Error deleting showcase ' . $showcase_id
            );
        }
    }

    private function read_showcase($view, $data)
    {
        $data['showcase'] = $this->showcase_model->get();
        $this->view($view, $data);
    }

    private function validate_showcase($raw_data)
    {
        $data = ['error' => []];
        $data['title'] = isset($raw_data['title']) ? trim($raw_data['title']) : '';
        $data['image_url'] = isset($raw_data['image_url']) ? trim($raw_data['image_url']) : '';

        if (!$data['title']) {
            $data['error'][] = 'Title must not be empty!';
        }
        if (!$data['image_url']) {
            $data['error'][] = 'Image URL must not be empty!';
        }

        return $data;
    }

    private function view_selector($isSucc, $msg, $error)
    {
        $prop = $isSucc ? 'msg' : 'error';
        $message = $isSucc ? $msg : $error;

        $this->view('Admin/Gallery', [$prop => $message]);
    }
}
