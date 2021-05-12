<!DOCTYPE html>
<html>
	<head>
		<title>{{ config ('app.name') }} | @yield('title', 'Iligan Medical Hospital')</title>
		<link rel="stylesheet" type="text/css" href="{{ url('packages/bootstrap-4.3.1/css/bootstrap.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ url('packages/fontawesome/css/all.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ url('css/custom.css') }}">
	</head>
		<body>
			<div class="container">
				@include('messages')
				@yield('content')		
			</div>
			<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
			<script type="text/javascript" src="{{ url('packages/bootstrap-4.3.1/js/bootstrap.min.js') }}"></script>
			<script type="text/javascript" src="{{ url('packages/fontawesome/js/all.js') }}"></script>
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
			@yield('after_scripts')
		</body>
</html>