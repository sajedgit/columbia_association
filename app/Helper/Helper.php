<?php
namespace App\Helper;

use App\Models\Setting;
use Illuminate\Support\Facades\DB;

class Helper
{

    public function send_push_notification($device_ids,$title,$messages,$action,$item_id)
    {

        $result = Setting::find(1);
        //API URL of FCM
        $url_android = $result->url_android;
        $url_ios = $result->url_ios;
        $api_key_android = $result->api_key_android;
        $api_key_ios = $result->api_key_ios;

        /*api_key available in:
        Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key*/
       // $api_key_android = 'AAAAjngH2e4:APA91bGJOGoh51hlJ64S1mKner9rGGXTk6wA8563q_Ok3z140dEWrKdzugGp17cQzeSH1iBjaYVMTlS6eE5rS9Ci-yjlvC6mSnAmpzC9oAUcG1VPmb1KIgTIz6RVdZOmUiU_yP2V9oyE';
       // $device_id="d0jHA1qES6y0yqmJ5UzJkJ:APA91bFcWHwt9zhabeSqBJmnHHxv6BRxYeU7oXNgxKXhBupXRcnz686kxCWWQr05OA5CEHDVdIp9cbgBOv63kKROMTuR1vbOS6tNODn57kIcUxt4xqZtbsUUS1xrtNNZsBV753D7mbg-";

        $notification['title'] = $title ;
        $notification['message'] = $messages;
        $notification['tag'] = "chat";
        $notification['priority'] = "high";
        $notification['foreground'] = true;
        $fields = array (
            'to' => $device_ids,
            'notification' => array (
                "body" => $messages,
                "title" => $title,
                "icon" => "myicon"
            ),
            'data' => array (


                "message" => $messages,
                "title"=>$title,
                "action"=>$action,
                "item_id"=>$item_id


            )
        );

//header includes Content type and api key
        $headers = array(
            'Content-Type:application/json',
            'Authorization:key='.$api_key_android
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url_android);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('FCM Send Error: ' . curl_error($ch));
        }
        curl_close($ch);
        print_r($result) ;
    }




    public function get_device_id_array_by_user_id($user_ids)
    {
        $get_user_ids = implode(",", $user_ids);
        $member_device = DB::select(DB::raw(" SELECT group_concat(concat('',member_device_token_id,'')) as device_id_list from member_devices where  ref_member_device_membership_id IN ($get_user_ids) "));
        $member_device = $member_device[0];
        $member_device_token_id = $member_device->device_id_list;
        $member_device_token_id = json_encode(explode(",", $member_device_token_id));
      //  $member_device_token_id = explode(",", $member_device_token_id);
        return $member_device_token_id;
    }




    public function get_device_id_by_user($user_id)
    {
        $member_device = DB::select(DB::raw(" SELECT distinct member_device_token_id  from member_devices where  ref_member_device_membership_id = $user_id "));
//        $member_device = DB::select(DB::raw(" SELECT distinct member_device_token_id  from member_devices where
//        ref_member_device_membership_id = $user_id order by member_device_storing_datetime desc limit 0,1"));

        if( count($member_device) > 0)
        {
            $member_device = $member_device[0];
            $member_device_token_id = $member_device->member_device_token_id;
            return $member_device_token_id;
        }
        else
        {
            return 0;

        }




    }




}

?>
