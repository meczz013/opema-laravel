@if(session()->get('success'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {!! session()->get('success') !!}
    </div>
@endif

@if($errors->any())
    <div class="row mt-2">
        <div class="col-md-12">
            <div class="alert alert-danger alert-errors" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                @foreach($errors->all() as $error)
                    {!! $error !!}<br/>
                @endforeach
                <input type="hidden" name="" id="html_errors" value="{{ $errors->all()[0] }}">
            </div>
        </div>
   	</div>
@endif