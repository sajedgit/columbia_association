<?php

namespace App\Http\Controllers\api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendEventMail;





class ProductsController extends Controller
{
    public function index()
    {

        $result_data = array();
        $results = Product::orderBy('id', 'desc')->get();

        foreach ($results as $data):

            $arr= array(
                "product_id"=>$data->id,
                "product_name"=>$data->product_name,
                "product_description"=>$data->product_description,
                "price"=>$data->price,
                "stock"=>$data->stock,
               // "base_url"=>url('/'),
                "photo"=>url('/')."/public/images/product/".$data->photo

            );
            array_push($result_data,$arr);
        endforeach;


        return response()->json([
            'success' => true,
            'data' => $result_data
        ]);


    }


    public function show($id)
    {
        $result = Product::find($id);
        $result->photo = url('/')."/public/images/product/".$result->photo;
        if (!$result) {
            return response()->json([
                'success' => false,
                'message' => 'Item with id ' . $id . ' not found'
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => $result
        ]);

    }

    public function update(Request $request, $id)
    {
        $product_id=$id;
        $member_id=$request->member_id;
        $order_id=$request->order_id;
        $source=$request->source;
        $payment_type=$request->payment_type;
        $details=$request->details;
        $total_item=$request->total_item;
        $total_price=$request->total_price;
        $buyer_first_name=$request->buyer_first_name;
        $buyer_last_name=$request->buyer_last_name;

        $payment_insert = DB::table('product_buyers')->insert(
            array(
                'ref_product_id' => $product_id,
                'ref_membership_id' => $member_id,
                'order_id' => $order_id,
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










