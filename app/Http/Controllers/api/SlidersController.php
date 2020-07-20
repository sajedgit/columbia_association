<?php

namespace App\Http\Controllers\api;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\DB;


class SlidersController extends Controller
{
    public function index()
    {

        $result_data = array();
        $results = Slider::orderBy('id', 'desc')->get();

        foreach ($results as $data):

            $arr= array(
                "id"=>$data->id,
                "name"=>$data->name,
                "caption"=>$data->caption,
                "photo"=>url('/')."/public/images/slider/".$data->photo

            );
            array_push($result_data,$arr);
        endforeach;


        return response()->json([
            'success' => true,
            'data' => $result_data
        ]);


    }




}










