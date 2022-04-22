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
        // All the functions in this class should start with if (isAdmin())
/*------------------------------------------------------------------------------------------------------------------------*/
       
        public function addShampoo(){
            if (isAdmin()) {
            if(!isset($_POST['create'])){
                $this->view('Admin/addShampoo');
            }
            else{
                $filename= $this->imageUpload();
                $data=[
                    'name' => $_POST['name'],
                    'price' => trim($_POST['price']),
                    'description' => $_POST['description'],
                    'imgURL' => $filename
                ];
               
                if($this->NewsModel->create($data)){
                    echo 'Please wait we are creating the user for you!';
                    header('Location: /SystemDevProject/Admin/Shampoos');
                    //echo '<meta http-equiv="Refresh" content="2; url=/MVC/User/getUsers">';
                }
            }
            }
        }

        public function editShampoo($shampoo_id){
            if (isAdmin()) {
            $shampoo = $this->ShampooModel->getShampoo($shampoo_id);
            if(!isset($_POST['edit'])){
                $this->view('Admin/editShampoo/', $shampoo);
            }
            else{
                $filename= $this->imageUpload();
                $data=[
                    'name' => $_POST['name'],
                    'price' => trim($_POST['price']),
                    'description' => $_POST['description'],
                    'imgURL' => $filename,
                    'id' => $shampoo_id
                ];
               
                if($this->ShampooModel->update($data)){
                    echo 'Please wait we are creating the user for you!';
                    header('Location: /SystemDevProject/Admin/Shampoos');
                    //echo '<meta http-equiv="Refresh" content="2; url=/MVC/User/getUsers">';
                } else {

                }
            }
            }
        }

        public function deleteShampoo($id){
            if(isAdmin()) {
                $data=[
                    'id' => $id
                ];
                if($this->ShampooModel->delete($data)){
                    echo 'Please wait we are deleting the user for you!';

                    echo '<meta http-equiv="Refresh" content=".2; url=/SystemDevProject/Admin/Shampoos">';
                }
            }
        }

/*------------------------------------------------------------------------------------------------------------------------*/
        public function addAvailibility(){
            if (isAdmin()) {
            if(!isset($_POST['create'])){
                $this->view('Admin/addShampoo');
            }
            else{
                $data=[
                    'day' => trim($_POST['day']),
                    'start' => trim($_POST['start']),
                    'end' => trim($_POST['end'])
                ];
               
                if($this->AvailibilitiesModel->create($data)){
                    echo 'Please wait we are creating the user for you!';
                    header('Location: /SystemDevProject/Admin/Availebilities');
                    //echo '<meta http-equiv="Refresh" content="2; url=/MVC/User/getUsers">';
                }
            }
            }
            
        }

        public function editAvailibility($Shampoo_id){
            if (isAdmin()) {
            $Availibility = $this->AvailibilitiesModel->getShampoo();
            if(!isset($_POST['edit'])){
                $this->view('Admin/editShampoo/', $Availibility);
            }
            else{
                $data=[
                    'day' => trim($_POST['day']),
                    'start' => trim($_POST['start']),
                    'end' => trim($_POST['end'])
                    'id' => $Shampoo_id
                ];
               
                if($this->AvailibilitiesModel->update($data)){
                    echo 'Please wait we are creating the user for you!';
                    header('Location: /SystemDevProject/Admin/Availibilities');
                    //echo '<meta http-equiv="Refresh" content="2; url=/MVC/User/getUsers">';
                }
            }
            }
        }

        public function deleteAvailibility($id){
            if(isAdmin()) {
                $data=[
                    'id' => $id
                ];
                if($this->AvailibilitiesModel->delete($data)){
                    echo 'Please wait we are deleting the user for you!';

                    echo '<meta http-equiv="Refresh" content=".2; url=/SystemDevProject/Admin/Availibilities">';
                }
            }
        }

/*------------------------------------------------------------------------------------------------------------------------*/
        public function addNews(){
            if (isAdmin()) {
            if(!isset($_POST['create'])){
                $this->view('Admin/addNews');
            }
            else{
                $data=[
                    'title' => $_POST['title'],
                    'content' => $_POST['content']
                ];
               
                if($this->NewsModel->create($data)){
                    echo 'Please wait we are creating the user for you!';
                    header('Location: /SystemDevProject/Admin/News');
                    //echo '<meta http-equiv="Refresh" content="2; url=/MVC/User/getUsers">';
                }
            }
            }
        }

        public function editNews($news){
            if(isAdmin()) {
            $news = $this->NewsModel->getNews($news);
            if(!isset($_POST['edit'])){
                $this->view('Admin/editNews/', $news);
            }
            else{
                $filename= $this->imageUpload();
                $data=[
                    'title' => $_POST['title'],
                    'content' => $_POST['content'],
                    'id' => $shampoo_id
                ];
               
                if($this->NewsModel->update($data)){
                    echo 'Please wait we are creating the user for you!';
                    header('Location: /SystemDevProject/Admin/News');
                    //echo '<meta http-equiv="Refresh" content="2; url=/MVC/User/getUsers">';
                }

            }
            }
        }
        
        public function deleteNews($id){
            if(isAdmin()) {
                $data=[
                    'id' => $id
                ];
                if($this->NewsModel->delete($data)){
                    echo 'Please wait we are deleting the user for you!';
                    //header('Location: /MVC/User/getUsers');
                    echo '<meta http-equiv="Refresh" content=".2; url=/SystemDevProject/Admin/News">';
                }
            }
        }
/*------------------------------------------------------------------------------------------------------------------------*/
        public function addService(){
            if(isAdmin()) {
            if(isset($_POST['create'])){
                $this->view('Admin/addService');
            }
            else{
                $filename= $this->imageUpload();
                $data=[
                    'name' => trim($_POST['name']),
                    'price' => trim($_POST['price']),
                    'duration' => trim($_POST['duration']),
                    'description' => $_POST['description'],
                    'imgURL' => $filename
                ];
               
                if($this->ServiceModel->create($data)){
                    echo 'Please wait we are creating the user for you!';
                    header('Location: /SystemDevProject/Admin/Service');
                    //echo '<meta http-equiv="Refresh" content="2; url=/MVC/User/getUsers">';
                }

            }
            }
        }

        public function editService($service_id){
            if(isAdmin()) {
                $service = $this->ShampooModel->getService($Service_id);
                if(!isset($_POST['edit'])){
                    $this->view('Admin/editService/', $service);
                }
                else{
                    $filename= $this->imageUpload();
                    $data=[
                        'name' => trim($_POST['name']),
                        'price' => trim($_POST['price']),
                        'duration' => trim($_POST['duration']),
                        'description' => $_POST['description'],
                        'imgURL' => $filename,
                        'id' => $shampoo_id
                    ];
               
                    if($this->ServiceModel->update($data)){
                        echo 'Please wait we are creating the user for you!';
                        header('Location: /SystemDevProject/Admin/Service');
                        //echo '<meta http-equiv="Refresh" content="2; url=/MVC/User/getUsers">';
                    }
                }
            }
        }

        public function deleteService($id){
            if(isAdmin()) {
                $data=[
                    'id' => $id
                ];
                if($this->ServiceModel->delete($data)){
                    echo 'Please wait we are deleting the user for you!';
                    //header('Location: /MVC/User/getUsers');
                    echo '<meta http-equiv="Refresh" content=".2; url=/SystemDevProject/Admin/Service">';
                }
            }
        }
/*------------------------------------------------------------------------------------------------------------------------*/
        public function addShowCase(){
            if(isAdmin()) {
                if(!isset($_POST['create'])){
                    $this->view('Admin/addShowCase');
                }
                else{
                    $filename= $this->imageUpload();
                    $data=[
                        'title' => $_POST['title'],
                        'image_url' => $filename
                    ];
               
                    if($this->ShowCaseModel->create($data)){
                        echo 'Please wait we are creating the user for you!';
                        header('Location: /SystemDevProject/Admin/ShowCase');
                        //echo '<meta http-equiv="Refresh" content="2; url=/MVC/User/getUsers">';
                    }
                }
            }
        }

        public function editShowCase($showcase_id){
            if(isAdmin()) {
                $showcase = $this->ShowCaseModel->getShowCase();
                if(!isset($_POST['edit'])){
                 $this->view('Admin/editShowCase/', $showcase);
                }
                else{
                    $filename= $this->imageUpload();
                    $data=[
                        'title' => $_POST['title'],
                        'image_url' => $filename,
                        'id' => $shampoo_id
                    ];
               
                    if($this->ShowCaseModel->update($data)){
                            echo 'Please wait we are creating the user for you!';
                        header('Location: /SystemDevProject/Admin/Shampoos');
                        //echo '<meta http-equiv="Refresh" content="2; url=/MVC/User/getUsers">';
                    }
                }
            }
        }

        public function deleteShowCase($id){
            if(isAdmin()) {
                $data=[
                    'id' => $id
                ];
                if($this->ShowCaseeModel->delete($data)){
                    echo 'Please wait we are deleting the user for you!';
                    //header('Location: /MVC/User/getUsers');
                    echo '<meta http-equiv="Refresh" content=".2; url=/SystemDevProject/Admin/ShowCase">';
                }
            }
        }
/*----------------------------------------------------------------------------------------------------NOT DONE--------------------*/
        public function addAppoitnment(){
            if (isAdmin()) {
                if(!isset($_POST['create'])){
                    $this->view('Admin/addShampoo');
                }
                else{
                    $filename= $this->imageUpload();
                    $data=[
                        'name' => trim($_POST['name']),
                        'price' => trim($_POST['price']),
                        'duration' => trim($_POST['duration']),
                        'description' => trim($_POST['description']),
                        'imgURL' => $filename
                    ];
               
                    if($this->NewsModel->create($data)){
                        echo 'Please wait we are creating the user for you!';
                        header('Location: /SystemDevProject/Admin/Shampoo');
                        //echo '<meta http-equiv="Refresh" content="2; url=/MVC/User/getUsers">';
                    }

                }
            }
        }

        public function editAppointment($shampoo_id){
            if (isAdmin()) {
                $shampoo = $this->ShampooModel->getShampoo();
                if(!isset($_POST['edit'])){
                    $this->view('Admin/editShampoo/', $shampoo);
                }else{
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
        }

        public function deleteAppointment($id){
            if(isAdmin()) {
                $data=[
                    'id' => $id
                ];
                if($this->ShowCaseeModel->delete($data)){
                    echo 'Please wait we are deleting the user for you!';
                    //header('Location: /MVC/User/getUsers');
                    echo '<meta http-equiv="Refresh" content=".2; url=/SystemDevProject/Admin/ShowCase">';
                }
            }
        }
/*------------------------------------------------------------------------------------------------------------------------*/

        public function isAdmin(){
            if (!isset($_SESSION['admin'])) {}
                echo "Access Denied";
                return false;
            }
            return true;
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