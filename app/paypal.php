<?php

namespace App;

use http\Env\Request;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;
use function PHPUnit\Framework\returnArgument;

class Paypal{

    private $client;

    public function __construct()
    {
        $this->client = new PayPalHttpClient(
            new SandboxEnvironment(
                config('services.paypal.key'),
                config('services.paypal.secret')
            )
        );
    }

    /**
     * @param $amount - amount of products
     */
    public function paymentRequest($amount)
    {
        // Creating a HTTP Request
        $request = new OrdersCreateRequest();

        // Setting request's preferences that can be minimal(minimum info) or presentation(all info)
        $request->prefer('return=representation');


        $request->body = [
            'intent' => 'CAPTURE',
            'purchase_units' => [
               [
                   'reference_id' => 'test_ref_id1',
                   'amount' => [
                       'value' => $amount,
                       'currency_code' => "MXN"
                   ]
               ]
            ],
            'application_context' => [
                'cancel_url' => route('paypal.checkout', ['status' => 'failure']),
                'return_url' => route('paypal.checkout', ['status' => 'success'])
            ]
        ];

        try {
            $response = $this->client->execute($request);
            $approvalUrl = null;

            foreach ($response->result->links as $link){
                if($link->rel === 'approve'){
                    $approvalUrl = $link->href;
                }
            }
            return $approvalUrl;

        }catch (\HttpException $ex){
            dd($ex);
        }
    }

    /**
     * @return
     */
    public function checkout($request)
    {
        $request = new OrdersCaptureRequest($request->token);
        $request->prefer('return=representation');

        try {
            return $this->client->execute($request);
        }catch (\HttpException $ex){
            dd($ex);
        }
    }
}
