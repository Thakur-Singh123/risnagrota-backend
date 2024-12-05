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
            <h3 class="card-title">Add New Event Categories Details:</h3>
            </div>
            <form action ="{{route('categories.submit')}}" method = "post" enctype="multipart/form-data">
            @csrf 
            <div class="card-body">
                <div class="form-group">
                  <label for="name">Name:</label>
                  <input type="text" name="name" value="" class="form-control"  placeholder="name" required>
                </div>             
                <div class="form-check">
                  <input type="submit" class="form-check-input" name="submit" value="save">
                  <label class="form-check-label" for="examplesubmit"></label>
                </div>
              </div>
            </form>
          </div>
          </section> 
          @endsection