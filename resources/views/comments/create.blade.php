@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/c" method="POST">
        @csrf
        <div class="row">
            <div class="col-10 offset-2">
                <div class="row">
                    <h1>
                        Add New Comment
                    </h1>
                </div>
                <div class="form-group row">
                    <textarea 
                        class="col-10 form-control input-lg @error('comment_text') is-invalid @enderror"
                        id="comment_text"  
                        rows="15"
                        name = "comment_text"
                        value="{{ old('comment_text') }}" required 
                        autocomplete="comment_text" autofocus>
                    </textarea>
                        @error('comment_text')
                            <strong>{{ $message }}</strong>
                        @enderror
                </div>
                <div class="row">
                    <button class="btn btn-primary">Add new comment</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
