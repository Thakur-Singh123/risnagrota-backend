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
            <h3 class="card-title">All Posts list</h3>
        </div>
        <div class="button_Submission" >
            <a href="{{ url('admin/add-new-post') }}" class="nav-link {{ Request::is('admin/add-new-post') ? 'active' : '' }}">Add New Post</a>
        </div>
        <table class="table table-bordered table-striped" id="productsTable">
            <thead>
                <tr>
                <th>Sr. No</th>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Created Date</th>
                <th>Status</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $count = 1; @endphp
                @foreach ($all_posts as $post)
                <tr>
                <td>{{ $count ++ }}.</td>
                <td>{{ $post->name }}</td>
                <td>{{ $post->desc }}</td>
                <td>
                    @if($post->image)
                    <img src="{{ asset('public/uploads/posts/'. $post->image) }}" alt="post_image" width="80" height="60">
                    @else
                    -
                    @endif
                </td>
                <td>{{ \Carbon\Carbon::parse($post->created_at)->format('d M Y') }}</td>
                @if($post->status == 'Active')
                    <td class="lights-green-color"><span>Active</span></td>
                    @elseif($post->status == 'Pending')
                    <td class="lights-red-color"><span>Pending</span></td>
                    @elseif($post->status == 'Suspend')
                    <td class="lights-yellow-color"><span>Suspend</span></td>
                    @elseif($post->status == 'Approved')
                    <td class="lights-pink-color"><span>Approved</span></td>
                    @else
                    <td></td>
                    @endif
                <td class="project-actions text-left css-editdelete">
                    <a class="btn btn-info btn-sm" href="{{ url('admin/edit-post', $post->id) }}"><i class="fas fa-pencil-alt"></i>Edit</a> ||
                    <a class="btn btn-danger btn-sm delete_post_record" data-post_id="{{ $post->id }}"><i class="fas fa-trash" aria-hidden="true"></i>Delete</a>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
</div>
@endsection