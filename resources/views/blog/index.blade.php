<!DOCTYPE html>
<html>
	<head>
		<title>
			Iligan Medical Hospital
		</title>
		<link rel="stylesheet" type="text/css" href="{{ url('packages/bootstrap-4.3.1/css/bootstrap.min.css') }}">
	</head>
	<body>
		<div class="container">
			@if(session()->get('success'))
	        <div class="alert alert-success">
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	            </button>
	            {!! session()->get('success') !!}
	        </div>
        	@endif
			<div class="row ">
				@foreach($blogs as $i => $blog)
				<div class="col-md-12 pt-5">
					<div class="card">
						<div class="card-header">
							<h5>{{ $blog->title }}</h5>
						</div>
						<div class="card-body">
							{{ $blog->content }}
						</div>
						<div class="card-footer">
							<span class="badge badge-success">{{$blog->name }}</span>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>

		<script type="text/javascript" src="{{ url('packages/bootstrap-4.3.1/js/bootstrap.min.js') }}"></script>
	</body>
</html>

