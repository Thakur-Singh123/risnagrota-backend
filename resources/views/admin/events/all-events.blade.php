@extends('admin.layouts.master')
@section('content')
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
         <h3 class="card-title">All Events List</h3>
      </div>
      
      <div class="button_Submission">
          <a href="{{ url('admin/add-new-event') }}" class="nav-link {{ Request::is('admin/add-new-event') ? 'active' : '' }}">Add New Event</a>
      </div>
      
      <div class="table-responsive">
         <table class="table table-head-fixed text-nowrap" id="productsTable">
            <thead>
               <tr>
                  <th>Sr. No.</th>
                  <th>Title</th>
                  <th>Categories</th>
                  <th>Description</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Status</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               @php $count = 1; @endphp
               @foreach ($data as $row)
               <tr>
                  <td>{{ $count++ }}.</td>
                  <td>{{ $row['name'] }}</td>
                  <td>
                     @foreach($row['get_event_cat_realtion'] as $value)
                     {{ $value['category_lists'][0]['name'] }},
                     @endforeach
                   <td>
                        @if($row['description'])
                          {!! $row['description'] !!}
                        @else
                          -
                    @endif
                    </td>

                  <td>{{ \Carbon\Carbon::parse($row['start_date'])->format('d M Y') }}</td>
                  <td>{{ \Carbon\Carbon::parse($row['end_date'])->format('d M Y') }}</td>
                  @if($row['status'] == 'Active')
                  <td class="lights-green-color"><span>Active</span></td>
                  @elseif($row['status'] == 'Pending')
                  <td class="lights-red-color"><span>Pending</span></td>
                  @elseif($row['status'] == 'Suspend')
                  <td class="lights-yellow-color"><span>Suspend</span></td>
                  @elseif($row['status'] == 'Approved')
                  <td class="lights-pink-color"><span>Approved</span></td>
                  @else
                  <td></td>
                  @endif
                  <td class="project-actions text-left css-editdelete">
                     <a class="btn btn-info btn-sm" href="{{ url('admin/edit-event', $row['id']) }}"><i class="fas fa-pencil-alt"></i>Edit</a> ||
                     <a class="btn btn-danger btn-sm delete_event_record" data-event_id="{{ $row['id'] }}"><i class="fas fa-trash" aria-hidden="true"></i>Delete</a>
                  </td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
</section>
</div>
@endsection