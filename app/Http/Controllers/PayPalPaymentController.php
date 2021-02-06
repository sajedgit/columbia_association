<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;

class PayPalPaymentController extends Controller
{


    public function handlePayment()
    {
        $product = [];
        $product['items'] = [
            [
                'name' => 'Nike Joyride 2',
                'price' => 500,
                'desc' => 'Running shoes for Men',
                'qty' => 2
            ],
            [
                'name' => 'Sajed Special 2',
                'price' => 200,
                'desc' => 'Sajeds shoes for Men',
                'qty' => 3
            ]
        ];

        $product['invoice_id'] = 1;
        $product['invoice_description'] = "Order #{$product['invoice_id']} Bill";
        $product['return_url'] = route('success.payment');
        $product['cancel_url'] = route('cancel.payment');
        $product['total'] = 1600;

        $paypalModule = new ExpressCheckout;

        $res = $paypalModule->setExpressCheckout($product);
        $res = $paypalModule->setExpressCheckout($product, true);

        return redirect($res['paypal_link']);
    }



    public function processPayment($user_id,$items,$quantity)
    {
        $product = [];
        $product['items'] = [
            [
                'name' => 'Nike Joyride 2',
                'price' => 500,
                'desc' => 'Running shoes for Men',
                'qty' => 2
            ]
        ];

        $product['invoice_id'] = 1;
        $product['invoice_description'] = "Order #{$product['invoice_id']} Bill";
        $product['return_url'] = route('success.payment');
        $product['cancel_url'] = route('cancel.payment');
        $product['total'] = 1600;

        $paypalModule = new ExpressCheckout;

        $res = $paypalModule->setExpressCheckout($product);
        $res = $paypalModule->setExpressCheckout($product, true);

        return redirect($res['paypal_link']);
    }

    public function productPayment(Request $request)
    {
        $user_id = $request->user_id;
        $product_id = $request->product_id;
        $quantity = $request->quantity;

        $products = Product::findOrFail($product_id);
        $product_name=$products->product_name;
        $product_description=$products->product_description;
        $price=$products->price;
        $this->processPayment($user_id,$product_id,$product_name,$product_description,$price);


        //return view('test_payment', compact('products','user_id','quantity'));
    }


    public function paymentCancel()
    {
        dd('Your payment has been declend. The payment cancelation page goes here!');
    }

    public function paymentSuccess(Request $request)
    {
        $paypalModule = new ExpressCheckout;
        $response = $paypalModule->getExpressCheckoutDetails($request->token);

        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            dd('Payment was successfull. The payment success page goes here!');
        }

        dd('Error occured!');
    }
}