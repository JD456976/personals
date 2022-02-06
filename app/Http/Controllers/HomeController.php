<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactSendRequest;
use App\Mail\ContactSendMail;
use App\Models\Category;
use App\Models\Page;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function home()
    {
        $categories = Category::all();
        if (Session::has('cookies')==null) {

            toast()->html('Cookies',"
              <a href=".route('cookie')."><button class='btn btn-primary'>Accept All?</button></a>
            ",'info')->position('bottom')->timerProgressBar()->autoClose(10000);
        }
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

    public function tos()
    {
        $page = Page::where('slug','tos')->first();
        return view('tos', compact('page'));
    }

    public function cookie()
    {
        Session::put('cookies',1);

        return redirect()->back();
    }
}
