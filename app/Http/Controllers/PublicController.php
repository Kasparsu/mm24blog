<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PublicController extends Controller
{
    public function index() {
        $posts = Post::with('images', 'user', 'tags')->withCount('comments')->latest()->simplePaginate(16);
        return view('welcome', compact('posts'));
    }

    public function user(User $user) {
        $posts = $user->posts()->with('images', 'user', 'tags')->withCount('comments')->latest()->simplePaginate(16);
        return view('welcome', compact('posts', 'user'));
    }

    public function buttons() {
        return view('buttons');
    }

    public function post(Post $post) {
        return view('post', compact('post'));
    }

    public function follow(User $user) {
        if($user->authHasFollowed) {
            $user->followers()->detach(Auth::user());
        } else {
            $user->followers()->attach(Auth::user());
        }
        return redirect()->back();
    }

    public function feed() {
        $posts = Auth::user()->feed()->with('images', 'user', 'tags')->withCount('comments')->latest()->simplePaginate(16);
        return view('welcome', compact('posts'));
    }
}
