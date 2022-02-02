<?php

namespace App\Http\Middleware;

use App\Models\Page;
use Closure;
use Illuminate\Support\Facades\View;

class ViewShare
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //Main Menu
        $mainMenu = Page::where('main_menu',1)->where('is_active',1)->get();
        View::share('mainMenu', $mainMenu);

        //Footer Menu
        $footerMenu = Page::where('footer_menu',1)->where('is_active',1)->get();
        View::share('footerMenu', $footerMenu);

        return $next($request);
    }
}
