<?php

    class Client extends Controller{
        public function __construct()
    {
        $this->adminEmail = "Admin";
         $this->adminPassword = "Password";
        $this->UserModel = $this->model('UserModel');
    }

    public function index()
    {
        if(!isset($_POST['login'])){
            $this->view('Login/index');
        }
        else{
            $email = $_POST['email'];
            $password = $_POST['password'];
            if($password == $this->adminPassword &&  $email == $this->adminEmail)
            { 
                $this->view('Admin/index');
                $_SESSION['admin'] = "in";
            } else {
                $user = $this->UserModel->getUser($_POST['email']);
            
                if($user != null){
                    $hashed_pass = $user->pass_hash;
                    if(password_verify($password,$hashed_pass)){

                        $this->createSession($user);
                        $data = [
                            'msg' => "Welcome, $user->email!",
                        ];
                        $this->view('Home/home',$data);
                    }
                    else{
                        $data = [
                            'msg' => "Password incorrect! for $user->email",
                        ];
                        $this->view('Login/index',$data);
                    }
                }
                else{
                    $data = [
                        'msg' => "User: ". $_POST['email'] ." does not exists",
                    ];
                    $this->view('Login/index',$data);
                }
            }
        }
    }

    public function create()
    {
        if(!isset($_POST['register'])){
            $this->view('Login/create');
        }
        else{
            $user = $this->UserModel->getUser($_POST['email']);
            if($user == null){
                $data = [
                    'email' => trim($_POST['email']),
                    'pass' => $_POST['password'],
                    'pass_verify' => $_POST['verify_password'],
                    'pass_hash' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                    'name' => $_POST['name'],
                    'phone_number' => $_POST['phone_numbmer'],
                    'email_error' => '',
                    'password_error' => '',
                    'password_match_error' => '',
                    'password_len_error' => '',
                    'msg' => '',
                ];
                if($this->validate_client($data)){
                    if($this->UserModel->create($data)){
                        echo '
                        <div class="text-center">
                        <div class="spinner-border" role="status">
                          <span class="sr-only">Please wait creating the account for '.trim($_POST["email"]).'</span>
                        </div>
                      </div>';
                        echo '<meta http-equiv="Refresh" content="2; url=/SystemDevProejct/Login/">';
                    }
                } 
            }
            else{
                $data = [
                    'msg' => "User: ". $_POST['email'] ." already exists",
                ];
                $this->view('Login/create',$data);
            }
        }
    }

    public function createSession($user){
        $_SESSION['client_id'] = $user->id;
        $_SESSION['client_name'] = $user->name;
    }

    public function logout(){
        unset($_SESSION['client_id']);
        unset($_SESSION['client_name']);
        session_destroy();
        echo '<meta http-equiv="Refresh" content="1; url=/SystenDevProject/Login/">';
    }


    private function validate_client($raw_data)
    {
        $data = ['error' => []];
        $data['title'] = isset($raw_data['title']) ? trim($raw_data['title']) : '';
        $data['image_url'] = image_upload();

        if (!$data['title']) {
            $data['error'][] = 'Title must not be empty!';
        }
        if (!$data['image_url']) {
            $data['error'][] = 'Image uploaded must be of type jpeg, gif, or png';
        }

        return $data;
    }
    }
    

?>