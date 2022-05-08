<?php

class Payment extends Controller
{
    public static $DAYS_OF_THE_WEEK = [
        'Sunday', 'Monday', 'Tuesday',
        'Wednesday', 'Thursday', 'Friday',
        'Saturday'
    ];

    public static $MONTH = [
        'January', 'February', 'March', 'April',
        'May', 'June', 'July', 'August',
        'September', 'October', 'November', 'December'
    ];

    public function __construct()
    {
        \Stripe\Stripe::setApiKey('sk_test_51JmNFbHqzTtYYLlTbQe3NhtLWimZr117AHm83DGQINfuxUUwWe9HNljYdAHyR2BC9hZpAwlrOXJDMkvCZ855WeCp00OrnMppbq');
        $this->service_model = $this->model('ServiceModel');
    }

    public function order_summary($time)
    {
        $data = $this->parse_values($_SESSION);
        $decoded_time = rawurldecode($time);
        $given_time = strtotime($decoded_time);
        $data['time'] = $decoded_time;
        $data['service_start'] = date('h:i A', $given_time);
        if (!isset($_POST['Confirm_Booking']) && empty($data['error'])) {
            $service = $this->service_model->getService($data['service_id']);
            $data['service_name'] = $service->name;
            $data['service_price'] = $service->price;
            $data['service_end'] = date('h:i A', strtotime('+' . $service->duration . ' minutes', $given_time));
            $data['date'] = $this->convert_date_to_readable_date($_SESSION['date']);
            if ($data['combo']) {
                $data['service_name'] = 'Lash Removal + ' . $data['service_name'];
                $data['service_price'] += 15;
                $data['service_end'] = date('h:i A', strtotime('+15 minutes', strtotime($data['service_end'])));
                $_SESSION['is_combo'] = true;
            } else {
                $_SESSION['is_combo'] = false;
            }
            $this->view('User/ConfirmationPage', $data);
        } else if (!empty($data['error'])) {
            header('Location: ' . URLROOT . '/appointment');
        } else {
            $_SESSION['service_name'] = $_POST['service_name'];
            $_SESSION['service_price'] = doubleval($_POST['service_price']);
            $_SESSION['service_duration'] = $_POST['service_duration'];
            $_SESSION['time'] = $decoded_time;
            if (isset($_POST['colored'])) {
                $_SESSION['service_name'] .= ' + $5 Add Color Lashes';
                $_SESSION['service_price'] += 5;
                $_SESSION['is_colored'] = true;
            } else {
                $_SESSION['is_colored'] = false;
            }
            header('Location: ' . URLROOT . '/payment/create_checkout_session');
        }
    }

    public function create_checkout_session()
    {
        if (isset($_SESSION['service_name']) && isset($_SESSION['service_price'])) {
            $checkout_session = \Stripe\Checkout\Session::create([
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'cad',
                        'product_data' => [
                            'name' => $_SESSION['service_name']
                        ],
                        'unit_amount' => $_SESSION['service_price'] * 100
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => URLROOT . '/appointment/create_appointment',
                'cancel_url' => URLROOT . '/payment/checkout_cancel'
            ]);

            header('Location: ' . $checkout_session->url);
        } else {
            header('Location: ' . URLROOT . '/appointment');
        }
    }

    public function checkout_cancel()
    {
        $this->view('Checkout/checkoutCancel');
    }

    private function parse_values()
    {
        $data = ['error' => []];

        $data['date'] = isset($_SESSION['date']) ? $_SESSION['date'] : '';
        $data['week_day'] = isset($_SESSION['weekDay']) ? $_SESSION['weekDay'] : '';
        $data['service_id'] = isset($_SESSION['appointment_id']) ? $_SESSION['appointment_id'] : '';
        $data['combo'] = isset($_SESSION['combo']);

        if (!$data['date']) {
            $data['error'][] = 'Appointment Date must be set!';
        }
        if ($data['week_day'] != '0' && !$data['week_day']) {
            $data['error'][] = 'Appointment Day must be set!';
        }
        if (!$data['service_id']) {
            $data['error'][] = 'Service ID must be set!';
        }

        return $data;
    }

    private function convert_date_to_readable_date($date_string)
    {
        $date_parts = explode('/', $date_string);
        $date_parts[0] = str_pad($date_parts[0], 2, '0', STR_PAD_LEFT);
        $date_parts[1] = Payment::$MONTH[intval($date_parts[1]) - 1];

        return join('/', $date_parts);
    }
}
