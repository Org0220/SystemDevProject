<?php
    class Admin extends Controller
    {
        public function __construct()
        {
            $this->ShampooModel = $this->model('ShampooModel');
            $this->AppointmentModel = $this->model('AppointmentModel');
            $this->AvailabilitiesModel = $this->model('AvailabilitiesModel');
            $this->NewsModel = $this->model('NewsModel');
            $this->ShowCaseModel = $this->model('ShowCaseModel');
            $this->ShampooModel = $this->model('ShampooModel');
            
        }

        public function addShampoo(){
            if(!isset($_POST['create'])){
                $this->view('Admin/addShampoo');
            }
            else{
                $filename= $this->imageUpload();
                $data=[
                    'title' => trim($_POST['title']),
                    'content' => trim($_POST['content'])
                ];
               
                if($this->NewsModel->create($data)){
                    echo 'Please wait we are creating the user for you!';
                    header('Location: /SystemDevProject/Admin/News');
                    //echo '<meta http-equiv="Refresh" content="2; url=/MVC/User/getUsers">';
                }

            }
        }

        public function editShampoo($shampoo_id){
            $shampoo = $this->ShampooModel->getShampoo();
            if(!isset($_POST['edit'])){
                $this->view('Admin/editShampoo/', $shampoo);
            }
            else{
                $filename= $this->imageUpload();
                $data=[
                    'name' => trim($_POST['name']),
                    'price' => trim($_POST['price']),
                    'duration' => trim($_POST['duration']),
                    'description' => trim($_POST['description']),
                    'imgURL' => $filename,
                    'id' => $shampoo_id
                ];
               
                if($this->ShampooModel->update($data)){
                    echo 'Please wait we are creating the user for you!';
                    header('Location: /SystemDevProject/Admin/Shampoos');
                    //echo '<meta http-equiv="Refresh" content="2; url=/MVC/User/getUsers">';
                }

            }
        }



        public function addShampoo(){
            if(!isset($_POST['create'])){
                $this->view('Admin/addShampoo');
            }
            else{
                $filename= $this->imageUpload();
                $data=[
                    'title' => trim($_POST['title']),
                    'content' => trim($_POST['content'])
                ];
               
                if($this->NewsModel->create($data)){
                    echo 'Please wait we are creating the user for you!';
                    header('Location: /SystemDevProject/Admin/News');
                    //echo '<meta http-equiv="Refresh" content="2; url=/MVC/User/getUsers">';
                }

            }
        }

        public function editShampoo($Shampoo_id){
            $Shampoo = $this->NewsModel->getShampoo();
            if(!isset($_POST['edit'])){
                $this->view('Admin/editShampoo/', $Shampoo);
            }
            else{
                $filename= $this->imageUpload();
                $data=[
                    'name' => trim($_POST['name']),
                    'price' => trim($_POST['price']),
                    'duration' => trim($_POST['duration']),
                    'description' => trim($_POST['description']),
                    'imgURL' => $filename,
                    'id' => $Shampoo_id
                ];
               
                if($this->ShampooModel->update($data)){
                    echo 'Please wait we are creating the user for you!';
                    header('Location: /SystemDevProject/Admin/Shampoos');
                    //echo '<meta http-equiv="Refresh" content="2; url=/MVC/User/getUsers">';
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
    }
?>