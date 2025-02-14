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
         <h3 class="card-title">Edit Notification</h3>
      </div>
      <form action ="{{ route('admin.notification.update', $notification->id) }}" method = "post" enctype="multipart/form-data">
         @csrf 
         <div class="card-body">
            <div class="form-group">
               <label for="title">Title</label>
               <input type="text" name="title" value="{{ $notification->title }}" class="form-control" placeholder="Enter Title">
            </div>
            <div class="form-group">
               <label for="exampleInputFile">File input</label>
               <div class="input-group">
                  <div class="custom-file">
                     <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                     <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>
                  <div class="input-group-append">
                     <span class="input-group-text">Upload</span>
                  </div>
               </div>
            </div>
            @if($notification->image)
                  <img src = "{{ asset('public/uploads/notifications/' .$notification->image) }}" width="100" height="80">
                  @else
                  -
                  @endif <br><br>
            <div class="form-group">
               <label for="status">Status</label>
               <select id="status" name="status" class="form-control" >
                  <option value="" disabled selected>Select Status</option>
                  <option value="Active" @if($notification->status == 'Active') selected @endif>Active</option>
                  <option value="Pending" @if($notification->status == 'Pending') selected @endif>Pending</option>
                  <option value="Suspend" @if($notification->status == 'Suspend') selected @endif>Suspend</option>
                  <option value="Approved" @if($notification->status == 'Approved') selected @endif>Approved</option>
               </select>
            </div>
            <div class="form-group full-button-row">
               <button class="btn btn-success" type="submit">Update</button>
            </div>
         </div>
      </form>
</section>
</div>
@endsection