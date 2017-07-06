<!DOCTYPE html>
<html>
<head>
	<title>@yield('title',' Mi Parqueo Faborito')</title>
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
     <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
     <link rel="stylesheet" href="{{asset('css/main.css')}}">
	
</head>
<body>
     
     @if (\Session::has('message'))
          @include('store.parcial.message')
     @endif
     @include('store.parcial.nav')
     @yield('content')
     @include('store.parcial.footer')

     
     <script src="{{ asset('js/jquery.min.js') }}"></script>
     <script src="{{ asset('js/bootstrap.min.js') }}"></script>
     <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>