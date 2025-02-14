<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\ContactUsMail;
use Mail;
use App\Models\ContactUs;


class ContactUsController extends Controller
{
    //Function for send email 
    public function contact_us(Request $request) {
        $contactApiKey = config('app.contact_api_key');
        //Check if contact api key is match or not
        if ($contactApiKey == $request['contact_api_key']) {
            //Create email
            $send_email = ContactUs::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'phone_no' => $request['phone_no'],
                'message' => $request['message'],
            ]);
            //Send email
            $mailSent = Mail::to(['expertdesignpro@gmail.com','atulbhartipixxelu@gmail.com', $request['email']])->send(new ContactUsMail($send_email));
            //Check if email is sent or not
            if ($mailSent){
                $success['status'] = 200;
                $success['message'] = 'Email sent successfully.';
                //$success['data'] = $mailSent;
                return response()->json($success, 200);
            } else {
                $responce = array(
                'status' => 202,
                'message' => 'Email Not Sent');
                return response()->json($responce);
            }
        } else {
            $success['status'] = 202;
            $success['message'] = 'API key does not match.';
            return response()->json($success, 202);
        }
    }
}