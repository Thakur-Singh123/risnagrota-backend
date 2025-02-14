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
         <h3 class="card-title">All Notifications List</h3>
      </div>
      <div class="button_Submission">
         <a href="{{ url('admin/add-new-notification') }}" class="nav-link {{ Request::is('admin/add-new-notification') ? 'active' : '' }}">Add New Notification</a>
      </div>
      <table class="table table-bordered table-striped" id="productsTable">
         <thead>
            <tr>
               <th>Sr. No</th>
               <th>Title</th>
               <th>Image</th>
               <th>Created Date</th>
               <th>Status</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            @php $count = 1; @endphp
            @foreach($all_notifications as $notification)
            <tr>
               <td>{{ $count ++ }}.</td>
               <td>{{ $notification->title }}</td>
               <td>
                  @if($notification->image)
                  <img src="{{ asset('public/uploads/notifications/'. $notification->image) }}" alt="notification_image" width="80" height="60">
                  @else
                  -
                  @endif
               </td>
               <td>{{ \Carbon\Carbon::parse($notification->created_at)->format('d M Y') }}</td>
               @if($notification->status == 'Active')
               <td class="lights-green-color"><span>Active</span></td>
               @elseif($notification->status == 'Pending')
               <td class="lights-red-color"><span>Pending</span></td>
               @elseif($notification->status == 'Suspend')
               <td class="lights-yellow-color"><span>Suspend</span></td>
               @elseif($notification->status == 'Approved')
               <td class="lights-pink-color"><span>Approved</span></td>
               @else
               <td></td>
               @endif
               <td class="project-actions text-left css-editdelete">
                  <a class="btn btn-info btn-sm" href="{{ url('admin/edit-notification', $notification->id) }}"><i class="fas fa-pencil-alt"></i>Edit</a> ||
                  <a class="btn btn-danger btn-sm delete_notification_record" data-notification_id="{{ $notification->id }}"><i class="fas fa-trash" aria-hidden="true"></i>Delete</a>
               </td>
            </tr>
         </tbody>
         @endforeach
      </table>
   </div>
</section>
</div>
@endsection