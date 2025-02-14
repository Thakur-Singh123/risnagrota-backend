@extends('admin.layouts.master')
@section('content')
<style>
.btn-danger {
   color: #fff;
   background-color: #df0f0f;
   border-color: #dc3545;
   box-shadow: none;
}
</style>
<section class="content">
   <!-- Start responses -->
   @if (Session::has('success'))
   <div class="notifaction-green">
      <p>{{ Session::get('success') }}</p>
   </div>
   @endif
   @if (Session::has('unsuccess'))
   <div class="notifaction-red">
      <p>{{ Session::get('unsuccess') }}</p>
   </div>
   @endif
   <!-- End responses -->
   <div class="card card-primary">
      <div class="card-header">
         <h3 class="card-title">Edit Event</h3>
      </div>
      <form action ="{{ route('admin.event.update',$data->id) }}" method = "post" enctype="multipart/form-data">
         <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
         <div class="card-body">
            <div class="form-group">
               <label for="title">Title</label>
               <input type="text" name="name" value="{{$data->name}}" class="form-control"  placeholder="Title" required>
            </div>
            <div class="form-group">
               <label for="name">Category</label>
                <select name="category[]" id="category_id" class="form-control select2" multiple="multiple" data-placeholder="Select Categories">
                  @foreach($categories as $category)
                  <option value="{{ $category['id'] }}" <?php foreach($data->event_category_relations as $event_catgory_id){ if($event_catgory_id['cat_id'] == $category['id']){ echo 'selected'; } } ?>>{{ $category['name'] }}</option>
                  @endforeach
               </select>
            </div>
            <div class="form-group">
               <label for="start_date">Start Date</label>
               <div class="input-group date" id="reservationdate" data-target-input="nearest">
                  <input type="text" name="start_date" class="form-control datetimepicker-input" data-target="#reservationdate" value="{{$data->start_date}}">
                  <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                     <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
               </div>
            </div>
            <div class="form-group">
               <label for="end_date">End Date</label>
               <div class="input-group date" id="reservationdates" data-target-input="nearest">
                  <input type="text" name="end_date" class="form-control datetimepicker-input" data-target="#reservationdates" value="{{$data->end_date}}">
                  <div class="input-group-append" data-target="#reservationdates" data-toggle="datetimepicker">
                     <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
               </div>
            </div>
            <div class="form-group">
               <label for="exampleInputFile">Choose File</label>
               <div class="input-group">
                  <div class="custom-file">
                     <input type="file" name="choosefile[]" multiple="" class="custom-file-input" id="exampleInputFile">
                     <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>
                  <div class="input-group-append">
                     <span class="input-group-text">Upload</span>
                  </div>
               </div>
            </div>
            <br>
            <div style="display: flex; flex-wrap: wrap; gap: 10px;">
               @foreach($images as $image)
                  <div style="position: relative; width: 100px; height: 90px;">
                        <img src="{{ asset('public/event/' .$image['event_images']) }}" style="width: 100%; height: 100%; object-fit: cover;">
                        <a class="btn btn-danger btn-sm delete_event_image" data-image_id="{{ $image['id'] }}" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 10; padding: 5px; border-radius: 50%; display: flex; justify-content: center; align-items: center;">
                           <i class="fa fa-times" aria-hidden="true"></i>
                        </a>
                  </div>
               @endforeach
            </div>
            <div class="form-group">
               <label for="description">Description</label>
                <textarea id="summernote" name="description">{!! $data['description'] !!}</textarea>
            </div>
            <div class="form-group">
               <label for="status">Status</label>
               <select id="status" name="status" class="form-control" >
                  <option value="" disabled selected>Select Status</option>
                  <option value="Active" <?php if( $data->status == 'Active') echo "selected";?>>Active</option>
                  <option value="Pending" <?php if( $data->status == 'Pending') echo "selected";?>>Pending</option>
                  <option value="Suspend" <?php if( $data->status == 'Suspend') echo "selected";?>>Suspend</option>
                  <option value="Approved" <?php if( $data->status == 'Approved') echo "selected";?>>Approved</option>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<script>
//Student Admission delete
$(document).ready(function() {
    //Delete student record
    $('body').on('click', '.delete_event_image', function(event) {
        event.preventDefault();
        //Get data attribute
        var image_id = $(this).data('image_id');    
        //Delete through sweet alert
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this event image!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                //Call ajax
                $.ajax({
                    type: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: base_url+'/admin/delete-image',  
                    data: { image_id: image_id },
                    //Show success message
                    success: function(response) {
                        Swal.fire({
                            title: "Deleted!",
                            text: "Event image deleted successfully.",
                            icon: "success"
                        }).then(() => {
                            location.reload();
                        });
                    },
                });
            }
        });
    });
});
</script>
@endsection