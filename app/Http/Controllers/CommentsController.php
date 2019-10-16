<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Comment;
use Illuminate\Auth\Access\Response;
class CommentsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index() {
        $users = auth()->user()->pluck('id');
        $comments = Comment::whereIn('user_id', $users)->with('user')->latest()->paginate(7);
        return view('comments/index', compact('comments'));
    }
    
    public function create() {
        return view('comments/create');
    }

    public function store() {
        $data = request()->validate([ 'comment_text'=>'required' ]);
        auth()->user()->comments()->create($data);
        return redirect('/profile/' . auth()->user()->id);
    }

    public function edit(User $user, Comment $comment) {
        $this->authorize('update',$comment);
        return view('comments.edit',compact('user','comment'));
    }

    public function update(User $user, Comment $comment) {
        $this->authorize('update',$comment);
        $data = request()->validate([ 'comment_text' => '' ]);
        if (auth()->user()) { $comment->update($data); }
        return redirect("/profile/{$user->id}");
    }

    public function destroy(User $user, Comment $comment) {
        $this->authorize('delete',$comment);
        if (auth()->user()) { $comment->delete(); }
        return redirect("/profile/{$user->id}");
    }
}
