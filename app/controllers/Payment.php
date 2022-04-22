<?php

class Payment extends Controller
{
    public function __construct()
    {
        \Stripe\Stripe::setApiKey('sk_test_Hrs6SAopgFPF0bZXSN3f6ELN');
    }

    public function create_checkout_session()
    {
        $data = $this->parse_values($_POST);

        if (!empty($data['error'])) {
        } else {
            $checkout_session = \Stripe\Checkout\Session::create([
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'cad',
                        'product_data' => [
                            'name' => 'INSERT_SERVICE_NAME_HERE'
                        ],
                        'unit_amount' => $data['price'],
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => URLROOT . '/payment/checkout_success',
                'cancel_url' => URLROOT . '/payment/checkout_cancel'
            ]);

            header('Location: ' . $checkout_session->url);
        }
    }

    public function checkout_success()
    {
        $this->view('Checkout/checkoutSuccess');
    }

    public function checkout_cancel()
    {
        $this->view('Checkout/checkoutCancel');
    }

    private function parse_values($raw_data)
    {
    }
}
