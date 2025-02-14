<head>
   <style>
      .justify-content-center {
      -ms-flex-pack: center!important;
      justify-content: center!important;
      align-items: center;
      height: 100%;
      }
   </style>
</head>
<main class="login-form">
   <div class="cotainer">
      <div class="row justify-content-center">
         <div class="col-md-4">
            <div class="card">
               @if(session('error'))
               <div class="alert alert-danger">
                  {{ session('error') }}
               </div>
               @endif
               <h3 class="card-header text-center">Login</h3>
               <div class="card-body">
                  <form method="POST" action="{{ route('submit.login') }}">
                     @csrf
                     <div class="form-group mb-3">
                        <input type="text" placeholder="Email" id="email" class="form-control" name="email" required
                           autofocus>
                        @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                     </div>
                     <div class="form-group mb-3">
                        <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                        @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                     </div>
                     <div class="form-group mb-3">
                        <div class="checkbox">
                           <label>
                           <input type="checkbox" name="remember"> Remember Me
                           </label>
                        </div>
                     </div>
                     <div class="d-grid mx-auto">
                        <button type="submit" class="btn btn-dark btn-block">Signin</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</main>
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('public/admin/plugins/fontawesome-free/css/all.min.css') }}">
<!-- Ionicons -->
<link rel="stylesheet" href="{{ asset('public/admin/code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="{{ asset('public/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
<!-- iCheck -->
<link rel="stylesheet" href="{{ asset('public/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
<!-- JQVMap -->
<link rel="stylesheet" href="{{ asset('public/admin/plugins/jqvmap/jqvmap.min.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('public/admin/dist/css/adminlte.min.css') }}">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="{{ asset('public/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{ asset('public/admin/plugins/daterangepicker/daterangepicker.css') }}">
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('public/admin/plugins/summernote/summernote-bs4.min.css') }}">