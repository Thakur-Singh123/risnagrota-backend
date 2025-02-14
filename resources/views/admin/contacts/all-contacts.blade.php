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
         <h3 class="card-title">All inquiries List</h3>
      </div>
      <table class="table table-bordered table-striped" id="productsTable">
         <thead>
            <tr>
               <th>Sr. No</th>
               <th>Name</th>
               <th>Email</th>
               <th>Mobile</th>
               <th>Inquiry Date</th>
               <th>Message</th>
               <th>Status</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            @php $count = 1; @endphp
            @foreach ($all_contacts as $contact)
            <tr>
               <td>{{ $count ++ }}.</td>
               <td>{{ $contact->name }}</td>
               <td>{{ $contact->email }}</td>
               <td>
                    @if($contact->phone_no)
                    <a href="https://wa.me/{{ str_replace(['+', '-', ' '], '', $contact->phone_no) }}"
                    target="_blank">
                    {{ substr($contact->phone_no, 0, 5) }}-{{ substr($contact->phone_no, 5) }}
                    </a>
                    @else
                    -
                    @endif
                </td>
                <td>{{ \Carbon\Carbon::parse($contact->created_at)->format('d M Y') }}</td>
                <td>{{ $contact->message }}</td>
                @if($contact->status == 'Active')
                  <td class="lights-green-color"><span>Active</span></td>
                  @elseif($contact->status == 'Pending')
                  <td class="lights-red-color"><span>Pending</span></td>
                  @elseif($contact->status == 'Suspend')
                  <td class="lights-yellow-color"><span>Suspend</span></td>
                  @elseif($contact->status == 'Approved')
                  <td class="lights-pink-color"><span>Approved</span></td>
                  @else
                  <td></td>
                  @endif
               <td class="project-actions text-left css-editdelete">
                  <!-- <a class="btn btn-info btn-sm" href="{{ url('admin/edit-contact', $contact->id) }}"><i class="fas fa-pencil-alt"></i>Edit</a> -->
                  <a class="btn btn-danger btn-sm delete_contact_record" data-contact_id="{{ $contact->id }}"><i class="fas fa-trash" aria-hidden="true"></i>Delete</a>
               </td>
            </tr>
            @endforeach
         </tbody>
      </table>
   </div>
</section>
</div>
@endsection