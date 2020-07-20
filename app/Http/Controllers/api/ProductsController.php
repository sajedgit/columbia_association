<?php

namespace App\Http\Controllers\api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\DB;


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
                "photo"=>$data->photo

            );
            array_push($result_data,$arr);
        endforeach;


        return response()->json([
            'success' => true,
            'data' => $result_data
        ]);


    }









}










