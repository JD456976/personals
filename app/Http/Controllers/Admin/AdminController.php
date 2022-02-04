<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Goutte\Client;
use Illuminate\Http\Request;
use Symfony\Component\ErrorHandler\Debug;
use Weidner\Goutte\GoutteFacade;

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
        $client = new Client(['debug' => true,]);
        $crawler = $client->request('GET', 'https://doublelist.com/login');
        $form = $crawler->selectButton('login')->form();
        Debug::logPrintR();
        $crawler = $client->submit($form, ['login' => 'jdog45@gmail.com', 'password' => 'UPsidedown666!']);
        dd($crawler);
        $crawler->filter('a')->each(function ($node) {
            print $node->text()."\n";
        });
    }
}
