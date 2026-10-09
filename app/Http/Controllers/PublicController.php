<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(Request $request) {
        $perPage = 16;
        $page = $request->query('page');
        // 1 => 0 ; 2 => 16 ; 3 => 32 ; 4 => 48; => 5 => 64
        $skip = ($page - 1) * $perPage;
        $posts = Post::take($perPage)->skip($skip)->get();
        return view('welcome', compact('posts'));
    }

    public function buttons() {
        return view('buttons');
    }
}
