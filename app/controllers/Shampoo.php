<?php
class Shampoo extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $this->view('Shampoo/shampoo');
    }
}