<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Mail\SendEventMail;
use App\Models\Event;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Srmklive\PayPal\Services\ExpressCheckout;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\URL;

use App\CustomFolder\PushNotificationClass;

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



    public function processPayment(Request $request)
    {
        $user_id= $request->user_id;
        $item_name= $request->item_name;
        $price= $request->price;
        $item_description= $request->item_description;
        $quantity= $request->quantity;
        $action= $request->action;
        $details= $request->details;

        $product = [];
        $product['items'] = [
            [
                'name' => $item_name,
                'price' => $price,
                'desc' =>$item_description,
                'qty' => $quantity
            ]
        ];

        $product['invoice_id'] = $user_id."_".$action."_".time();
        $product['invoice_description'] = "$action Order #{$product['invoice_id']} Bill";
        $product['return_url'] = route('payment_success', [$details]);
        $product['cancel_url'] = route('cancel.payment');
        $product['total'] = $price * $quantity;

        $paypalModule = new ExpressCheckout;

        $res = $paypalModule->setExpressCheckout($product);
        $res = $paypalModule->setExpressCheckout($product, true);

       // print_r($res);die();

        return redirect($res['paypal_link']);
    }

    public function productPayment(Request $request)
    {
//        $device_ids=json_encode(array("123546789","123456789"));
//        $helper = new Helper();
//        $helper->send_push_notification($device_ids,"title","this is test message","event",1);
//        die();
        $user_id = $request->user_id;
        $item_id = $request->product_id;
        $quantity = $request->quantity;

        if( empty($user_id) || empty($item_id) || empty($quantity)  )
        {
            return view('404');
        }

        $action="buyProduct";

        $products = Product::findOrFail($item_id);
        $item_name=$products->product_name;
        $item_description=$products->product_description;
        $price=$products->price;

        $details=$user_id."_".$action."_".$item_id;

        //$this->processPayment($user_id,$product_id,$product_name,$product_description,$price,$quantity,$action);

        return view('test_payment', compact('user_id','item_id','item_name','item_description','price','quantity','action','details'));
    }

    public function ticketPayment(Request $request)
    {
        $user_id = $request->user_id;
        $item_id = $request->event_id;
        $quantity = $request->quantity;

        if( empty($user_id) || empty($item_id) || empty($quantity)  )
        {
            return view('404');
        }

        $action="buyTicket";

        $events = Event::findOrFail($item_id);
        $item_name=$events->event_title;
        $item_description=$events->event_details;
        $price=$events->event_ticket_price;

        $details=$user_id."_".$action."_".$item_id;

        //$this->processPayment($user_id,$product_id,$product_name,$product_description,$price,$quantity,$action);

        return view('test_payment', compact('user_id','item_id','item_name','item_description','price','quantity','action','details'));
    }


    public function paymentCancel()
    {
        dd('Your payment has been declend. The payment cancelation page goes here!');
    }

    public function paymentSuccess(Request $request,$details)
    {
        $paypalModule = new ExpressCheckout;
        $response = $paypalModule->getExpressCheckoutDetails($request->token);

        //print_r($response);
        echo "<br/><br/><br/>";


        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING']))
        {
            $api_response=$this->call_product_api($response,$details);
            print_r(json_decode($api_response));
            dd('Payment was successfull. The payment success page goes here!');
        }

        dd('Error occured!');
    }

    public function getRandStr($n) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }


    public function call_product_api($response,$details_info)
    {
        $get_details=explode("_",$details_info);
        $user_id=$get_details[0];
        $action=$get_details[1];
        $item_id=$get_details[2];

        $FIRSTNAME=$response["FIRSTNAME"];
        $LASTNAME=$response["LASTNAME"];
        $CORRELATIONID=$response["CORRELATIONID"];
        $PAYERID=$response["PAYERID"];
        $INVNUM=$response["INVNUM"];
        $L_QTY0=$response["L_QTY0"];
        $L_AMT0=$response["L_AMT0"];
        $total_price=$L_QTY0 * $L_AMT0;

        $product_id=$item_id;
        $member_id=$user_id;
        $order_id=$INVNUM;
        $source="paypal";
        $payment_type="online payment";
        $details="... ... ...";
        $total_item=$L_QTY0;
        $total_price=$total_price;
        $buyer_first_name=$FIRSTNAME;
        $buyer_last_name=$LASTNAME;
        $CORRELATIONID=$CORRELATIONID;
        $PAYERID=$PAYERID;



        if(empty($product_id) || empty($member_id) || empty($order_id) || empty($source) || empty($payment_type) || empty($details)  || empty($total_item)  || empty($total_price) )
        {

            return response()->json([
                'success' => false,
                'message' => "Please provide these field: 'product_id, member_id, order_id, source, payment_type, details, total_item,total_price' "
            ]);
        }

        $payment_insert = DB::table('product_buyers')->insert(
            array(
                'ref_product_id' => $product_id,
                'ref_membership_id' => $member_id,
                'order_id' => $order_id,
                'CORRELATIONID' => $CORRELATIONID,
                'PAYERID' => $PAYERID,
                'INVNUM' => $INVNUM,
                'source' => $source,
                'buyer_first_name' => $buyer_first_name,
                'buyer_last_name' => $buyer_last_name,
                'payment_type' => $payment_type,
                'details' => $details,
                'total_item' => $total_item,
                'total_price' => $total_price,
                'product_buyer_stored_datetime' => NOW()
            )
        );


        if ($payment_insert)
        {
            $this->update_product_data($product_id, $total_item);
            $this->send_mail_product($product_id, $member_id, $order_id, $source, $payment_type, $details, $total_item, $total_price);
            $rest_data = Product::where('id', $product_id)->first();
            $rest_data->photo = url('/')."/public/images/product/".$rest_data->photo;
            return response()->json([
                'success' => true,
                'message' => "Buy Product Successfully",
                'data' => $rest_data
            ]);
        }
        else
        {
            return response()->json([
                'success' => false,
                'message' => "Payment not done Properly"
            ]);
        }



        //$results = Product::where('id', $product_id)->first();





    }



    public function update_product_data($event_id, $total_tickets)
    {
        $product_data = Product::findOrFail($event_id);
        $stock = $product_data->stock;
        $stock_update = $stock - $total_tickets;
        $form_data = array(
            'stock' => $stock_update,
        );


        Product::whereId($event_id)->update($form_data);
    }



    public function send_mail_product($event_id, $ref_membership_id, $order_id, $source, $payment_type, $details, $total_tickets, $net_amounts)
    {
        $event = DB::select(DB::raw(" SELECT * from products where  id=$event_id  "));
        $event = $event[0];
        $event_name = $event->product_name;
        $action = "Products";


        $user = DB::select(DB::raw(" SELECT * from memberships where  id=$ref_membership_id  "));
        $user = $user[0];
        $user_name = $user->name;
        $user_email = $user->email;
        $subject = "Buying Product Confirmation";
        $mail_to = $user_email;
        $cc = "sajedaiub@gmail.com";
        $bcc = "sajedaiub@gmail.com";


        Mail::to($mail_to)
            ->cc($cc)
            ->bcc($bcc)
            ->send(new SendEventMail($action, $event_name, $subject, $user_name, $order_id, $source, $payment_type, $details, $total_tickets, $net_amounts));

    }





}