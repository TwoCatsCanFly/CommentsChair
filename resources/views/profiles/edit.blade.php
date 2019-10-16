@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <h1>
                        Edit Profile
                    </h1>
                </div>
                <div class="row pb-3">
                    <label for="image" class="col-md-4 col-form-label">Profile Image</label>
                    <input  type="file" 
                            class="form-control-file"
                            id="image"
                            autofocus
                            name="image">
                    @error('image')
                    <strong>{{ $message }}</strong>
                    @enderror
                </div>
                <div class="row">
                    <button class="btn btn-primary">Save Profile</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
