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
         <h3 class="card-title">Edit Event Category</h3>
      </div>
      <form action ="{{ route('admin.category.update',$category_detail->id) }}" method = "post" enctype="multipart/form-data">
         <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
         <div class="card-body">
            <div class="form-group">
               <label for="title">Title</label>
               <input type="text" name="name" value="{{$category_detail->name}}" class="form-control"  placeholder="Title" required>
            </div>
            <div class="form-group">
               <label for="date">Date</label>
               <div class="input-group date" id="reservationdate" data-target-input="nearest">
                  <input type="text" name="date" class="form-control datetimepicker-input" data-target="#reservationdate" value="{{ $category_detail->date }}" >
                  <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                     <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
               </div>
            </div>
            <div class="form-group">
               <label for="status">Status</label>
               <select id="status" name="status" class="form-control" >
                  <option value="" disabled selected>Select Status</option>
                  <option value="Active" @if($category_detail->status == 'Active') selected @endif>Active</option>
                  <option value="Pending" @if($category_detail->status == 'Pending') selected @endif>Pending</option>
                  <option value="Suspend" @if($category_detail->status == 'Suspend') selected @endif>Suspend</option>
                  <option value="Approved" @if($category_detail->status == 'Approved') selected @endif>Approved</option>
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