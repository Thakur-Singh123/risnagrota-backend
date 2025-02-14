<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    //Function for add testimonial
    public function add_new_testimonial() {
        return view('admin.testimonials.add-new-testimonial');
    }

    //function for submit testimonial
    public function submit_testimonial(Request $request) {
        //Check if image is exit or not
        $filename = "";
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads/testimonials'), $filename);
        }
        //Create testimonial
        $is_create_testimonial = Testimonial::create([
            'name' => $request->name,
            'desc' => $request->desc,
            'status' => 'Active',
            'image' => $filename,
        ]);
        //Check if testimonial is created or not
        if ($is_create_testimonial) {
            return back()->with('success', 'Testimonial created successfully.');
        } else {
            return back()->with('unsuccess', 'Opps something went wrong!');
        }
    }

    //Function for all testimonials list
    public function all_testimonials() {
        //Get all testimonials
        $all_testimonials = Testimonial::Orderby('ID', 'DESC')->get();
        return view('admin.testimonials.all-testimonials', compact('all_testimonials'));
    }

    //Function for edit testimonial
    public function edit_testimonial($id) {
        //Get testimonial
        $testimonial = Testimonial::find($id);
        return view('admin.testimonials.edit-testimonial', compact('testimonial'));
    }

    //Function for update testimonial
    public function update_testimonial(Request $request, $id) {
        //Check if image is exit or not
        $filename = "";
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads/testimonials'), $filename);
            //Update with image
            $is_udate_testimonial = Testimonial::where('id', $id)->update([
                'name' => $request->name,
                'desc' => $request->desc,
                'status' => $request->status,
                'image' => $filename,
            ]);
            //Check if testimonial is updated or not
            if ($is_udate_testimonial) {
                return back()->with('success', 'Testimonial updated successfully.');
            } else {
                return back()->with('unsuccess', 'Opps something went wrong.');
            }
        } else {
            //Update without image
            $is_udate_testimonial = Testimonial::where('id', $id)->update([
                'name' => $request->name,
                'desc' => $request->desc,
                'status' => $request->status,
                'image' => $filename,
            ]);
            //Check if testimonial is updated or not
            if ($is_udate_testimonial) {
                return back()->with('success', 'Testimonial updated successfully.');
            } else {
                return back()->with('unsuccess', 'Opps something went wrong.');
            }
        }
    }

    //Function for delete testimonial
    public function delete_testimonial(Request $request) {
        //Get request testimonial id
        $testimonial_id = $request->testimonial_id;
        //Delete testimonial
        $is_delete_testimonial = Testimonial::where('id', $testimonial_id)->delete();
        //Check if testimonial is deleted or not
        if ($is_delete_testimonial) {
            return back()->with('success', 'Testimonial deleted successfullyl.');
        } else {
            return back()->with('unsuccess', 'Opps something went wrong!');
        }
    }
}
