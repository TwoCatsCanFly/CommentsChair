<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use File;
use App\Comment;
use App\Profile;
use Illuminate\Auth\Access\Response;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        $comments = auth()->user()->comments()->latest()->paginate(7);
        return view('profiles.index',compact('comments','user'));
    }
    public function edit(User $user)
    {
        /*dd($user->profile);*/
        /*dd($user->profile->image);*/
        $this->authorize('update',$user->profile);

        return view('profiles.edit',compact('user'));
    }
    public function update(User $user)
    {
        $this->authorize('update',$user->profile);
        $data = request()->validate([
            'image' => 'mimes:jpeg,bmp,png|max:1900'
        ]);
        
        if (request('image')){
            File::delete("storage/{$user->profile->image}");
            $imagePath = request('image')->store('profile','public');
            $image = Image::make(public_path("storage/{$imagePath}"))->heighten(300)->crop(300,300);
            $image->save();
            $imageArray = ['image' => $imagePath];
        }

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));
        return redirect("/profile/{$user->id}");
    }
}
