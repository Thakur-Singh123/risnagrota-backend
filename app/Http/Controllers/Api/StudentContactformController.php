<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Mail;
use App\Mail\StudentContactformEmail;
class StudentContactformController extends Controller
{
    public function index(Request $request)
    {
        $mailData = [
                    'first_name' => $request['first_name'],
                    'last_name' => $request['last_name'],
                    'd_o_b' => $request['d_o_b'],
                    'gender' => $request['gender'],
                    'class_name' => $request['class_name'],
                    'father_name' => $request['father_name'],
                    'mother_name' => $request['mother_name'], 
                    'occupation' => $request['occupation'], 
                    'phone' => $request['phone'],
                    'address_line_1' => $request['address_line_1'],
                    'address_line_2' => $request['address_line_2'],
                    'description' => $request['description'], 
                    ];
         
        $mailSent = Mail::to('rainbowschoolnagrota@gmail.com')->send(new StudentContactformEmail($mailData));
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
