<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactForm;
use App\Mail\ContactsForm;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    //Function for submit contact form
    public function submit_contact_form(Request $request) {
        //Create contact
        $MailData = ContactForm::create([
            'email' => $request['email'],
            'message' => $request['message'],
        ]);

        //Send email
        Mail::to(['kapoorthakur906@gmail.com', $request['email']])->send(new ContactsForm($MailData));

        //Check if email is created or not
        if ($MailData){
            $success['status'] = 200;
            $success['message'] = 'Email sent successfully.';
            $success['data'] = $MailData;
            return response()->json($success, 200);
        } else {
            $responce = array(
            'status' => 202,
            'message' => 'Email Not Sent');
            return response()->json($responce);
        }
    }

    //Function for get all contacts
    public function all_contacts() {
        $all_contacts = ContactForm::Orderby('ID', 'DESC')->get();
        //Get all contacts is exists or not
        if ($all_contacts) {
            $success['status'] = 200;
            $success['message'] = 'Contacts get successfully.';
            $success['data'] = $all_contacts;
            return response()->json($success, 200);
        } else {
            $responce = array(
            'status' => 202,
            'message' => 'Opps something went wrong!');
            return response()->json($responce);
        }
    }
}
