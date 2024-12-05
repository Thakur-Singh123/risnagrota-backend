<?php //echo"<br>";print_r($data);?>
@include('admin.layouts.head')
@extends('admin.layouts.master')
@extends('admin.sidebar.sidebar')
@section('content')
<style>
  span.x-close-butt {
    position: relative;
    bottom: 32px;
    right: 18px;
}

span.x-close-butt i {
    color: #fff;
}
</style>
    <section class="content">
        <div class="card card-primary">
            <div class="card-header">
    
            <h3 class="card-title">Edit Event Details:</h3>
            </div>
           
            <form action ="{{ route('events.update',$data->id) }}" method = "post" enctype="multipart/form-data">
	         <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
            <div class="card-body">
                <div class="form-group">
                  <label for="name">Name:</label>
                  <input type="text" name="name" value="{{$data->name}}" class="form-control"  placeholder="name" required>
                </div>
                <div class="form-group">
                  <label for="name">Start Date:</label>
                  <input type="date" id="date" name="start_date" value="{{$data->start_date}}" class="form-control"  placeholder="start_date" required>
                </div>
                <div class="form-group">
                  <label for="name">End Date:</label>
                  <input type="date" id="date" name="end_date" value="{{$data->end_date}}" class="form-control"  placeholder="end_date" required>
                </div>
                <div class="form-group">
                  <label for="name">Category:</label>
                  <select name="category[]" class="form-control" multiple="" required>
                  @foreach($categories as $category)
                  <option value="{{ $category['id'] }}" <?php foreach($data->event_category_relations as $event_catgory_id){ if($event_catgory_id['cat_id'] == $category['id']){ echo 'selected'; } } ?>>{{ $category['name'] }}</option>
                  @endforeach
                  </select>
                </div>                 
                <div class="form-group">
                <label for="status">Status:</label>
                <select id="status" name="status" class="form-control" >
                <option value="active" <?php if( $data->status == 'active') echo "selected";?>>Active</option>
                <option value="pending" <?php if( $data->status == 'pending') echo "selected";?>>Pending</option>
                </select>
                </div>  
                <div class="form-group">
                  <label for="description">Description:</label>
                  <textarea id="message" name="description" rows="4" cols="50" class="form-control">{{ $data['description'] }}</textarea><br>
              </div>   
                <input type="file" name="choosefile[]"  multiple>
                @foreach($images as $image)
                <img src="{{ asset('public/event/' .$image['event_images']) }}" width="100px" height="90px">
                <td><a href="{{ url('delete-images/'.$image['id']) }}"><span class="x-close-butt"><i class="fa fa-times" aria-hidden="true"></i></span></a></td>
                @endforeach
                <div class="form-check">
                  <input type="submit" class="form-check-input" name="submit" value="update">
                  <label class="form-check-label" for="examplesubmit"></label>
                </div>
              </div>
            </form>
          </div>
          @if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif
          </section> 
          @endsection