<?php
class Login extends Controller
{
    public function __construct()
    {
        $this->adminEmail = "Admin@gmail.com";
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
                header('Location: ' . URLROOT . '/Services/admin_services');
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
                        $this->view('User/index',$data);
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
            $this->view('Login/Register');
        }
        else{
            $user = $this->UserModel->getUser($_POST['email']);
            if($user == null){
                $data = [
                    'email' => trim($_POST['email']),
                    'pass' => $_POST['password'],
                    'pass_verify' => $_POST['verify_password'],
                    'pass_hash' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                    'name' => $_POST['first_name'] . " " . $_POST['last_name'],
                    'phone_number' => $_POST['phone_number'],
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
                        echo '<meta http-equiv="Refresh" content="2; url=/SystemDevProject/Login/">';
                    }
                } 
            }
            else{
                $data = [
                    'msg' => "User: ". $_POST['email'] ." already exists",
                ];
                $this->view('Login/Register',$data);
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
        echo '<meta http-equiv="Refresh" content="1; url=/SystemDevProject/Login/">';
    }

    public function adminLogout(){
        unset($_SESSION['admin']);
        session_destroy();
        echo '<meta http-equiv="Refresh" content="1; url=/SystemDevProject/Login/">';
    }




    private function validate_client($data)
    {
       
        $prev = '/\b[a-zA-Z0-9+_.-]{6,16}@[a-zA-Z0-9]{4,8}.([a-zA-Z]{2,5})\b/i';

        if (preg_match($prev, $data['email'])) {
            $data['error'][] = 'Title must not be empty!';
        }
        if(strlen($data['pass']) < 6){
            $data['password_len_error'] = 'Password can not be less than 6 characters';
        }
        if($_POST['password'] != $data['pass_verify']){
            $data['password_match_error'] = 'Password does not match';
        }

        return $data;
    }
    
}
