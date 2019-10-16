@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/profile/{{$user->id}}/{{$comment->id}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <h1>
                        Edit Comment
                    </h1>
                </div>
                <div class="form-group row">
                    <textarea 
                        class="col-10 form-control input-lg @error('comment_text') is-invalid @enderror"
                        id="comment_text"  
                        rows="15"
                        name = "comment_text"
                        value="{{ old('comment_text') ?? $comment->comment_text}}"
                        required
                        autofocus>
                    </textarea>
                        @error('comment_text')
                            <strong>{{ $message }}</strong>
                        @enderror
                </div>
                <div class="row">
                    <button class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
