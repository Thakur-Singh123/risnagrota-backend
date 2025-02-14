<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    //Function for get testimonials
    public function get_testimonials() {
        $get_testimonials = Testimonial::Orderby('ID', 'DESC')->get();
        //Check if notification is get or not
        if ($get_testimonials){
            //Success massage show
            $success['status'] = 200;
            $success['message'] = 'Testimonial details get successfully.';
            $success['data'] = $get_testimonials;
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
