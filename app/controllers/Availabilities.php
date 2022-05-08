<?php

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
            $data['avails'] = $this->day_mapper($this->avail_model->get());
            $this->view('Admin/Availabilities', $data);
        }
    }

    public function create_availabilities()
    {
        if (!is_admin_logged_in()) {
            header('Location: ' . URLROOT);
        } else if (!isset($_POST['Create_Availability'])) {
            $this->go_avail_main();
        } else {
            $data = $this->validate_availabilities($_POST);

            if (!empty($data['error'])) {
                $this->set_session_messages(false, null, $data['error']);
            } else {
                $avails = $this->avail_model->getByDate($data['day']);
                if (!$this->validate_with_other_avails($data['start'], $data['end'], $avails)) {
                    $this->set_session_messages(false, null, ['New Availability conflicts with other availabilities']);
                } else {
                    $isSucc = $this->avail_model->create($data);
                    $this->set_session_messages($isSucc, 'Availability successfully created!', ['Error creating availability!']);
                }
            }

            $this->go_avail_main();
        }
    }

    // public function edit_availabilities($avail_id)
    // {
    //     if (!is_admin_logged_in()) {
    //         header('Location: ' . URLROOT);
    //     } else if (!isset($_POST['Edit Availability'])) {
    //         $this->go_avail_main();
    //     } else {
    //         $data = $this->validate_availabilities($_POST);

    //         if (!empty($data['error'])) {
    //             $this->set_session_messages(false, null, $data['error']);
    //         } else {
    //             $data['id'] = $avail_id;
    //             $isSucc = $this->avail_model->update($data);
    //             $this->set_session_messages($isSucc, 'Availability ' . $avail_id . ' successfully edited!', 'Error editing availability ' . $avail_id);
    //         }

    //         $this->go_avail_main();
    //     }
    // }

    public function delete_availability($avail_id)
    {
        if (!is_admin_logged_in()) {
            header('Location: ' . URLROOT);
        } else {
            $data = ['id' => $avail_id];
            $isSucc = $this->avail_model->delete($data);
            $this->set_session_messages($isSucc, 'Availability ' . $avail_id . ' successfully deleted!', ['Error deleting availability ' . $avail_id]);

            $this->go_avail_main();
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

        if (!$data['day'] && !is_int($data['day'])) {
            $data['error'][] = 'Day must be a day of the week!';
        }
        if (preg_match($time_regex, $data['start']) != 1) {
            $data['error'][] = 'Start must be a a time string of the form HH:MM using the 24-hour format!';
        }
        if (preg_match($time_regex, $data['end']) != 1) {
            $data['error'][] = 'End must be a a time string of the form HH:MM using the 24-hour format!';
        }
        if (!$this->is_duration_valid($data['start'], $data['end'])) {
            $data['error'][] = 'Start Time must be before the End Time!';
        }

        return $data;
    }

    private function day_mapper($avails)
    {
        return array_map(
            function ($avail) {
                $avail->day = Availabilities::$DAYS_OF_THE_WEEK[$avail->day];
                $avail->start = date('h:i a', strtotime($avail->start));
                $avail->end = date('h:i a', strtotime($avail->end));
                return $avail;
            },
            $avails
        );
    }

    private function is_duration_valid($start, $end)
    {
        $st = strtotime($start);
        $ed = strtotime($end);

        return $st < $ed;
    }

    private function validate_with_other_avails($start, $end, $avails)
    {
        $data = ['errors' => []];
        $valid = true;
        foreach ($avails as $avail) {
            $st = strtotime($start);
            $ed = strtotime($end);
            $avail_st = strtotime($avail->start);
            $avail_ed = strtotime($avail->end);
            $valid = $valid && (($st < $avail_st && $ed <= $avail_st) || ($st >= $avail_ed && $ed > $avail_ed));
        }

        return $valid;
    }

    private function go_avail_main()
    {
        header('Location: ' . URLROOT . '/availabilities');
    }
}
