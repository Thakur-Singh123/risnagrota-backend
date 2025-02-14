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
         <h3 class="card-title">Edit Post</h3>
      </div>
      <form action ="{{ route('admin.update.post', $post_detail->id) }}" method = "post" enctype="multipart/form-data">
         @csrf 
         <div class="card-body">
            <input type="hidden" name="id" value="">
            <div class="form-group">
               <label for="name">Name</label>
               <input type="text" name="name" value="{{ $post_detail->name }}" class="form-control" placeholder="Enter Name" required>
            </div>
            <div class="form-group">
               <label for="desc">Description</label>
               <input type="text" name="desc" value="{{ $post_detail->desc }}" class="form-control" placeholder="Enter Description">
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
            @if ($post_detail->image)
                <img src = "{{ asset('public/uploads/posts/' .$post_detail->image) }}" width="80" height="60">
            @endif <br><br>
            <div class="form-group">
               <label for="status">Status</label>
               <select id="status" name="status" class="form-control" >
                  <option value="" disabled selected>Select Status</option>
                  <option value="Active" @if($post_detail->status =='Active') selected @endif>Active</option>
                  <option value="Pending" @if($post_detail->status =='Pending') selected @endif>Pending</option>
                  <option value="Suspend" @if($post_detail->status == 'Suspend') selected @endif>Suspend</option>
                  <option value="Approved" @if($post_detail->status == 'Approved') selected @endif>Approved</option>
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