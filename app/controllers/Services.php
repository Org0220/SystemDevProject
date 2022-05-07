<?php

    class Services extends Controller{

        public function __construct()
        {
            $this->ServiceModel = $this->model('ServiceModel');
        }


        public function index()
        {  
            if(isset($_SESSION['combo'])) {
                unset($_SESSION['combo']);
            }
            $this->read_service('User/Services',  $this->ServiceModel->getServices());
        }

        public function anotherService()
        {
            $_SESSION['combo'] = true;
            $this->read_service('User/AnotherService',  $this->ServiceModel->getServices());
        }
    
        public function admin_services()
        {
            if (!is_admin_logged_in()) {
                header('Location: ' . URLROOT);
            } else {
                $data['services'] = $this->ServiceModel->getServices();
                $this->read_service('Admin/Services', $data);
            }
        }
    
        public function create_service()
        {
            if (!is_admin_logged_in()) {
                header('Location: ' . URLROOT);
            } else if (!isset($_POST['Create_Service'])) {
                $this->view('Admin/addService');
            } else {
                $data = $this->validate_service($_POST);
                
                if (!empty($data['error'])) {
                    $this->read_service('Admin/addService', $data);
                } else {
                    $isSucc = $this->ServiceModel->create($data);
    
                    if ($isSucc) {
                        $this->read_service('Admin/Services', ['msg' => 'Service successfully created!']);
                    } else {
                        $this->read_service('Admin/addService', ['error' => ['Error creating news!']]);
                    }
                }
            }
        }
    
        public function update_service($service_id)
        {
            
            $service = $this->ServiceModel->getService($service_id);
            if (!is_admin_logged_in()) {
                header('Location: ' . URLROOT);
            } else if (!isset($_POST['Update_Service'])) {
                $data ['service'] = $service;
                $this->view('Admin/editService', $data);
            } else {
                $data = $this->validate_service($_POST);
                if (!empty($data['error'])) {
                    $data ['service'] = $service;
                    $this->view('Admin/editService', $data);
                } else {
                    $data['id'] = $service_id; 
                    
                    if (!empty($data['error'])) {
                        $data ['service'] = $service;
                        $this->read_service('Admin/Services', $data);
                    } else {
                        $isSucc = $this->ServiceModel->update($data);
                        if ($isSucc) {
                            $data ['service'] = $service;
                            $data ['msg'] = 'Service successfully updated!';
                            $this->read_service('Admin/Services', $data);
                        } else {
                            $data ['service'] = $service;
                            $data ['error'] = 'Error creating service!';
                            $this->read_service('Admin/editService', $data);
                        }
                    }
                }
            }
        }
    
        public function delete_service($service_id)
        {
            if (!is_admin_logged_in()) {
                header('Location: ' . URLROOT);
            } else {
                $isSucc = $this->ServiceModel->delete($service_id);
                $this->view_selector(
                    $isSucc,
                    'Service ' . $service_id . ' successfully deleted!',
                    'Error deleting serviec ' . $service_id,
                    'Admin/Services'
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
            $data['imgURL'] = image_upload();
    
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
            $this->view($view, [$prop => $message, 'services' => $this->ServiceModel->getServices()]);
        }
    }
?>