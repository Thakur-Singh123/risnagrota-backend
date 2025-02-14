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
         <h3 class="card-title">Add New Event Category</h3>
      </div>
      <form action ="{{route('admin.category.submit')}}" method = "post" enctype="multipart/form-data">
         @csrf 
         <div class="card-body">
            <div class="form-group">
               <label for="name">Title</label>
               <input type="text" name="name" value="" class="form-control"  placeholder="Enter Title" required>
            </div>
            <div class="form-group">
               <label for="date">Date</label>
               <div class="input-group date" id="reservationdate" data-target-input="nearest">
                  <input type="text" name="date" class="form-control datetimepicker-input" data-target="#reservationdate" value="{{ \Carbon\Carbon::now()->toDateString() }}" >
                  <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                     <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
               </div>
            </div>
            <div class="form-group">
               <label for="status">Status</label>
               <select id="status" name="status" class="form-control" >
                  <option value="" disabled selected>Select Status</option>
                  <option value="Active">Active</option>
                  <option value="Pending">Pending</option>
                  <option value="Suspend">Suspend</option>
                  <option value="Approved">Approved</option>
               </select>
            </div>
            <div class="form-group full-button-row">
               <button class="btn btn-success" type="submit">Submit</button>
            </div>
         </div>
      </form>
   </div>
</section>
</div>
@endsection