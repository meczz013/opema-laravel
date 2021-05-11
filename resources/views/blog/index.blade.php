@extends('app')

@section('title')
    List
@endsection

@section('content')
<div class="row">
	<div class="col-md-12 mb-3 mt-3">
		<div class="d-flex align-items-center">
			<h3 class="mr-2">Blogs</h3>
			<a href="{{ url('blog/create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Blog</a>
		</div>
	</div>
	@foreach($blogs as $i => $blog)
	<div class="col-md-4">
		<a href="{{ url('blog/show', $blog->id) }}" class="card-text text-dark">
			<div class="card border-0">
				<div class="card-body p-0">
					<img src="{{ $blog->image ? url('storage/uploads', $blog->image) : url('images/default.png') }}" width="100%">
					<div class="mt-2" style="position: relative;">
						<div class="d-flex justify-content-between align-items-center mb-2">
							<div>
								<small class="mr-2">
									<i class="far fa-clock"></i>
									{{ date('F d, Y', strtotime($blog->created_at)) }}
								</small>
								<small>
									<i class="far fa-user"></i>
									{{ $blog->author_name }}
								</small>
							</div>
							<div>
							  <a href="{{ url('blog/edit', $blog->id) }}" class="btn btn-sm btn-outline-info"><i class="far fa-edit"></i></a>
							  <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
							</div>
						</div>
						<h5>{{ $blog->title }}</h5>
					</div>
				</div>
			</div>
		</a>
	</div>
	@endforeach
</div>
<div class="row text-center mt-3">
	<div class="col-md-12">
		{!! $blogs->links() !!}
	</div>
</div>
@endsection