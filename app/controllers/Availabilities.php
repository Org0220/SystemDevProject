<?

class Availabilities extends Controller
{

    private static $DAYS_OF_THE_WEEK = [
        'Monday', 'Tuesday', 'Wednesday',
        'Thursday', 'Friday', 'Saturday',
        'Sunday'
    ];

    public function __construct()
    {
        $this->avail_model = $this->model('AvailabilitiesModel');
    }

    public function index()
    {
        header('Location: ' . URLROOT);
    }

    public function create_availabilities()
    {
        if (!is_admin_logged_in()) {
            header('Location: ' . URLROOT);
        } else if (!isset($_POST['Create Availability'])) {
            $this->view('[INSERT VIEW NAME HERE]');
        } else {
            $data = $this->validate_availabilities($_POST);

            if (!empty($data['error'])) {
                $this->view('[INSERT VIEW NAME HERE]', $data);
            } else {
                $isSucc = $this->avail_model->create($data);

                $this->view_selector(
                    $isSucc,
                    'Availability successfully created!',
                    'Error creating availability'
                );
            }
        }
    }

    public function edit_availabilities($avail_id)
    {
        if (!is_admin_logged_in()) {
            header('Location: ' . URLROOT);
        } else if (!isset($_POST['Edit Availability'])) {
            $this->view('[INSERT VIEW NAME HERE]');
        } else {
            $data = $this->validate_availabilities($_POST);

            if (!empty($data['error'])) {
                $this->view('[INSERT VIEW NAME HERE]', $data);
            } else {
                $data['id'] = $avail_id;
                $isSucc = $this->avail_model->update($data);

                $this->view_selector(
                    $isSucc,
                    'Availability ' . $avail_id . 'successfully edited!',
                    'Error editing availability ' . $avail_id
                );
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

            $this->view_selector(
                $isSucc,
                'Availability ' . $avail_id . ' successfully deleted!',
                'Error deleting availability ' . $avail_id
            );
        }
    }

    private function validate_availabilities($raw_data)
    {
        // Regex that Matches a time string HH:MM using 24-hour format
        $time_regex = '/(([0-1](?=[0-9]))|(2(?=[0-3])))[0-9]:[0-5][0-9]/';

        $data = ['error' => []];
        $data['day'] = isset($raw_data['day']) ? $raw_data['day'] : '';
        $data['start'] = isset($raw_data['start']) ? $raw_data['start'] : '';
        $data['end'] = isset($raw_data['end']) ? $raw_data['end'] : '';

        if (!$data['day'] || !in_array($data['day'], Availabilities::$DAYS_OF_THE_WEEK)) {
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

    private function view_selector($isSucc, $msg, $error)
    {
        $prop = $isSucc ? 'msg' : 'error';
        $message = $isSucc ? $msg : $error;
        $this->view('[INSERT VIEW PATH HERE]', [$prop => $message]);
    }
}
