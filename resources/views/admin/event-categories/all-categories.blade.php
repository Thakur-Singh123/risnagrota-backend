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
         <h3 class="card-title">All Event Categories list</h3>
      </div>
      
      <div class="button_Submission">
          <a href="{{ url('admin/add-new-category') }}" class="nav-link {{ Request::is('admin/add-new-category') ? 'active' : '' }}">Add New Category</a>
      </div>
      
      <table class="table table-bordered table-striped" id="productsTable">
         <thead>
            <tr>
               <th>Sr. No</th>
               <th>Title</th>
               <th>Submission Date</th>
               <th>Status</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            @php $count = 1; @endphp
            @foreach ($all_categories as $category)
            <tr>
               <td>{{ $count ++ }}.</td>
               <td>{{ $category->name }}</td>
               <td>{{ \Carbon\Carbon::parse($category->date)->format('d M Y') }}</td>
               @if($category->status == 'Active')
                  <td class="lights-green-color"><span>Active</span></td>
                  @elseif($category->status == 'Pending')
                  <td class="lights-red-color"><span>Pending</span></td>
                  @elseif($category->status == 'Suspend')
                  <td class="lights-yellow-color"><span>Suspend</span></td>
                  @elseif($category->status == 'Approved')
                  <td class="lights-pink-color"><span>Approved</span></td>
                  @else
                  <td></td>
                  @endif
               <td class="project-actions text-left css-editdelete">
                  <a class="btn btn-info btn-sm" href="{{ url('admin/edit-category', $category->id) }}"><i class="fas fa-pencil-alt"></i>Edit</a> ||
                  <a class="btn btn-danger btn-sm delete_category_record" data-category_id="{{ $category->id }}"><i class="fas fa-trash" aria-hidden="true"></i>Delete</a>
               </td>
            </tr>
            @endforeach
         </tbody>
      </table>
   </div>
</section>
</div>
@endsection