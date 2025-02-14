<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\StudentAdmissionMail;
use Mail;
use App\Models\Student;

class StudentAdmissionController extends Controller
{
    //Function for student admission form
    public function create_admission_form(Request $request) {
        //Create admission form
        $is_create_student = Student::create([
            'student_name' => $request->student_name,
            'dob' => $request->dob,
            'class_admitted' => $request->class_admitted,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'phone_no' => $request->phone_no,
            'address' => $request->address,
            'status' => 'Active',
        ]);

        //Send email
        Mail::to('expertdesignpro@gmail.com','rainbowschoolnagrota@gmail.com')->send(new StudentAdmissionMail($is_create_student));   

        //Check if student admission form is created or not
        if ($is_create_student){
            //Success massage show
            $success['status'] = 200;
            $success['message'] = 'Student admission form created successfully.';
            //$success['data'] = $is_create_student;
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
