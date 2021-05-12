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
		@if(count($blogs) > 0)
		<div class="col-md-12 mb-5">
        <div class="row">
            <div class="col-md-4">
                <a href="{{ url('blog/show', $blogs->last()->id) }}" class="card-text text-dark">
                    <img src="{{ $blogs->last()->image ? url('storage/uploads', $blogs->last()->image) : url('images/default.png') }}" width="100%">
                </a>
            </div>
            <div class="col-md-8">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <small class="mr-2">
                            <i class="far fa-clock"></i>
                            {{ date('F d, Y', strtotime($blogs->last()->created_at)) }}
                        </small>
                        <small>
                            <i class="far fa-user"></i>
                            {{ $blogs->last()->author_name }}
                        </small>
                    </div>
                    <div>
                      <a href="{{ url('blog/edit', $blogs->last()->id) }}" class="btn btn-sm btn-outline-info"><i class="far fa-edit"></i></a>
                      <button class="btn btn-sm btn-danger btn-delete"><i class="fa fa-trash"></i></button>
                    </div>
                </div>
                <a href="{{ url('blog/show', $blogs->last()->id) }}" class="card-text text-dark">
                    <h5>{{ $blogs->last()->title }}</h5>
                    <p>{{ $blogs->last()->content }}</p>
                </a>
            </div>
        </div>
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
							<form action="{{ url('blog/destroy', $blog->id) }}" method="POST">
								@csrf
								@method('DELETE')
							  <a href="{{ url('blog/edit', $blog->id) }}" class="btn btn-sm btn-outline-info"><i class="far fa-edit"></i></a>
							  <button type="button" class="btn btn-sm btn-danger btn-delete"><i class="fa fa-trash"></i></button>
							  </form>
							</div>
						</div>
						<h5>{{ $blog->title }}</h5>
					</div>
				</div>
			</div>
		</a>
	</div>
	@endforeach
	@else
		<div class="col-md-8">
			<span>No data available</span>
		</div>
	@endif
</div>
<div class="row text-center mt-3">
	<div class="col-md-12">
		{!! $blogs->links() !!}
	</div>
</div>
@endsection

@section('after_scripts')
<script type="text/javascript">
	$(document).ready(function(){
		$('.btn-delete').on('click', function(){
			var form = $(this).closest('form');
			swal({
			  title: "FOGSHURE?",
			  text: "Once deleted, you will not be able to recover this imaginary file!",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
			  if (willDelete) {
			  	form.submit();
			    
			  } else {
			    swal("Your blog entry is safe!");
			  }
			});
		});
	});
	</script>

@if(session()->get('success'))
	<script type="text/javascript">
	    swal({
	      text: '{!! session()->get('success') !!}',
	      icon: "success",
	      button: "OK",
	    });
	</script>
@endif
@endsection

