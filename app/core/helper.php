<?php

    session_start();

    function isLoggedIn(){
        if(isset($_SESSION['user_id'])){
            return true;
        } else {
            return false;
        }
    }

    function is_admin_logged_in() {
        return true;
    }