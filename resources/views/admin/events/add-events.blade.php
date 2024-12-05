@include('admin.layouts.head')
@extends('admin.layouts.master')
@extends('admin.sidebar.sidebar')
@section('content')

    <section class="content">
    @if (session('status'))
    <h6 class="alert alert-success">{{ session('status') }}</h6>
    @endif
        <div class="card card-primary">
            <div class="card-header">
            <h3 class="card-title">Add New Event Details:</h3>
            </div>
            <form action ="{{route('events.submit')}}" method = "post" enctype="multipart/form-data">
            @csrf 
            <div class="card-body">       
                <div class="form-group">
                  <label for="name">Name:</label>
                  <input type="text" name="name" value="" class="form-control" required>
                </div>                 
                <div class="form-group">

                  <label for="start_date">Start Date:</label>
                  <input type="date" id="date" name="start_date" value="" class="form-control" required>
                </div>                       
                <div class="form-group">
                  <label for="end_date">End Date:</label>
                  <input type="date" id="date" name="end_date" value="" class="form-control" required>
                </div>  
                <div class="form-group">
                  <label for="category">Category:</label>
                  <select name="category[]" class="form-control" multiple="">
                  @foreach($data as $category)
                  <option value="{{ $category->id }}">
                  {{ $category->name }}
                  </option>
                  @endforeach
                  </select>
                </div>                                
                <div class="form-group">
                <label for="status">Status:</label>
                <select id="status" name="status" class="form-control" >
                <option value="active">Active</option>
                <option value="pending">Pending</option>
                  </select>
                </div>  
                <div class="form-group">
                  <label for="description">Description:</label>
                  <textarea id="message" name="description" rows="4" cols="50" class="form-control"></textarea><br>
                 </div>
                  <input type="file" name="choosefile[]" multiple=""><br><br>        
                <div class="form-check">
                  <input type="submit" class="form-check-input" name="submit" value="save">
                  <label class="form-check-label" for="examplesubmit"></label>
                </div>
              </div>
			  </div>
            </form>
          </section> 
          @endsection