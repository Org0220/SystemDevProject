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
        $this->db_dump = $this->model('DbDump');
    }
    // All the functions in this class should start with if (is_admin_logged_in())
    /*------------------------------------------------------------------------------------------------------------------------*/
    
    public function Database() {
        if (!is_admin_logged_in()) {
            header('Location: ' . URLROOT);
        } else {
            $table_names = $this->db_dump->get_tables();
            $data = [];
            foreach ($table_names as $table) {
                $table_name = $table->Tables_in_quedescils;
                $data[$table_name] = [];
                $data[$table_name]['table_columns'] = $this->db_dump->get_table_column_names($table_name);
                $data[$table_name]['table_records'] = $this->db_dump->get_table_records($table_name);
            }
            // echo '<pre>';
            // var_dump($data);
            // echo '</pre>';
            $this->view('Admin/DatabasePreview', $data);
        }
    }
    public function addShampoo()
    {
        if (is_admin_logged_in()) {
            if (!isset($_POST['create'])) {
                $this->view('Admin/addShampoo');
            } else {
                $filename = image_upload();
                $data = [
                    'name' => $_POST['name'],
                    'price' => trim($_POST['price']),
                    'description' => $_POST['description'],
                    'imgURL' => $filename
                ];

                if ($this->NewsModel->create($data)) {
                    echo 'Please wait we are creating the user for you!';
                    header('Location: /SystemDevProject/Admin/Shampoos');
                    //echo '<meta http-equiv="Refresh" content="2; url=/MVC/User/getUsers">';
                }
            }
        }
    }

    public function editShampoo($shampoo_id)
    {
        if (is_admin_logged_in()) {
            $shampoo = $this->ShampooModel->getShampoo($shampoo_id);
            if (!isset($_POST['edit'])) {
                $this->view('Admin/editShampoo/', $shampoo);
            } else {
                $filename = image_upload();
                $data = [
                    'name' => $_POST['name'],
                    'price' => trim($_POST['price']),
                    'description' => $_POST['description'],
                    'imgURL' => $filename,
                    'id' => $shampoo_id
                ];

                if ($this->ShampooModel->update($data)) {
                    echo 'Please wait we are creating the user for you!';
                    header('Location: /SystemDevProject/Admin/Shampoos');
                    //echo '<meta http-equiv="Refresh" content="2; url=/MVC/User/getUsers">';
                } else {
                }
            }
        }
    }

    public function deleteShampoo($id)
    {
        if (is_admin_logged_in()) {
            $data = [
                'id' => $id
            ];
            if ($this->ShampooModel->delete($data)) {
                echo 'Please wait we are deleting the user for you!';

                echo '<meta http-equiv="Refresh" content=".2; url=/SystemDevProject/Admin/Shampoos">';
            }
        }
    }
    /*------------------------------------------------------------------------------------------------------------------------*/
    public function addService()
    {
        if (is_admin_logged_in()) {
            if (isset($_POST['create'])) {
                $this->view('Admin/addService');
            } else {
                $filename = image_upload();
                $data = [
                    'name' => trim($_POST['name']),
                    'price' => trim($_POST['price']),
                    'duration' => trim($_POST['duration']),
                    'description' => $_POST['description'],
                    'imgURL' => $filename
                ];

                if ($this->ServiceModel->create($data)) {
                    echo 'Please wait we are creating the user for you!';
                    header('Location: /SystemDevProject/Admin/Service');
                    //echo '<meta http-equiv="Refresh" content="2; url=/MVC/User/getUsers">';
                }
            }
        }
    }

    public function editService($service_id)
    {
        if (is_admin_logged_in()) {
            $service = $this->ShampooModel->getService($service_id);
            if (!isset($_POST['edit'])) {
                $this->view('Admin/editService/', $service);
            } else {
                $filename = image_upload();
                $data = [
                    'name' => trim($_POST['name']),
                    'price' => trim($_POST['price']),
                    'duration' => trim($_POST['duration']),
                    'description' => $_POST['description'],
                    'imgURL' => $filename,
                    'id' => $service_id
                ];

                if ($this->ServiceModel->update($data)) {
                    echo 'Please wait we are creating the user for you!';
                    header('Location: /SystemDevProject/Admin/Service');
                    //echo '<meta http-equiv="Refresh" content="2; url=/MVC/User/getUsers">';
                }
            }
        }
    }

    public function deleteService($id)
    {
        if (is_admin_logged_in()) {
            $data = [
                'id' => $id
            ];
            if ($this->ServiceModel->delete($data)) {
                echo 'Please wait we are deleting the user for you!';
                //header('Location: /MVC/User/getUsers');
                echo '<meta http-equiv="Refresh" content=".2; url=/SystemDevProject/Admin/Service">';
            }
        }
    }
    /*------------------------------------------------------------------------------------------------------------------------*/
    public function addAppoitnment()
    {
        if (is_admin_logged_in()) {
            if (!isset($_POST['create'])) {
                $this->view('Admin/addShampoo');
            } else {
                $filename = image_upload();
                $data = [
                    'name' => trim($_POST['name']),
                    'price' => trim($_POST['price']),
                    'duration' => trim($_POST['duration']),
                    'description' => trim($_POST['description']),
                    'imgURL' => $filename
                ];

                if ($this->NewsModel->create($data)) {
                    echo 'Please wait we are creating the user for you!';
                    header('Location: /SystemDevProject/Admin/Shampoo');
                    //echo '<meta http-equiv="Refresh" content="2; url=/MVC/User/getUsers">';
                }
            }
        }
    }

    public function editAppointment($shampoo_id)
    {
        if (is_admin_logged_in()) {
            $shampoo = $this->ShampooModel->getShampoo();
            if (!isset($_POST['edit'])) {
                $this->view('Admin/editShampoo/', $shampoo);
            } else {
                $filename = image_upload();
                $data = [
                    'name' => trim($_POST['name']),
                    'price' => trim($_POST['price']),
                    'duration' => trim($_POST['duration']),
                    'description' => trim($_POST['description']),
                    'imgURL' => $filename,
                    'id' => $shampoo_id
                ];

                if ($this->ShampooModel->update($data)) {
                    echo 'Please wait we are creating the user for you!';
                    header('Location: /SystemDevProject/Admin/Shampoos');
                    //echo '<meta http-equiv="Refresh" content="2; url=/MVC/User/getUsers">';
                }
            }
        }
    }

    public function deleteAppointment($id)
    {
        if (is_admin_logged_in()) {
            $data = [
                'id' => $id
            ];
            if ($this->ShowCaseeModel->delete($data)) {
                echo 'Please wait we are deleting the user for you!';
                //header('Location: /MVC/User/getUsers');
                echo '<meta http-equiv="Refresh" content=".2; url=/SystemDevProject/Admin/ShowCase">';
            }
        }
    }
}
