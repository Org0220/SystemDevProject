<?php

class Payment extends Controller
{
    public function __construct()
    {
        \Stripe\Stripe::setApiKey('[INSERT CORRECT TEST API KEY]');
        $this->service_model = $this->model('ServiceModel');
    }

    public function order_summary()
    {
        $data = $this->parse_values($_SESSION);
        if (!isset($_POST['Confirm Booking']) && empty($data['error'])) {
            $service = $this->service_model->getService($data['service_id']);
            $_SESSION['service_name'] = $service->name;
            $_SESSION['service_price'] = $service->price;
            if ($data['combo']) {
                $_SESSION['service_name'] = 'Lash Removal + ' . $_SESSION['service_name'];
                $_SESSION['service_price'] += 15;
            }
            $this->view('User/ConfirmationPage', $data);
        } else if (!empty($data['error'])) {
            header('Location: ' . URLROOT . '/appointment');
        } else {
            if (isset($_POST['colored'])) {
                $_SESSION['service_name'] .= ' + $5 Add Color Lashes';
                $_SESSION['service_price'] += 5;
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
                        'unit_amount' => $_SESSION['service_price']
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => URLROOT . '[INSERT APPOINTMENT CREATION ROUTE HERE]',
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
        $data['service_id'] = isset($_SESSION['service_id']) ? $_SESSION['service_id'] : '';
        $data['combo'] = isset($_SESSION['combo']);

        if (!$data['date']) {
            $data['error'][] = 'Appointment Date must be set!';
        }
        if (!$data['week_day']) {
            $data['error'][] = 'Appointment Day must be set!';
        }
        if (!$data['service_id']) {
            $data['error'][] = 'Service ID must be set!';
        }

        return $data;
    }
}
