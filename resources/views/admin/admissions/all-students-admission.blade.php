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
         <h3 class="card-title">All Students Admission list</h3>
      </div>
      <table class="table table-bordered table-striped" id="productsTable">
         <thead>
            <tr>
               <th>Sr. No</th>
               <th>Student Name</th>
               <th>Date Of Birth</th>
               <th>Class Admitted</th>
               <th>Admission Date</th>
               <th>Father Name</th>
               <th>Mother Name</th>
               <th>Phone Number</th>
               <th>Address</th>
               <th>Status</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            @php $count = 1; @endphp
            @foreach ($all_students as $student)
            <tr>
               <td>{{ $count ++ }}.</td>
               <td>{{ $student->student_name }}</td>
               <td>{{ \Carbon\Carbon::parse($student->dob)->format('d M Y') }}</td>
               <td>{{ $student->class_admitted }}</td>
               <td>{{ \Carbon\Carbon::parse($student->created_at)->format('d M Y') }}</td>
               <td>{{ $student->father_name }}</td>
               <td>{{ $student->mother_name }}</td>
               <td>
                    @if($student->phone_no)
                    <a href="https://wa.me/{{ str_replace(['+', '-', ' '], '', $student->phone_no) }}"
                    target="_blank">
                    {{ substr($student->phone_no, 0, 5) }}-{{ substr($student->phone_no, 5) }}
                    </a>
                    @else
                    -
                    @endif
                </td>
               <td>{{ $student->address }}</td>
               @if($student->status == 'Active')
                  <td class="lights-green-color"><span>Active</span></td>
                  @elseif($student->status == 'Pending')
                  <td class="lights-red-color"><span>Pending</span></td>
                  @elseif($student->status == 'Suspend')
                  <td class="lights-yellow-color"><span>Suspend</span></td>
                  @elseif($student->status == 'Approved')
                  <td class="lights-pink-color"><span>Approved</span></td>
                  @else
                  <td></td>
                  @endif
               <td class="project-actions text-left css-editdelete">
                  <a class="btn btn-info btn-sm" href="{{ url('admin/edit-student', $student->id) }}"><i class="fas fa-pencil-alt"></i>Edit</a> ||
                  <a class="btn btn-danger btn-sm delete_student_record" data-student_id="{{ $student->id }}"><i class="fas fa-trash" aria-hidden="true"></i>Delete</a>
               </td>
            </tr>
            @endforeach
         </tbody>
      </table>
   </div>
</section>
</div>
@endsection