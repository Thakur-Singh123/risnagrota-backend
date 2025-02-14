@extends('admin.layouts.master')
@section('content')
<section class="content">
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
   <div class="card card-primary">
      <div class="card-header">
         <h3 class="card-title">Edit Profile</h3>
      </div>
      <form action="{{ route('admin.update.profile', $user_profile->id) }}" method="POST" enctype="multipart/form-data">
         @csrf 
         <div class="card-body">
            <div class="avatar-upload">
               <div class="avatar-edit">
                  <input type="file" name="admin_profile_pic" id="imageUpload" accept=".png, .jpg, .jpeg">
                  <label for="imageUpload"><i class="fas fa-pencil-alt"></i></label>
               </div>
               <div class="add-new-student-pic">
                  <div class="avatar-preview">
                     @if($user_profile->avatar)
                     <img id="imagePreview" src="{{ url('public/uploads/users/' .$user_profile->avatar) }}" alt="User Avatar">
                     @else
                     <img id="imagePreview" src="{{ url('public/uploads/users/default.png') }}" alt="Default Avatar">
                     @endif
                  </div>
               </div>
            </div><br>
            <div class="form-group">
               <label for="name">Name</label>
               <input type="text" name="name" value="{{ $user_profile->name }}" class="form-control" placeholder="Enter Name"required>
            </div>
            <div class="form-group">
               <label for="email">Email</label>
               <input type="email" name="email" value="{{ $user_profile->email }}" class="form-control email-disabled" id="email" placeholder="Enter Email" readonly>
            </div>
            <div class="form-group">
               <label for="address">Address</label>
               <input type="text" name="address" value="{{ $user_profile->address }}" class="form-control" placeholder="Enter Address">
            </div>
            <div class="form-group">
               <label for="mobile">Mobile</label>
               <input type="mobile" name="mobile" id="phone_no" value="{{ $user_profile->mobile }}" class="form-control" placeholder="Enter Phone Number">
            </div>
            <div class="form-group full-button-row">
               <button class="btn btn-success" type="submit">Update</button>
            </div>
         </div>
   </div>
   </form>
</section>
</div>
@endsection