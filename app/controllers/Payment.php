<?php

class Payment extends Controller
{
    public function create_checkout_session()
    {
        // Setup the checkout session and redirect to checkout.stripe.com
    }

    public function checkout_success()
    {
        // setup the view for success checkout
    }

    public function checkout_cancel()
    {
        // setup the view for cancel checkout
    }
}