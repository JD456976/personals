<?php

namespace App\Http\Controllers;

use App\Mail\SendReplyMail;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function posts()
    {
        $posts = Post::where('user_id',Auth::user()->id)->get();

        return view('user.posts', compact('posts'));
    }

    public function send(Request $request, $id)
    {
        $post = Post::where('id',$id)->first();

        Mail::to($post->user->email)->send(new SendReplyMail($request, $post));

        Alert::success('Success!', 'Your message has been sent');

        return redirect()->back();
    }
}
