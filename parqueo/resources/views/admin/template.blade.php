<!DOCTYPE html>
<html>
<head>
     <title>@yield('title',' Parqueo')</title>
     <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
     <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
     <link rel="stylesheet" href="{{asset('admin/css/main.css')}}">
</head>
<body>
     
     @if (\Session::has('message'))
          @include('admin.parcial.message')
     @endif
     @include('admin.parcial.nav')
     @yield('content')
     @include('admin.parcial.footer')

     <script src="{{ asset('js/jquery.min.js') }}"></script>
     <script src="{{ asset('js/bootstrap.min.js') }}"></script>
     <script src="{{ asset('admin/js/main.js') }}"></script>
</body>
</html>