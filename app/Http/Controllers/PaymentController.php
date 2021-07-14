<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paypal;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;

class PaymentController extends Controller
{
    private $subtotal = 0;

    /**
     * @param Paypal
    **/
    public function paypalPaymentRequest(Paypal $paypal){

        if (auth()->user()) {
            $amount = Product::select([
                Product::raw('carts.id as item_id'),
                'carts.total_price',
                'products.id',
                'products.name',
            ])->join('carts', 'carts.product_id', '=', 'products.id')
                ->where('carts.user_id', '=', auth()->user()->getAuthIdentifier())
                ->sum('carts.total_price');

            return redirect()->away($paypal->paymentRequest($amount));
        }else{
            redirect('home');
        }
    }

    /**
     * @param Request
     * @param Paypal
     * @param $status
     **/
    public function paypalCheckout(Request $request, Paypal $paypal, $status){

        if ($status == 'success'){
            $response = $paypal->checkout($request);

            if (!is_null($response)){
                    $response->user_id = auth()->id();
                    Order::createFromResponse($response);
                    Order::sendNotification($response);
                    session()->flash('message', 'Compra realizada con éxito');
                    session()->flash('status', 'success');
                    return redirect()->route('home');
            }else{
                session()->flash('message', 'Tu compra no se realizo con éxito');
                session()->flash('status', 'error');
                return redirect()->route('home');
            }
        }
    }
}
