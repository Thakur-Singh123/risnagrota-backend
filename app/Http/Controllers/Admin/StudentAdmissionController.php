<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentAdmissionController extends Controller
{
    //Function for all admission students list
    public function all_students(){
        //Get students detail
        $all_students = Student::orderby('ID', 'DESC')->get();
        return view('admin.admissions.all-students-admission', compact('all_students'));
    }

    //Function for edit student
    public function edit_student($id) {
        //Get student detail
        $student_detail = Student::find($id);
        return view('admin.admissions.edit-student', compact('student_detail'));
    }

    //Function for update student
    public function update_student(Request $request, $id) {
        //Update student
        $is_student_update = Student::where('id', $id)->update([
            'student_name' => $request->student_name,
            'dob' => $request->dob,
            'class_admitted' => $request->class_admitted,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'phone_no' => $request->phone_no,
            'address' => $request->address,
            'created_at' =>$request->date,
            'status' => $request->status,
        ]);
        //Check if student is updated or not
        if ($is_student_update) {
            return back()->with('success', 'Student updated successfully.');
        } else {
            return back()->with('unsuccess', 'Opps somethiing went wrong.');
        }
    }

    //Function for delete student
    public function delete_student(Request $request){
        //Get request ajax id
        $student_id = $request->student_id;
        //Delete student
        $is_delete_student = Student::where('id', $student_id)->delete();
        //Check if student is deleted or not
        if ($is_delete_student) {
            return back()->with('success','Student deleted successfully.');
        } else {
            return back()->with('success','Opps something went wrong.');
        }
    }
}
