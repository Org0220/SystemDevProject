<?php
class Home extends Controller {
    public function __construct()
    {
        
    }

    public function index()
    {
        $this->view('User/index');
    }

    public function LashCourse()
    {
        $this->view('User/LashCourse');
    }
}
?>