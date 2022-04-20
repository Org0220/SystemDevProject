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
            header('Location: ' . URLROOT . '/showcase/admin_showcase');
        } else {
            $data = $this->validate_showcase($_POST);
            if (!empty($data['error'])) {
                // Create Showcase View with Validation Errors
            } else {
                $isSucc = $this->showcase_model->create($data);
                if ($isSucc) {
                    // Create Showcase View with Success
                } else {
                    // Create Showcase View with Insertion Error
                }
            }
        }
    }

    public function update_showcase($showcase_id)
    {
        if (!is_admin_logged_in()) {
            header('Location: ' . URLROOT);
        } else if (!isset($_POST['Update Showcase'])) {
            // Update Showcase View
        } else {
            $data = $this->validate_showcase($_POST);
            if (!empty($data['error'])) {
                // Update Showcase View with Validation Errors
            } else {
                $data['id'] = $showcase_id; // Maybe check if it's a number
                $isSucc = $this->showcase_model->update($data);
                if ($isSucc) {
                    // Update Showcase View with Success
                } else {
                    // Create Showcase View with Insertion Error
                }
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
            if ($isSucc) {
                // Admin Showcase View with Success
            } else {
                // Admin Showcase View with Deletion Errors
            }
        }
    }

    private function read_showcase($view, $data)
    {
        $data['showcase'] = $this->showcase_model->get();
        $this->view($view, $data);
    }

    private function validate_showcase($raw_data)
    {

    }
}
