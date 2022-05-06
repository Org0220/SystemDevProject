<?

class Availabilities extends Controller
{

    private static $DAYS_OF_THE_WEEK = [
        'Sunday', 'Monday', 'Tuesday',
        'Wednesday', 'Thursday', 'Friday',
        'Saturday'
    ];

    public function __construct()
    {
        $this->avail_model = $this->model('AvailabilitiesModel');
    }

    public function index()
    {
        if (!is_admin_logged_in()) {
        header('Location: ' . URLROOT);
        } else {
            $data = $this->get_session_messages($_SESSION);
            $this->view('Admin/Availabilities', $data);
        }
    }

    public function create_availabilities()
    {
        if (!is_admin_logged_in()) {
            header('Location: ' . URLROOT);
        } else if (!isset($_POST['Create Availability'])) {
            $this->go_avail_main();
        } else {
            $data = $this->validate_availabilities($_POST);

            if (!empty($data['error'])) {
                $this->set_session_messages(false, null, $data['error']);
            } else {
                $isSucc = $this->avail_model->create($data);
                $this->set_session_messages($isSucc, 'Availability successfully created!', 'Error creating availability!');
            }

            $this->go_avail_main();
        }
    }

    public function edit_availabilities($avail_id)
    {
        if (!is_admin_logged_in()) {
            header('Location: ' . URLROOT);
        } else if (!isset($_POST['Edit Availability'])) {
            $this->go_avail_main();
        } else {
            $data = $this->validate_availabilities($_POST);

            if (!empty($data['error'])) {
                $this->set_session_messages(false, null, $data['error']);
            } else {
                $data['id'] = $avail_id;
                $isSucc = $this->avail_model->update($data);
                $this->set_session_messages($isSucc, 'Availability ' . $avail_id . ' successfully edited!', 'Error editing availability ' . $avail_id);
            }
        }
    }

    public function delete_availabilities($avail_id)
    {
        if (!is_admin_logged_in()) {
            header('Location: ' . URLROOT);
        } else {
            $data = ['id' => $avail_id];
            $isSucc = $this->avail_model->delete($data);
            $this->set_session_messages($isSucc, 'Availability ' . $avail_id . ' successfully deleted!', 'Error deleting availability ' . $avail_id);
        }
    }

    private function validate_availabilities($raw_data)
    {
        // Regex that Matches a time string HH:MM using 24-hour format
        $time_regex = '/(([0-1](?=[0-9]))|(2(?=[0-3])))[0-9]:[0-5][0-9]/';

        $data = ['error' => []];
        $data['day'] = isset($raw_data['day']) ? array_search($raw_data['day'], Availabilities::$DAYS_OF_THE_WEEK) : '';
        $data['start'] = isset($raw_data['start']) ? $raw_data['start'] : '';
        $data['end'] = isset($raw_data['end']) ? $raw_data['end'] : '';

        if (!$data['day']) {
            $data['error'][] = 'Day must be a day of the week!';
        }
        if (preg_match($time_regex, $data['start']) != 1) {
            $data['error'][] = 'Start must be a a time string of the form HH:MM using the 24-hour format!';
        }
        if (preg_match($time_regex, $data['end']) != 1) {
            $data['error'][] = 'End must be a a time string of the form HH:MM using the 24-hour format!';
        }

        return $data;
    }

    private function go_avail_main()
    {
        header('Location: ' . URLROOT . '/availabilities');
    }
}
