<?php

    class Services extends Controller{

        public function __construct()
        {
            $this->ServiceModel = $this->model('ServiceModel');
        }


        public function index()
        {
            
            $this->read_service('User/Services',  $this->ServiceModel->getServices());
        }
    
        public function admin_services()
        {
            if (!is_admin_logged_in()) {
                header('Location: ' . URLROOT);
            } else {
                $this->read_service('Admin/Service', []);
            }
        }
    
        public function create_service()
        {
            if (!is_admin_logged_in()) {
                header('Location: ' . URLROOT);
            } else if (!isset($_POST['Create Service'])) {
                header('Location: ' . URLROOT . '/news/create_service');
            } else {
                $data = $this->validate_service($_POST);
                if (!empty($data['error'])) {
                    $this->read_service('Admin/Service', $data);
                } else {
                    $isSucc = $this->ServiceModel->create($data);
    
                    if ($isSucc) {
                        $this->read_service('Admin/Service', ['msg' => 'Service successfully created!']);
                    } else {
                        $this->read_service('Admin/Service', ['error' => ['Error creating news!']]);
                    }
                }
            }
        }
    
        public function update_service($service_id)
        {
            if (!is_admin_logged_in()) {
                header('Location: ' . URLROOT);
            } else if (!isset($_POST['Update Service'])) {
                // Update Service View
            } else {
                $data = $this->validate_service($_POST);
                if (!empty($data['error'])) {
                    // Update Service View with Validation Error
                } else {
                    $data['id'] = $service_id; // maybe check if service_id is a number?
                    $isSucc = $this->ServiceModel->update($data);
                    if ($isSucc) {
                        // Update Service View with Success
                    } else {
                        // Update Service View with Update Error
                    }
                }
            }
        }
    
        public function delete_services($service_id)
        {
            if (!is_admin_logged_in()) {
                header('Location: ' . URLROOT);
            } else {
                $data = ['id' => $service_id]; // maybe check if service_id is a number?
                $isSucc = $this->ServiceModel->delete($data);
                if ($isSucc) {
                    // Maybe go back to the Admin Service View
                } else {
                    // Maybe go back to admin news view but with Delete Error
                }
            }
        }
    
        private function read_service($view_name, $data)
        {
            $this->view($view_name, $data);
        }
    
        private function validate_service($raw_data)
        {
            $data = ['error' => []];
            $data['name'] = isset($raw_data['name']) ? trim($raw_data['name']) : '';
            $data['price'] = isset($raw_data['price']) && is_numeric(trim($raw_data['price'])) ? trim($raw_data['price']) : '';
    
            if (!$data['title']) {
                $data['error'][] = 'Title must not be empty!';
            }
            if (!$data['content']) {
                $data['error'][] = 'Content must not be empty!';
            }
    
            return $data;
        }
    }
?>