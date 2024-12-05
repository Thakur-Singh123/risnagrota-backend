<?php //echo"<br>";print_r($data);?>
@include('admin.layouts.head')
@extends('admin.layouts.master')
@extends('admin.sidebar.sidebar')
@section('content')

    <section class="content">
        <div class="card card-primary">
            <div class="card-header">
    
            <h3 class="card-title">Edit Event Categories:</h3>
            </div>
           
            <form action ="{{ route('categories.update',$data->id) }}" method = "post" enctype="multipart/form-data">
	         <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
            <div class="card-body">
                <div class="form-group">
                  <label for="name">Name:</label>
                  <input type="text" name="name" value="{{$data->name}}" class="form-control"  placeholder="name" required>
                </div>
                <div class="form-check">
                  <input type="submit" class="form-check-input" name="submit" value="update">
                  <label class="form-check-label" for="examplesubmit"></label>
                </div>
              </div>
            </form>
          </div>
          </section> 
          @endsection