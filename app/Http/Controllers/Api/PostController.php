<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    //Funtion for all posts
    public function all_posts() {
        //Get post
        $post_details = Post::Orderby('ID', 'DESC')->where('status', 'Active')->get();
        //Check if posts data get or not
        if ($post_details) {
            //Success massage show
            $success['status'] = 200;
            $success['message'] = 'Posts data get successfully.';
            $success['data'] = $post_details;
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
