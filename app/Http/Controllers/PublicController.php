<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PublicController extends Controller
{
    public function index() {
        $posts = Post::simplePaginate(16);
        return view('welcome', compact('posts'));
    }

    public function buttons() {
        return view('buttons');
    }

    public function post(Post $post) {
        return view('post', compact('post'));
    }
}
