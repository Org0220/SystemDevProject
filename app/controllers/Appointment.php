<?php

    class Appointment extends Controller{

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
                    $this->read_service('Admin/addService', $data);
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
                $this->view('Admin/editService');
            } else {
                $data = $this->validate_service($_POST);
                if (!empty($data['error'])) {
                    $this->view('Admin/editService', $data);
                } else {
                    $data['id'] = $service_id; 
                    
                    if (!empty($data['error'])) {
                        $this->read_service('Admin/Service', $data);
                    } else {
                        $isSucc = $this->ServiceModel->update($data);
                        if ($isSucc) {
                            $this->read_service('Admin/Service', ['msg' => 'Service successfully created!']);
                        } else {
                            $this->read_service('Admin/editService', ['error' => ['Error creating news!']]);
                        }
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
                $this->view_selector(
                    $isSucc,
                    'Service ' . $service_id . ' successfully deleted!',
                    'Error deleting serviec ' . $service_id,
                    'Admin/Service'
                );
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
            $data['duration'] = isset($raw_data['duration']) && is_numeric(trim($raw_data['duration'])) ? trim($raw_data['duration']) : '';
            $data['description'] = isset($raw_data['description']) ? $raw_data['description'] : '';
            $data['imgURL'] = isset($raw_data['imgURL']) ? trim($raw_data['imgURL']) : '';
    
            if (!$data['name']) {
                $data['error'][] = 'Name must not be empty!';
            }
            if (!$data['price']) {
                $data['error'][] = 'Price must not be empty and should be numeric!';
            }
            if (!$data['duration']) {
                $data['error'][] = 'Duration must not be empty and should be numeric!';
            }
            if (!$data['description']) {
                $data['error'][] = 'Description must not be empty!';
            }
            if (!$data['imgURL']) {
                $data['error'][] = 'imgURL must not be empty!';
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