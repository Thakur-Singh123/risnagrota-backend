@extends('admin.layouts.master')
@section('content')
<style>
    .nav-link.active {
   background-color: #007bff; /* Blue background */
   color: #fff;             /* White text */
   border-radius: 5px;      /* Rounded corners */
}

    </style>
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
         <h3 class="card-title">All Testimonials List</h3>
      </div>
      <div class="button_Submission" >
         <a href="{{ url('admin/add-new-testimonial') }}" class="nav-link {{ Request::is('admin/add-new-testimonial') ? 'active' : '' }}">Add New Testimonial</a>
      </div>
      <table class="table table-bordered table-striped" id="productsTable">
         <thead>
            <tr>
               <th>Sr. No</th>
               <th>Name</th>
               <th>Desciption</th>
               <th>Image</th>
               <th>Created Date</th>
               <th>Status</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            @php $count = 1; @endphp
            @foreach($all_testimonials as $testimonial)
            <tr>
               <td>{{ $count ++ }}.</td>
               <td>{{ $testimonial->name }}</td>
               <td>{{ $testimonial->desc }}</td>
               <td>
                  @if($testimonial->image)
                  <img src="{{ asset('public/uploads/testimonials/'. $testimonial->image) }}" alt="testimonial_image" width="80" height="60">
                  @else
                  -
                  @endif
               </td>
               <td>{{ \Carbon\Carbon::parse($testimonial->created_at)->format('d M Y') }}</td>
               @if($testimonial->status == 'Active')
               <td class="lights-green-color"><span>Active</span></td>
               @elseif($testimonial->status == 'Pending')
               <td class="lights-red-color"><span>Pending</span></td>
               @elseif($testimonial->status == 'Suspend')
               <td class="lights-yellow-color"><span>Suspend</span></td>
               @elseif($testimonial->status == 'Approved')
               <td class="lights-pink-color"><span>Approved</span></td>
               @else
               <td></td>
               @endif
               <td class="project-actions text-left css-editdelete">
                  <a class="btn btn-info btn-sm" href="{{ url('admin/edit-testimonial', $testimonial->id) }}"><i class="fas fa-pencil-alt"></i>Edit</a> ||
                  <a class="btn btn-danger btn-sm delete_testimonial_record" data-testimonial_id="{{ $testimonial->id }}"><i class="fas fa-trash" aria-hidden="true"></i>Delete</a>
               </td>
            </tr>
         </tbody>
         @endforeach
      </table>
   </div>
</section>
</div>
@endsection