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
           
            <h3 class="card-title">View All Categories Details:</h3>
           
            </div>
<table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>ID:</th>
        <th>Name:</th>       
        <th><center>Action:</center></th>
      </tr>
    </thead>
    <tbody>
    @foreach ($data as $row)
      <tr>
      <td>{{ $row->id }}</td>
      <td>{{ $row->name }}</td>
      <td><a href="{{ url('edit-categories/'.$row['id']) }}">Edit</a></td>
      <td><a href="{{ url('delete-categories/'.$row['id']) }}">Delete</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</body>
</html>
@endsection