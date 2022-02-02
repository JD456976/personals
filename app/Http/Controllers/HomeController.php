<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessPosts;
use App\Models\Category;
use App\Models\Page;
use Illuminate\Http\Request;

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

    public function contactSen
    {

    }
}
