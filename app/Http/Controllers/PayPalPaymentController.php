<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Mail\SendEventMail;
use App\Mail\SendMembershipMail;
use App\Models\Event;
use App\Models\Product;
use App\Models\Membership;
use App\Models\MembershipPayment;
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




    public function process_payment_membership(Request $request)
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





    public function eventPayment(Request $request)
    {

        $user_id = $request->user_id;
        $item_id = $request->event_id;
        $quantity = $request->quantity;
        $payment_by = $request->payment_by;

        if( empty($user_id) || empty($item_id) || empty($quantity)  )
        {
            return view('404');
        }

        $action="buyTicket";

        $products = Event::findOrFail($item_id);
        $item_name=$products->event_title;
        $item_description=$products->event_details;
        $price=$products->event_ticket_price;

        $details=$user_id."_".$action."_".$item_id;

        //$this->processPayment($user_id,$product_id,$product_name,$product_description,$price,$quantity,$action);

        if($payment_by=="pay_now")
        {
            return view('test_payment', compact('user_id','item_id','item_name','item_description','price','quantity','action','details'));
        }
        elseif ($payment_by=="pay_later")
        {
            $this->call_event_later($details,$quantity,$payment_by);
        }
        else
        {
            return "please provide payment info";
        }
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

    public function paymentSuccess(Request $request,$details_info)
    {
        $details=$details_info;
        $get_details=explode("_",$details);
        $user_id=$get_details[0];
        $action=$get_details[1];
        $item_id=$get_details[2];

        $paypalModule = new ExpressCheckout;
        $response = $paypalModule->getExpressCheckoutDetails($request->token);

      //  print_r($response);
        echo "<br/><br/><br/>";


        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING']))
        {
            if($action=="buyProduct")
              $api_response=$this->call_product_api($response,$details_info);
            if($action=="buyTicket")
              $api_response=$this->call_event_api($response,$details_info);
            if($action=="buyMembership")
              $api_response=$this->call_membership_api($response,$details_info);

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
        $CURRENCYCODE=$response["CURRENCYCODE"];
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
            $this->send_mail_product($product_id, $member_id, $order_id, $source, $payment_type, $details, $total_item, $total_price." ".$CURRENCYCODE);
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

    }



    public function call_event_api($response,$details_info)
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
        $CURRENCYCODE=$response["CURRENCYCODE"];
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
        $msg="";



        if(empty($product_id) || empty($member_id) || empty($order_id) || empty($source) || empty($payment_type) || empty($details)  || empty($total_item)  || empty($total_price) )
        {

            return response()->json([
                'success' => false,
                'message' => "Please provide these field: 'event_id, member_id, order_id, source, payment_type, details, total_item,total_price' "
            ]);
        }




        $payment_insert = DB::table('event_ticket_buyers')->insert(
            array(
                'ref_event_id' => $product_id,
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
                'total_tickets' => $total_item,
                'total_price' => $total_price,
                'event_ticket_buyer_stored_datetime' => NOW()
            )
        );


        if ($payment_insert)
        {
            $this->update_event_data($product_id, $total_item);
            $this->send_mail_event($product_id, $member_id, $order_id, $source, $payment_type, $details, $total_item, $total_price." ".$CURRENCYCODE,$msg);
            $rest_data = Event::where('id', $product_id)->first();
            $rest_data->event_flyer_location = url('/')."/public/images/".$rest_data->event_flyer_location;
            return response()->json([
                'success' => true,
                'message' => "Buy Event Ticket Successfully",
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

    }



    public function call_event_later( $details_info,$quantity,$payment_by)
    {

        $get_details=explode("_",$details_info);
        $user_id=$get_details[0];
        $action=$get_details[1];
        $item_id=$get_details[2];

        $event = DB::select(DB::raw(" SELECT * from events where  id=$item_id  "));
        $event = $event[0];
        $event_ticket_price = $event->event_ticket_price;



        $product_id=$item_id;
        $member_id=$user_id;
        $order_id= $user_id."_".$action."_".time();;
        $source=$payment_by;
        $payment_type="cash";
        $details="... ... ...";
        $total_item=$quantity;
        $total_price=$event_ticket_price * $quantity;

        $msg="Your ticket booking is completed. Please contact with Admin and pay in cash as early as possible. Otherwise your booking will be cancelled.";




        if(empty($product_id) || empty($member_id) || empty($order_id) || empty($source) || empty($payment_type) || empty($details)  || empty($total_item)  || empty($total_price) )
        {

            return response()->json([
                'success' => false,
                'message' => "Please provide these field: 'event_id, member_id, order_id, source, payment_type, details, total_item,total_price' "
            ]);
        }




        $payment_insert = DB::table('event_ticket_buyers')->insert(
            array(
                'ref_event_id' => $product_id,
                'ref_membership_id' => $member_id,
                'order_id' => $order_id,
                'source' => $source,
                'payment_type' => $payment_type,
                'details' => $details,
                'total_tickets' => $total_item,
                'total_price' => $total_price,
                'event_ticket_buyer_stored_datetime' => NOW()
            )
        );


        if ($payment_insert)
        {
            $this->update_event_data($product_id, $total_item);
            $this->send_mail_event($product_id, $member_id, $order_id, $source, $payment_type, $details, $total_item, $total_price." USD",$msg);
            $rest_data = Event::where('id', $product_id)->first();
            $rest_data->event_flyer_location = url('/')."/public/images/".$rest_data->event_flyer_location;

            dd('Ticket booking was successfull. Please Contact with ADMIN!');
        }
        else
        {
            dd('Booking not done properly');
        }

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


    public function update_event_data($event_id, $total_tickets)
    {
        $product_data = Event::findOrFail($event_id);
        $stock = $product_data->event_total_seat;
        $stock_update = $stock - $total_tickets;
        $form_data = array(
            'event_total_seat' => $stock_update,
        );


        Event::whereId($event_id)->update($form_data);
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
        $msg="";

        Mail::to($mail_to)
            ->cc($cc)
            ->bcc($bcc)
            ->send(new SendEventMail($action, $event_name, $subject, $user_name, $order_id, $source, $payment_type, $details, $total_tickets, $net_amounts,$msg));

    }

    public function send_mail_Membership($ref_membership_id, $order_id, $source, $payment_type, $details,$start_date,$end_date,$renew_date, $net_amounts)
    {
        $event_name = "Buy Membership";

        $user = DB::select(DB::raw(" SELECT * from memberships where  id=$ref_membership_id  "));
        $user = $user[0];
        $user_name = $user->name;
        $user_email = $user->email;
        $subject = "Buying Membership Confirmation";
        $mail_to = $user_email;
        $cc = "sajedaiub@gmail.com";
        $bcc = "sajedaiub@gmail.com";
        $msg="";

        Mail::to($mail_to)
            ->cc($cc)
            ->bcc($bcc)
            ->send(new SendMembershipMail( $event_name, $subject, $user_name, $order_id, $source, $payment_type, $details, $start_date,$end_date,$renew_date,  $net_amounts,$msg));

    }

    public function send_mail_event($event_id, $ref_membership_id, $order_id, $source, $payment_type, $details, $total_tickets, $net_amounts,$msg)
    {
        $event = DB::select(DB::raw(" SELECT * from events where  id=$event_id  "));
        $event = $event[0];
        $event_name = $event->event_title;
        $action = "Tickets";


        $user = DB::select(DB::raw(" SELECT * from memberships where  id=$ref_membership_id  "));
        $user = $user[0];
        $user_name = $user->name;
        $user_email = $user->email;
        $subject = "Buying Event Ticket Confirmation";
        $mail_to = $user_email;
        $cc = "sajedaiub@gmail.com";
        $bcc = "sajedaiub@gmail.com";


        Mail::to($mail_to)
            ->cc($cc)
            ->bcc($bcc)
            ->send(new SendEventMail($action, $event_name, $subject, $user_name, $order_id, $source, $payment_type, $details, $total_tickets, $net_amounts,$msg));

    }

    public function membershipPayment(Request $request)
    {
        $user_id = $request->user_id;

        $setting = DB::select(DB::raw(" SELECT membership_price from settings where  id=1  "));
        $setting = $setting[0];

        $quantity = 1;

        if (empty($user_id)) {
            return view('404');
        }

        $action = "buyMembership";


        $item_id = 1234;
        $item_name = "Buy Membership";
        $item_description = "Buy Membership for One Year";
        $price =  $setting->membership_price;

        //$details = $user_id . "_" . $action;
        $details = $user_id."_".$action."_".$item_id;

        //$this->processPayment($user_id,$product_id,$product_name,$product_description,$price,$quantity,$action);

        return view('membership_payment', compact('user_id', 'item_name', 'item_description', 'price', 'quantity', 'action', 'details'));
    }




    public function call_membership_api($response,$details_info)
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
        $CURRENCYCODE=$response["CURRENCYCODE"];
        $L_QTY0=$response["L_QTY0"];
        $L_AMT0=$response["L_AMT0"];
        $total_price=$L_QTY0 * $L_AMT0;

        $product_id=$item_id;
        $member_id=$user_id;
        $order_id=$INVNUM;
        $source="PAYPAL";
        $payment_type="online payment";
        $details="Membership Payment";
        $total_item=$L_QTY0;
        $total_price=$total_price;
        $buyer_first_name=$FIRSTNAME;
        $buyer_last_name=$LASTNAME;
        $CORRELATIONID=$CORRELATIONID;
        $PAYERID=$PAYERID;


        $start_date = date('Y-m-d H:i:s');
        $end_date = date('Y-m-d',strtotime(date("Y-m-d", time()) . " + 365 day"));
         $renew_date = date('Y-m-d',strtotime(date("Y-m-d", time()) . " + 366 day"));

        if(empty($product_id) || empty($member_id) || empty($order_id) || empty($source) || empty($payment_type) || empty($details)  || empty($total_item)  || empty($total_price) )
        {

            return response()->json([
                'success' => false,
                'message' => "Please provide these field: 'product_id, member_id, order_id, source, payment_type, details, total_item,total_price' "
            ]);
        }


        DB::beginTransaction();

        try {

            $member_data = array(
                'membership_status'            =>  "Paid",
                'membership_start_date'        =>   NOW(),
                'membership_end_date'      =>   $end_date
            );
            Membership::whereId($user_id)->update($member_data);



            $payment_data =  array(
                'ref_membership_id' => $member_id,
                'membership_payment_by' => $source,
                'membership_payment_details' => $details,

                'CORRELATIONID' => $CORRELATIONID,
                'PAYERID' => $PAYERID,
                'INVNUM' => $INVNUM,
                'source' => $source,
                'buyer_first_name' => $buyer_first_name,
                'buyer_last_name' => $buyer_last_name,

                'membership_payment_datetime' => $start_date,
                'membership_payment_amount' => $total_price,
                'membership_next_renewal_date' => $renew_date,
                'membership_payment_creating_datetime' => $start_date
            );
            //print_r($payment_data);

            $aaa=MembershipPayment::create($payment_data);



            DB::commit();



            $this->send_mail_Membership( $member_id, $order_id, $source, $payment_type, $details,$start_date,$end_date,$renew_date,  $total_price." ".$CURRENCYCODE);
            return response()->json([
                'success' => true,
                'message' => "Make  Membership Payment Successfully"
            ]);






        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => "Payment not done Properly",
                'error'=>$e
            ]);
        }



    }







}