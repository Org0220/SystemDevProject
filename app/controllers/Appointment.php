<?php

    class Appointment extends Controller{
    
        public static $MONTH = [
            'January', 'February', 'March', 'April',
            'May', 'June', 'July', 'August',
            'September', 'October', 'November', 'December'
        ];

        public function __construct()
        {
            $this->ServiceModel = $this->model('ServiceModel');
            $this->AppointmentModel = $this->model('AppointmentModel');
            $this->AvailabilitiesModel = $this->model('AvailabilitiesModel');
        }


        public function index()
        {
            $this->read_appointment('User/Services',  $this->ServiceModel->getServices());
        }

        public function calendar($appointment_id) {
            
            $_SESSION['appointment_id'] = $appointment_id;
            $this->view('User/calendar');
        }

        public function hours($day, $month, $year, $weekDay)
        {
            $data = [
                `endHour` => 22
            ];
            $_SESSION['date'] = $day . '/' . intval($month, 10) + 1 . '/' . $year;
            $_SESSION['weekDay'] = $weekDay;
            
            $data['hour'] = 7;
            $data['minute'] = 0;  
            $data['duration'] = $this->ServiceModel->getService( $_SESSION['appointment_id'])->duration;
            $data['availbilities'] = $this->AvailabilitiesModel->getByDate($_SESSION['weekDay']);
            $data['appointments'] = $this->AppointmentModel->getAppointmentByDate($_SESSION['date']);
            
            $this->read_appointment('User/hours',  $data);
        }

        public function clear_data()
        {
            $this->clear_appointment_session();
            header('Location: ' . URLROOT . '/appointment');
        }
        
        public function admin_appointments()
        {
            
            if (!is_admin_logged_in()) {
                header('Location: ' . URLROOT);
            } else {
                if(isset($_POST['search'])){
                    if($_POST['searchOption'] == 'name') {
                        $data['appointments'] = $this->AppointmentModel->getAppointmentByName(trim($_POST['searchText']));
                    } else if($_POST['searchOption'] == 'date') {
                        $data['appointments'] = $this->AppointmentModel->getAppointmentWithClientByDate(trim($_POST['searchText']));
                    }
                } else {
                    $data['appointments'] = $this->AppointmentModel->getAppointmentWithClient();
                }
                
                $this->read_appointment('Admin/Appointment',  $data);
            }
        }
    
        public function create_appointment()
        {
            if ($this->is_appointment_session_valid()) {
                $data = $this->get_appointment_session_vars();
                $this->AppointmentModel->create($data);
                $this->clear_appointment_session();
                $this->view('User/bookingSuccess', $data);
            } else {
                header('Location: ' . URLROOT . '/appointment');
            }
        }
    
        public function update_appointment($appointment_id)
        {
           
            if (!is_admin_logged_in()) {
                header('Location: ' . URLROOT);
            } else if (!isset($_POST['Update_Appointment'])) {
                $data['appointment'] = $this->AppointmentModel->getAppointment($appointment_id);
                $this->view('Admin/editAppointment', $data);
            } else {
                $data = $this->validate_appointment($_POST);
                $data['appointment'] = $this->AppointmentModel->getAppointment($appointment_id);
                if (!empty($data['error'])) {
                    
                    $this->view('Admin/editAppointment', $data);
                } else {
                    
                    if (!empty($data['error'])) {
                        $this->read_appointment('Admin/Appointment', $data);
                    } else {
                        $data['id'] = $appointment_id;
                        $isSucc = $this->AppointmentModel->update($data);
                        if ($isSucc) {
                            $this->read_appointment('Admin/Appointment', ['msg' => "Appointment $appointment_id was updated", 'appointments' => $this->AppointmentModel->getAppointmentWithClient()]);
                        } else {
                            $this->read_appointment('Admin/editAppointment', ['error' => ['Error creating news!']]);
                        }
                    }
                }
            }
        }
    
        public function delete_appointment($appointment_id)
        {
            if (!is_admin_logged_in()) {
                header('Location: ' . URLROOT);
            } else {
                $isSucc = $this->AppointmentModel->delete($appointment_id);
                $this->view_selector(
                    $isSucc,
                    'Appointment ' . $appointment_id . ' successfully deleted!',
                    'Error deleting serviec ' . $appointment_id,
                    'Admin/Appointment'
                );
            }
        }
    
        private function read_appointment($view_name, $data)
        {
            $this->view($view_name, $data);
        }

        private function validate_appointment($raw_data)
        {
            $data = ['error' => []];
            $data['date'] = isset($raw_data['date']) ? trim($raw_data['date']) : '';
            $data['time'] = isset($raw_data['time']) ? trim($raw_data['time']) : '';
            
            if (!$data['date']) {
                $data['error'][] = 'date must not be empty!';
            } else {
                $parts = explode('-', $data['date']);
                if(intval($parts[2],10) < 10) {
                    $parts[2] = trim($parts[2], "0");
                }
                if(intval($parts[1],10) < 10) {
                    $parts[1] = trim($parts[1], "0");
                }
                $data['date'] = $parts[2] . '/' . $parts[1] . '/' . $parts[0];
            }
            if (!$data['time']) {
                $data['error'][] = 'start must not be empty!';
            }

            return $data;
        }

        private function view_selector($isSucc, $msg, $error, $view)
        {
            $prop = $isSucc ? 'msg' : 'error';
            $message = $isSucc ? $msg : $error;
            $data['appointments'] = $this->AppointmentModel->getAppointmentWithClient();
            $this->view($view, [$prop => $message, 'appointments' => $this->AppointmentModel->getAppointmentWithClient()]);
        }
    
        private function clear_appointment_session()
        {
            unset($_SESSION['date']);
            unset($_SESSION['time']);
            unset($_SESSION['appointment_id']);
            unset($_SESSION['is_colored']);
            unset($_SESSION['is_combo']);
            unset($_SESSION['weekDay']);
            unset($_SESSION['service_name']);
            unset($_SESSION['service_price']);
            unset($_SESSION['service_duration']);
        }

        private function is_appointment_session_valid()
        {
            return isset($_SESSION['date']) && isset($_SESSION['time']) && isset($_SESSION['client_id'])
            && isset($_SESSION['appointment_id']) && isset($_SESSION['is_colored']) && isset($_SESSION['is_combo']);
        }

        private function get_appointment_session_vars()
        {
            $data = [];
            $data['date'] = $_SESSION['date'];
            $data['time'] = $_SESSION['time'];
            $data['client_id'] = $_SESSION['client_id'];
            $data['service_id'] = $_SESSION['appointment_id'];
            $data['is_colored'] = $_SESSION['is_colored'];
            $data['is_combo'] = $_SESSION['is_combo'];
            $data['week_day'] = Appointment::$MONTH[intval($_SESSION['weekDay'])];
            $data['proper_date'] = $this->convert_date_to_readable_date($data['date']);
            $data['service_name'] = $_SESSION['service_name'];
            $data['service_price'] = $_SESSION['service_price'];
            $data['service_duration'] = $_SESSION['service_duration'];

            return $data;
        }

        private function convert_date_to_readable_date($date_string)
        {
            $date_parts = explode('/', $date_string);
            $date_parts[0] = str_pad($date_parts[0], 2, '0', STR_PAD_LEFT);
            $date_parts[1] = Appointment::$MONTH[intval($date_parts[1]) - 1];

            return join('/', $date_parts);
        }
    }
