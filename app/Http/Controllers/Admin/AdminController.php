<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Goutte\Client;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function scraper()
    {
        return view('admin.scraper');
    }

    public function scrape(Request $request)
    {
        $client = new Client();
        $crawler = $client->request('GET', $request->url);
        $link = $crawler->filter('.resultitem a')->link();
dd($link);
    }
}
