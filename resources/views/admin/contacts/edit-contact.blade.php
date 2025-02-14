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
         <h3 class="card-title">Edit Contact</h3>
      </div>
      <form action ="{{route('admin.contact.update', $contact_detail->id)}}" method = "post" enctype="multipart/form-data">
         @csrf 
         <div class="card-body">
            <div class="form-group">
               <label for="name">Name</label>
               <input type="text" name="name" value="{{ $contact_detail->name }}" class="form-control"  placeholder="Enter Name">
            </div>
            <div class="form-group">
               <label for="email">Email</label>
               <input type="email" name="email" value="{{ $contact_detail->email }}" class="form-control" disabled="email" placeholder="Enter Email">
            </div>
            <div class="form-group">
               <label for="phone_no">Phone Number</label>
               <input type="text" name="phone_no" id="phone_no" value="{{ $contact_detail->phone_no }}" class="form-control"  placeholder="Enter Phone Number">
            </div>
            <div class="form-group">
               <label for="message">Message</label>
               <input type="text" name="message" id="message" value="{{ $contact_detail->message }}" class="form-control"  placeholder="Enter Message">
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