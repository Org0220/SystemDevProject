<?php

    class Client extends Controller{
        public function __construct(){
            $this->userModel = $this->model('userModel');
            if(!isLoggedIn()){
                header('Location: /MVC/Login');
            }
        }

        public function index(){
            $this->view('Client/index');
        }

        public function getUsers(){
            $users = $this->userModel->getUsers();
            $data = [
                "users" => $users
            ];
            $this->view('Client/getUsers',$data);
        }

        public function createUser(){
            if(!isset($_POST['register'])){
                $this->view('Client/createUser');
            }
            else{
                $filename= $this->imageUpload();
                $data=[
                    'name' => trim($_POST['name']),
                    'city' => trim($_POST['city']),
                    'phone' => trim($_POST['phone']),
                    'picture' => $filename
                ];
               
                if($this->userModel->createUser($data)){
                    echo 'Please wait we are creating the user for you!';
                    header('Location: /MVC/client/getUsers');
                    //echo '<meta http-equiv="Refresh" content="2; url=/MVC/client/getUsers">';
                }

            }
        }

        public function imageUpload(){
            //default value for the picture
            $filename=false;
            
            //save the file that gets sent as a picture
            $file = $_FILES['picture'];
            
            $acceptedTypes = ['image/jpeg'=>'jpg',
                'image/gif'=>'gif',
                'image/png'=>'png'];
            //validate the file
            
            if(empty($file['tmp_name']))
                return false;

            $fileData = getimagesize($file['tmp_name']);

            if($fileData!=false && 
                in_array($fileData['mime'],array_keys($acceptedTypes))){

                //save the file to its permanent location
                    
                $folder = dirname(APPROOT).'/public/img';
                $filename = uniqid() . '.' . $acceptedTypes[$fileData['mime']];
                move_uploaded_file($file['tmp_name'], "$folder/$filename");
            }
            return $filename;
        }

        public function details($user_id){
            $user = $this->userModel->getUser($user_id);

           
                $this->view('Client/details',$user);
            
        }

        public function update($user_id){
            $user = $this->userModel->getUser($user_id);
            if(!isset($_POST['update'])){
                $this->view('Client/updateUser',$,);
            }
            else{
                $filename= $this->imageUpload();
                $data=[
                    'name' => trim($_POST['name']),
                    'city' => trim($_POST['city']),
                    'phone' => trim($_POST['phone']),
                    'picture' => $filename,
                    'ID' => $user_id
                ];
                if($this->userModel->updateUser($data)){
                    echo 'Please wait we are upating the user for you!';
                    //header('Location: /MVC/client/getUsers');
                    echo '<meta http-equiv="Refresh" content="2; url=/MVC/client/getUsers">';
                }
                
            }
        }

        public function delete($user_id){
            $data=[
                'ID' => $user_id
            ];
            if($this->userModel->delete($data)){
                echo 'Please wait we are deleting the user for you!';
                //header('Location: /MVC/client/getUsers');
                echo '<meta http-equiv="Refresh" content=".2; url=/MVC/client/getUsers">';
            }

        }

    }

?>