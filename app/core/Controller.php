<?php
class Controller
{
    /*
            This is our base controller 
            It will have two functions - one to invoke views and one to invoke models 
        */

    public function view($name, $data = [])
    {
        if (file_exists('../app/views/' . $name . '.php')) {
            require_once('../app/views/' . $name . '.php');
        } else {
            echo '../app/views/' . $name . '.php does not exists';
        }
    }

    public function model($modelName)
    {
        require_once '../app/models/' . $modelName . '.php';
        return new $modelName;
    }


    protected function get_session_messages(&$session)
    {
        $data = [];

        if (isset($session['message'])) {
            $data['message'] = $session['message'];
            unset($session['message']);
        }
        if (isset($session['errors'])) {
            $data['errors'] = $session['errors'];
            unset($session['errors']);
        }

        return $data;
    }

    protected function set_session_messages($is_successful, $message_on_success, $messages_on_failure)
    {
        if ($is_successful) {
            $_SESSION['message'] = $message_on_success;
        } else {
            $_SESSION['errors'] = $messages_on_failure;
        }
    }
}
