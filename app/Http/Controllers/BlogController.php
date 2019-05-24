<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class BlogController extends Controller
{
    public function __construct () {
        \Carbon\Carbon::setLocale('es');
    }

    public function index () {
        $user = User::select('name', 'info', 'photo', 'youtube', 'linkedin', 'github')->firstOrFail();
        $posts = Post::published()->latest()->paginate(10);
        return view('blog.index', compact('posts', 'user'));
    }

    public function show (Post $blog) {
        $user = User::select('name', 'info', 'photo', 'youtube', 'linkedin', 'github')->firstOrFail();
        return view('blog.show', ['post' => $blog, 'user' => $user ]);
    }
}
