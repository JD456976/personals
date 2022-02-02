<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactSendRequest;
use App\Jobs\ProcessPosts;
use App\Mail\ContactSendMail;
use App\Models\Category;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function home()
    {
        $categories = Category::all();
        return view('home', compact('categories'));
    }

    public function page($slug)
    {
        $page = Page::where('slug',$slug)->first();

        return view('page', compact('page'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function contactSend(ContactSendRequest $request)
    {
        Mail::to('craig219@comcast.net')->send(new ContactSendMail($request));

        Alert::success('Success!', 'Your message has been sent');

        return redirect(route('home'));
    }
}
