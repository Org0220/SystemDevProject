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
                $data['shampoos'] = $this->ShampooModel->getShampoos();
                $this->read_shampoo('Admin/Shampoos', $data);
            }
        }
    
        public function create_shampoo()
        {
            if (!is_admin_logged_in()) {
                header('Location: ' . URLROOT);
            } else if (!isset($_POST['Create_Shampoo'])) {
                $this->view('Admin/addShampoo');
            } else {
                $data = $this->validate_shampoo($_POST);
                
                if (!empty($data['error'])) {
                    $this->read_shampoo('Admin/addShampoo', $data);
                } else {
                    $isSucc = $this->ShampooModel->create($data);
    
                    if ($isSucc) {
                        $data['shampoos'] = $this->ShampooModel->getShampoos();
                        $data['msg'] = 'Shampoo successfully created!';
                        $this->read_shampoo('Admin/Shampoos', $data);
                    } else {
                        $data['error'] = ['Error creating Shampoo!'];
                        $this->read_shampoo('Admin/addShampoo', $data);
                    }
                }
            }
        }
    
        public function update_shampoo($shampoo_id)
        {
            $data['shampoo'] = $this->ShampooModel->getShampoo($shampoo_id);
            if (!is_admin_logged_in()) {
                header('Location: ' . URLROOT);
            } else if (!isset($_POST['Update_Shampoo'])) {
                $this->view('Admin/editShampoo', $data);
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
                            $data['shampoos'] = $this->ShampooModel->getShampoos();
                            $data['msg'] = 'Shampoo successfully created!';
                            $this->read_shampoo('Admin/Shampoos', $data);
                        } else {
                            $data['error'] = ['Error creating Shampoo!'];
                            $this->read_shampoo('Admin/editShampoo', $data);
                        }
                    }
                }
            }
        }
    
        public function delete_shampoo($shampoo_id)
        {
            if (!is_admin_logged_in()) {
                header('Location: ' . URLROOT);
            } else {
                $isSucc = $this->ShampooModel->delete($shampoo_id);
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
            $data['price'] = isset($raw_data['price']) && is_numeric(trim($raw_data['price'])) ? trim($raw_data['price']) : '';
            $data['image_url'] = image_upload();

            if (!$data['name']) {
                $data['error'][] = 'Name must not be empty!';
            }
            if (!$data['price']) {
                $data['error'][] = 'Price must be numeric!';
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



            $this->view($view, [$prop => $message, 'shampoos' => $this->ShampooModel->getShampoos()]);
        }
    }
?>