<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Twilio\Rest\Client;

class PostController extends Controller
{
    //Function for all posts list
    public function all_posts() {
        //Get posts
        $all_posts = Post::Orderby('ID', 'DESC')->get();
        return view('admin.posts.all-posts', compact('all_posts'));
    }

    //Function for add new post
    public function add_new_post() {
        return view('admin.posts.add-new-post');
    }

    //Function for submit post
    public function submit_post(Request $request) {
        $filename = "";
    
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Ensure valid image file
        ]);
    
        // Handle file upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads/posts'), $filename);
        }
    
        // Create post in database
        $is_create_post = Post::create([
            'name' => $request->name,
            'desc' => $request->desc,
            'status' => 'Active',
            'image' => $filename,
        ]);
    
        if ($is_create_post) {
            // Send WhatsApp message
            try {
                $sid = env('TWILIO_SID'); 
                $token = env('TWILIO_AUTH_TOKEN'); 
                $twilio_number = env('TWILIO_WHATSAPP_NUMBER'); 
    
                // Validate Twilio credentials
                if (!$sid || !$token || !$twilio_number) {
                    throw new \Exception('Twilio credentials are not set in .env');
                }
    
                $client = new \Twilio\Rest\Client($sid, $token);
                $client->messages->create(
                    'whatsapp:+8219373976', 
                    [
                        'from' => 'whatsapp:' . $twilio_number,
                        'body' => "New Post Created:\n\nName: {$request->name}\nDescription: {$request->desc}\nStatus: Active\nImage: " . ($filename ? url('uploads/posts/' . $filename) : 'No Image'),
                    ]
                );
            } catch (\Exception $e) {
                \Log::error('WhatsApp Message Failed: ' . $e->getMessage());
            }
    
            return back()->with('success', 'Post created successfully and WhatsApp notification sent.');
        } else {
            return back()->with('unsuccess', 'Oops! Something went wrong!');
        }
    }
    
    //Function for edit post
    public function edit_post($id) {
        //Get post detail
        $post_detail = Post::find($id);
        return view('admin.posts.edit-post', compact('post_detail'));
    }

    //Function for update post
    public function update_post(Request $request, $id) {
        //Check if image is exit or not
        $filename = "";
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads/posts'), $filename);
            //Update post with image
            $is_update_post = Post::where('id', $id)->update([
                'name' => $request->name,
                'desc' => $request->desc,
                'status' => $request->status,
                'image' => $filename,
            ]);
            //Check if post updated or not
            if ($is_update_post) {
                return back()->with('success', 'Post updated successfully.');
            } else {
                return back()->with('unsuccess', 'Opps something went wrong!');
            }
        } else {
            //Update post without image
            $is_update_post = Post::where('id', $id)->update([
                'name' => $request->name,
                'desc' => $request->desc,
                'status' => $request->status,
            ]);
            //Check if post updated or not
            if ($is_update_post) {
                return back()->with('success', 'Post updated successfully.');
            } else {
                return back()->with('unsuccess', 'Opps something went wrong!');
            }
        }
    }

    //Function for delete post
    public function delete_post(Request $request) {
        //Get ajax request
        $post_id = $request->post_id;
        //Delete post
        $is_delete_post = Post::where('id', $post_id)->delete();
        //Check if post deleted or not
        if ($is_delete_post) {
            return back()->with('success', 'Post deleted successfully.');
        } else {
            return back()->with('unsuccess', 'Opps something went wrong!');
        }
    }
}
