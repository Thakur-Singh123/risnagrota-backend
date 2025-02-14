<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    //Function for show lastes notification
    public function notification() {
        //Get notification
        $get_notification = Notification::where('status', 'Active')->orderBy('created_at', 'DESC')->first();
       
        //Check if notification is get or not
        if ($get_notification){
            //Success massage show
            $success['status'] = 200;
            $success['message'] = 'Notification get successfully.';
            $success['data'] = $get_notification;
            return response()->json($success, 200);
        } else {
            //Unsuccess massage show
            $responce = array(
            'status' => 202,
            'message' => 'Opps something went wrong');
            return response()->json($responce);
        }
    }
    
}
