<?php

    class Shampoos extends Controller{

        public function __construct()
        {
            $this->ShampooModel = $this->model('ShampooModel');
        }


        public function index()
        {
            $this->read_shampoo('User/Shampoos',  $this->ShampooModel->getShampoos());
        }
    
        public function admin_shampoos()
        {
            if (!is_admin_logged_in()) {
                header('Location: ' . URLROOT);
            } else {
                $this->read_shampoo('Admin/Shampoos', $this->ShampooModel->getShampoos());
            }
        }
    
        public function create_shampoo()
        {
            if (!is_admin_logged_in()) {
                header('Location: ' . URLROOT);
            } else if (!isset($_POST['Create Shampoo'])) {
                header('Location: ' . URLROOT . '/news/create_shampoo');
            } else {
                $data = $this->validate_shampoo($_POST);
                
                if (!empty($data['error'])) {
                    $this->read_shampoo('Admin/addShampoo', $data);
                } else {
                    $isSucc = $this->ShampooModel->create($data);
    
                    if ($isSucc) {
                        $this->read_shampoo('Admin/Shampooss', ['msg' => 'Shampoo successfully created!']);
                    } else {
                        $this->read_shampoo('Admin/addShampoo', ['error' => ['Error creating news!']]);
                    }
                }
            }
        }
    
        public function update_shampoo($shampoo_id)
        {
            if (!is_admin_logged_in()) {
                header('Location: ' . URLROOT);
            } else if (!isset($_POST['Update Shampoo'])) {
                $this->view('Admin/editShampoo');
            } else {
                $data = $this->validate_shampoo($_POST);
                if (!empty($data['error'])) {
                    $this->view('Admin/editShampoo', $data);
                } else {
                    $data['id'] = $shampoo_id; 
                    
                    if (!empty($data['error'])) {
                        $this->read_shampoo('Admin/Shampoos', $data);
                    } else {
                        $isSucc = $this->ShampooModel->update($data);
                        if ($isSucc) {
                            $this->read_shampoo('Admin/Shampoos', ['msg' => 'Shampoo successfully created!']);
                        } else {
                            $this->read_shampoo('Admin/editShampoo', ['error' => ['Error creating news!']]);
                        }
                    }
                }
            }
        }
    
        public function delete_shampoos($shampoo_id)
        {
            if (!is_admin_logged_in()) {
                header('Location: ' . URLROOT);
            } else {
                $data = ['id' => $shampoo_id]; // maybe check if shampoo_id is a number?
                $isSucc = $this->ShampooModel->delete($data);
                $this->view_selector(
                    $isSucc,
                    'Shampoo ' . $shampoo_id . ' successfully deleted!',
                    'Error deleting serviec ' . $shampoo_id,
                    'Admin/Shampoos'
                );
            }
        }
    
        private function read_shampoo($view_name, $data)
        {
            $this->view($view_name, $data);
        }

        private function validate_shampoo($raw_data)
        {
            $data = ['error' => []];
            $data['name'] = isset($raw_data['name']) ? trim($raw_data['name']) : '';
            $data['price'] = isset($raw_data['price']) ? trim($raw_data['price']) : '';
            $data['description'] = isset($raw_data['description']) ? trim($raw_data['description']) : '';
            $data['image_url'] = image_upload();

            if (!$data['name']) {
                $data['error'][] = 'Name must not be empty!';
            }
            if (is_numeric($data['price'])) {
                $data['error'][] = 'Price must be numeric!';
            }
            if (!$data['description']) {
                $data['error'][] = 'Description must not be empty!';
            }
            if (!$data['image_url']) {
                $data['error'][] = 'Image URL must not be empty!';
            }

            return $data;
        }

        private function view_selector($isSucc, $msg, $error, $view)
        {
            $prop = $isSucc ? 'msg' : 'error';
            $message = $isSucc ? $msg : $error;

            $this->view($view, [$prop => $message]);
        }
    }
?>