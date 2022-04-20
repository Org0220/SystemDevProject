<?php

class Showcase extends Controller
{
    public function __construct()
    {
        $this->showcase_model = $this->model('ShowCaseModel');
    }

    public function index()
    {
        $showcases = $this->showcase_model->get();
        $this->view('User/Gallery', $showcases);
    }
}