<?php

namespace App\Providers;


use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));

            Route::middleware(['web', 'admin', 'auth'])
                ->namespace($this->namespace)
                ->prefix('admin')
                ->name('admin.')
                ->group(base_path('routes/admin.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });

        RateLimiter::for('post-reply', function (Request $request) {
            return Limit::perMinute(2)->by(optional($request->user())->id ?: $request->ip())
                ->response(function() {
                    Alert::error('Ooops!', 'You are sending replies a bit too fast. You are limited to 2 messages per minute.');
                    return redirect()->back();
                });
        });

        RateLimiter::for('contact-send', function (Request $request) {
            return Limit::perHour(1)->by(optional($request->user())->id ?: $request->ip())
                ->response(function() {
                    Alert::warning('Ooops!', 'We got your original message, give us a chance to reply.');
                    return redirect(\route('home'));
                });
        });
    }
}
