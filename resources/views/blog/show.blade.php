@extends('app')

@section('title')
    {{$blog->title}}
@endsection

@section('content')

<div class="container">
		<div class="row mt-3">
			<div class="col-md-12">
				<a href="{{ url('blog') }}" class="btn btn-sm btn-outline-primary"><i class="fa fa-arrow-left"></i> Back</a>
			</div>
		</div>
		<div class="row justify-content-center mt-2">
			<div class="col-md-9">
				<img class="mb-2" src="{{ $blog->image ? url('storage/uploads', $blog->image) : url('images/default.png') }}" width="100%">
				<div class="mb-2">
					<span class="badge badge-success text-uppercase mr-2">
						{{ $blog->name }}
					</span>
				</div>
				<h5>{{ $blog->title }}</h5>
				<div class="mb-3">
					<small class="mr-2">
						<i class="far fa-clock"></i>
						{{ date('F d, Y', strtotime($blog->created_at)) }}
					</small>
					<small>
						<i class="far fa-user"></i>
						{{ $blog->author_name }}
					</small>
					<div class="mt-3">
						<p>{{ $blog->content }}</p>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection