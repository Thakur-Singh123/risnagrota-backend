<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\Mail\CommonContactformEmail;
class CommonContactformController extends Controller
{
    public function index(Request $request)
    {
        $mailData = [
                    'full_name' => $request['full_name'],
                    'phone_number' => $request['phone_number'],
                    'email' => $request['email'],
                    'message' => $request['message'],

                    ];
         
        $mailSent = Mail::to('rainbowschoolnagrota@gmail.com')->send(new CommonContactformEmail($mailData));
        if($mailSent){
        $success['status'] = 200;
            $success['message'] = "email sent successfully";
            return response()->json($success, 200);

        }else {
            $responce = array(
             'status' => 202,
             'message' => 'Email Not Sent');
              return response()->json($responce);}
    } 
}