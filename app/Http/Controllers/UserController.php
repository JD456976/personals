<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function posts()
    {
        $posts = Post::where('user_id',Auth::user()->id)->get();

        return view('user.posts', compact('posts'));
    }
}
