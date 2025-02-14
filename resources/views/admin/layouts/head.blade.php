<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Admin Dashboard</title>
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="robots" content="all,follow">
      <!--summernote text editor css-->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('public/css/custom.css') }}">
      <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
      <link rel="stylesheet" href="{{ asset('public/admin/plugins/fontawesome-free/css/all.min.css') }}">
      <link rel="stylesheet" href="{{ asset('public/admin/code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
      <link rel="stylesheet" href="{{ asset('public/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
      <link rel="stylesheet" href="{{ asset('public/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
      <link rel="stylesheet" href="{{ asset('public/admin/plugins/select2/css/select2.min.css') }}">
      <link rel="stylesheet" href="{{ asset('public/admin/plugins/jqvmap/jqvmap.min.css') }}">
      <link rel="stylesheet" href="{{ asset('public/admin/dist/css/adminlte.min.css') }}">
      <link rel="stylesheet" href="{{ asset('public/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
      <link rel="stylesheet" href="{{ asset('public/admin/plugins/daterangepicker/daterangepicker.css') }}">
      <link rel="stylesheet" href="{{ asset('public/admin/plugins/summernote/summernote-bs4.min.css') }}">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
      <!--summernote-->
      <link rel="stylesheet" href="{{ asset('public/admin/plugins/summernote/summernote-bs4.min.css') }}">
      </head>


