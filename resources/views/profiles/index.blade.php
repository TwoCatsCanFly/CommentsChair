@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-2">
            <img src="{{$user->profile->profileImage()}}" 
            class="rounded-circle w-100">
        </div>
        <div class="col-9">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{ $user->username }}</h1>
                
            </div>
            @can('update', $user->profile)
                <form action="{{URL::route('profile.edit',[$user->id])}}" class="">
                    @csrf
                    <button type="submit" class="btn btn-info btn-sm">Edit Profile</button>
                </form>
            @endcan
            <div>
                <div><strong>{{ $user->comments->count() }}</strong> comments</div>
            </div>
            @can('update', $user->profile)
                <form action="{{URL::route('comment.create',[$user->id])}}" class="pb-3">
                    @csrf
                    <button type="submit" class="btn btn-primary btn-lg">Add New Comment</button>
                </form>
            @endcan
            @foreach ($comments as $comment)
            <div class="row d-flex pb-2">
                <div class="col-9">
                    <div class="d-flex" >
                        <strong>{{ $user->username }}</strong>
                        @can('update',$user->profile)
                        <form action="{{URL::route('comment.edit',[$user->id,$comment->id])}}" class="pl-3 pr-3">
                            @csrf
                            <button type="submit" class="btn btn-outline-dark btn-sm">Edit</button>
                        </form>
                        <form action="{{URL::route('comment.destroy',[$user->id,$comment->id])}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                        </form>
                        @endcan
                    </div>
                    <div class="pb-1">
                        {{$comment->comment_text}}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{$comments->links()}}
        </div>
    </div>
</div>
@endsection
