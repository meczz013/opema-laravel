@extends('app')

@section('title')
	Create
@endsection

@section('content')
<div class="container">
	<div class="row mt-3">
    	<div class="col-md-12">
            <a href="{{ url('blog') }}" class="btn btn-sm btn-outline-primary"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
	</div>
			
	<form action="{{ url('blog') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="row justify-content-center mt-5">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>Fill Form</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <h6>Title</h6>
                                <input type="text" name="title" class="form-control">
                            </div>
                            <div class="form-group">
                                <h6>Content</h6>
                                <textarea name="content" class="form-control"></textarea>
                            </div>
							<div class="form-group">
                            <h6>Tags</h6>
                            <select class="form-control" name="tag_id">
                                <option value="">-- Select --</option>
                                @foreach($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                                <h6>Image</h6>
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
    </form>
</div>
@endsection