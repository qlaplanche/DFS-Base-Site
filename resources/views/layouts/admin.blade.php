<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>{{ config('app.name', 'Name') }}</title>

	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/admin.css') }}" rel="stylesheet">
	<link href="{{ asset('css/boostrap-theme.css') }}" rel="stylesheet">
	<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/style.css') }}" rel="stylesheet">


</head>

<body>

	@include('subviews.admin.navbar')

	<div class="wrapper">

		<nav id="sidebar">
			@include('subviews.admin.sidebar')
		</nav>

		<div id="content" class="container-fluid">
      @if(Session::has('message'))
		    <p class="alert alert-info">{{ Session::get('message') }}</p>
		  @endif 
    
      @yield('content')

		</div>

	</div>
	@include('subviews.footer')

  <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('js/app.js')}}"></script>
  <script src="{{asset('js/script.js')}}"></script>
</body>

</html>