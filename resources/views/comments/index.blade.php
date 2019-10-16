@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($comments as $comment)
        <div class="row d-flex pb-3">
        <div class="col-1">
            <a href="/profile/{{$comment->user->id}}">
                <img src="{{$comment->user->profile->profileImage()}}" alt="Nope" class="rounded-circle" style="width:5vw" >
            </a>
        </div>
        <div class="col-8 ml-5">
            <div class="d-flex" >
                <strong>
                    <a href="/profile/{{$comment->user->id}}" style="color: black">
                        {{ $comment->user->username }}
                    </a>
                </strong>
            </div>
            <div>{{$comment->comment_text}}</div>
        </div>
    </div>
    @endforeach
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{$comments->links()}}
        </div>
    </div>
</div>
@endsection
