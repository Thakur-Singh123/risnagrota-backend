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
         <h3 class="card-title">Add New Post</h3>
      </div>
      <form action ="{{ route('admin.submit.post') }}" method = "post" enctype="multipart/form-data">
         @csrf 
         <div class="card-body">
            <input type="hidden" name="id" value="">
            <div class="form-group">
               <label for="name">Name</label>
               <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter Name" required>
            </div>
            <div class="form-group">
               <label for="desc">Description</label>
               <input type="text" name="desc" value="{{ old('desc') }}" class="form-control" placeholder="Enter Description">
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
</section>
</div>
@endsection