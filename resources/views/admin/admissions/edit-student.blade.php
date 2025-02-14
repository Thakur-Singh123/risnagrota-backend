@extends('admin.layouts.master')
@section('content')
<section class="content">
   <!--start responses-->
   @if (Session::has('success'))
   <div class="notifaction-green">
      <p>{{ Session::get('success') }}</p>
   </div>
   @endif
   @if (Session::has('unsuccess'))
   <div class="notifaction-red">
      <p> {{ Session::get('unsuccess') }}</p>
   </div>
   @endif
   <!--end responses-->
   <div class="card card-primary">
      <div class="card-header">
         <h3 class="card-title">Edit Student</h3>
      </div>
      <form action ="{{route('admin.update.student', $student_detail->id)}}" method = "post" enctype="multipart/form-data">
         @csrf 
         <div class="card-body">
            <div class="form-group">
               <label for="name">Student Name</label>
               <input type="text" name="student_name" value="{{ $student_detail->student_name }}" class="form-control"  placeholder="Enter Student Name">
            </div>
            <div class="form-group">
               <label for="date">Date of Birth</label>
               <div class="input-group date" id="reservationdates" data-target-input="nearest">
                  <input type="text" name="dob" class="form-control datetimepicker-input" data-target="#reservationdates" value="{{ $student_detail->dob }}" placeholder="Enter Date Of Birth">
                  <div class="input-group-append" data-target="#reservationdates" data-toggle="datetimepicker">
                     <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
               </div>
            </div>
            <div class="form-group">
               <label for="class_admitted">Class Admitted</label>
               <input type="text" name="class_admitted" value="{{ $student_detail->class_admitted }}" class="form-control"  placeholder="Enter class Admitted" required>
            </div>
            <div class="form-group">
               <label for="father_name">Father Name</label>
               <input type="text" name="father_name" value="{{ $student_detail->father_name }}" class="form-control"  placeholder="Enter Father Name" required>
            </div>
            <div class="form-group">
               <label for="mother_name">Mother Name</label>
               <input type="text" name="mother_name" value="{{ $student_detail->mother_name }}" class="form-control"  placeholder="Enter Mother Name" required>
            </div>
            <div class="form-group">
               <label for="phone_no">Phone Number</label>
               <input type="text" name="phone_no" id="phone_no" value="{{ $student_detail->phone_no }}" class="form-control"  placeholder="Enter Phone Number" maxlength="10">
            </div>
            <div class="form-group">
               <label for="address">Address</label>
               <input type="text" name="address" value="{{ $student_detail->address }}" class="form-control"  placeholder="Enter Address">
            </div>
            <div class="form-group">
               <label for="date">Date</label>
               <div class="input-group date" id="reservationdate" data-target-input="nearest"> 
                  <input type="text" name="date" class="form-control datetimepicker-input" data-target="#reservationdate" value="{{ $student_detail->created_at }}">
                  <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                     <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
               </div>
            </div>
            <div class="form-group">
               <label for="status">Status</label>
               <select id="status" name="status" class="form-control" >
                  <option value="" disabled selected>Select Status</option>
                  <option value="Active" @if($student_detail->status == 'Active') selected @endif>Active</option>
                  <option value="Pending" @if($student_detail->status == 'Pending') selected @endif>Pending</option>
                  <option value="Suspend" @if($student_detail->status == 'Suspend') selected @endif>Suspend</option>
                  <option value="Approved" @if($student_detail->status == 'Approved') selected @endif>Approved</option>
               </select>
            </div>
            <div class="form-group full-button-row">
               <button class="btn btn-success" type="submit">Update</button>
            </div>
         </div>
      </form>
   </div>
</section>
</div>
@endsection