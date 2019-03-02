<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> <?= isset($title_name)? $title_name:'صفحه مدیریت'  ?>   </title>


    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="{{asset('admins/css/material-dashboard.min.css')}}" rel="stylesheet" />

</head>

<body dir="rtl">

@yield('content')
<script src="{{ asset('js/app.js') }}" defer></script>

<!--   Core JS Files   -->
<script src="{{asset('admins/js/jquery.min.js')}}"></script>
<script src="{{asset('admins/js/popper.min.js')}}"></script>
<script src="{{asset('admins/js/bootstrap-material-design.min.js')}}"></script>
<script src="{{asset('admins/js/perfect-scrollbar.jquery.min.js')}}"></script>
<!-- Sharrre libray -->
<script src="{{asset('admins/js/jquery.sharrre.js')}}"></script>
<script src="{{asset('admins/js/jquery.min.js')}}"></script>

</body>
</html>