@include('admin.layouts.head')
<body class="hold-transition sidebar-mini layout-fixed">
   <div class="wrapper">
   <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="{{ asset('public/admin/dist/img/AdminLTELogoNew.png') }}" alt="AdminLTELogo" height="60" width="60">
   </div>
   <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!--<ul class="navbar-nav">-->
      <!--   <li class="nav-item">-->
      <!--      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>-->
      <!--   </li>-->
      <!--</ul>-->
      <ul class="navbar-nav ml-auto">
         <li class="nav-item dropdown">
            <a class="nav-link d-flex align-items-center" data-toggle="dropdown" href="#" style="text-decoration: none;">
            <img src="{{ url('public/uploads/users/'.auth()->user()->avatar) }}" alt="{{ auth()->user()->avatar }}" class="img-circle elevation-2" alt="user_image" style="width:30px; height:30px; margin-right:10px;">
            <span style="font-weight: initial; color: #2e13e8;">{{ auth()->user()->name }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
               <div class="dropdown-divider"></div>
               <a href="{{ url('admin/edit-profile') }}" class="dropdown-item">
               <i class="fas fa-user mr-2"></i> View Profile
               </a>
               <div class="dropdown-divider"></div>
               <a href="{{ url('admin/change-password') }}" class="dropdown-item">
               <i class="fas fa-key mr-2"></i> Changed Password
               </a>
               <div class="dropdown-divider"></div>
               <a href="{{ route('logout') }}" class="nav-link"  onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
               <i class="fas fa-sign-out-alt mr-2"></i> Logout
               </a>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
               @csrf
            </form>
            </div>
         </li>
      </ul>
   </nav>
   @include('admin.sidebar.sidebar')
   <div class="content-wrapper">
      <div class="content-header">
         <div class="container-fluid">
         </div>
      </div>
      @yield('content')
      <footer class="main-footer">
         <strong>© 2011-2025 Pixxelu.com All rights reserved.</strong>
      </footer>
   </div>
   <script>
      var base_url = '{{ url("/") }}'; 
   </script>
   <!--summernote text editor-->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.js"></script>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="{{ asset('public/js/custom-ajax.js') }}"></script>
   <!--summernote-->
   <script src="{{ asset('public/admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
   <script src="{{ asset('public/js/custom-script.js') }}"></script>
   <script src="{{ asset('public/admin/plugins/jquery/jquery.min.js') }}"></script>
   <script src="{{ asset('public/admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
   <script>
      $.widget.bridge('uibutton', $.ui.button)
   </script>
   <script src="{{ asset('public/admin/plugins/jquery/jquery.min.js') }}"></script>
   <script src="{{ asset('public/admin/plugins/select2/js/select2.full.min.js') }}"></script>
   <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
   <script src="{{ asset('public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
   <script src="{{ asset('public/admin/plugins/chart.js/Chart.min.js') }}"></script>
   <script src="{{ asset('public/admin/plugins/sparklines/sparkline.js') }}"></script>
   <script src="{{ asset('public/admin/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
   <script src="{{ asset('public/admin/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
   <script src="{{ asset('public/admin/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
   <script src="{{ asset('public/admin/plugins/moment/moment.min.js') }}"></script>
   <script src="{{ asset('public/admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
   <script src="{{ asset('public/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
   <script src="{{ asset('public/admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
   <script src="{{ asset('public/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
   <script src="{{ asset('public/admin/dist/js/adminlte.js') }}"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
   <script>
      //Date picker  reservationdates
       $('#reservationdate').datetimepicker({
           format: 'Y-M-D'
       });
       $('#reservationdates').datetimepicker({
           format: 'Y-M-D'
       });
       $('#reservationdate').datetimepicker({
           format: 'Y-M-D'
       });
       $('#reservationdates').datetimepicker({
           format: 'Y-M-D'
       });
   </script>
   <script>
      $(document).ready(function() {
         $('#productsTable').DataTable();
      });
      
      $(function () {
       //Initialize Select2 Elements
       $('.select2').select2()
      
      });
   </script>
      <script>
      $(function () {
         $('#summernote').summernote({
            placeholder: 'Type your content here...',
            height: 80 
         });      
         //CodeMirror
         CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "htmlmixed",
            theme: "monokai"
         });
      });     
   </script>
</body>
</html>