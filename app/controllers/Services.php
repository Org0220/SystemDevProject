<?php

    class Services extends Controller{

        public function __construct()
        {
            $this->ServiceModel = $this->model('ServiceModel');
        }
        public function index()
        {
            $this->view('User/Services', $this->ServiceModel->getServices());
        }

    }
?>