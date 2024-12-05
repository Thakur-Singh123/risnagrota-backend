<?php //echo "<br>"; print_r($data);?>
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
           
            <h3 class="card-title">View All Event Details:</h3>
           
            </div>
<table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>ID:</th>
        <th>Name:</th>
        <th>Category:</th>       
        <th>Start Date:</th>   
        <th>End Date:</th>   
        <th>Status:</th>   
        <th>Description:</th>      
        <th><center>Action:</center></th>
      </tr>
    </thead>
    <tbody>
    @foreach ($data as $row)
   
      <tr>
      <td>{{ $row['id'] }}</td>
      <td>{{ $row['name'] }}</td>
     
      <td>
         @foreach($row['get_event_cat_realtion'] as $value)
            {{ $value['category_lists'][0]['name'].',' }}
         @endforeach</td>
      <td>{{ $row['start_date'] }}</td>
      <td>{{ $row['end_date'] }}</td>
      <td>{{ $row['status'] }}</td>
      <td>{{ $row['description'] }}</td>     
      <td><a href="{{ url('edit-events/'.$row['id']) }}">Edit</a></td>
      <td><a href="{{ url('delete-events/'.$row['id']) }}">Delete</a></td>
      </tr>
    @endforeach
    
    </tbody>
  </table>
</div>
</body>
</html>
@endsection