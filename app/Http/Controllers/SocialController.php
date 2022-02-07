<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Exception;

class SocialController extends Controller
{
    public function githubRedirect()
    {
        return Socialite::driver('github')->redirect();
    }

    public function twitterRedirect()
    {
        return Socialite::driver('twitter')->redirect();
    }

    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function loginWithGithub()
    {
        try {
            $user = Socialite::driver('github')->user();
            $isUser = User::where('github_id', $user->id)->first();

            if ($isUser) {
                Auth::login($isUser);
                return redirect('/');
            } else {
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'github_id' => $user->id,
                    'password' => encrypt('UPsidedown666!'),
                ]);

                Auth::login($createUser);
                return redirect('/dashboard');
            }
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }

    public function loginWithTwitter()
    {
        try {
            $user = Socialite::driver('twitter')->user();
            $isUser = User::where('twitter_id', $user->id)->first();

            if ($isUser) {
                Auth::login($isUser);
                return redirect('/');
            } else {
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'twitter_id' => $user->id,
                    'password' => encrypt('UPsidedown666!'),
                ]);

                Auth::login($createUser);
                return redirect('/');
            }
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }

    public function loginWithFacebook()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $isUser = User::where('facebook_id', $user->id)->first();

            if ($isUser) {
                Auth::login($isUser);
                return redirect('/');
            } else {
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'twitter_id' => $user->id,
                    'password' => encrypt('UPsidedown666!'),
                ]);

                Auth::login($createUser);
                return redirect('/');
            }
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }

    public function loginWithGoogle()
    {
        try {
            $user = Socialite::driver('google')->user();
            $isUser = User::where('email', $user->email)->first();

            if ($isUser) {
                Auth::login($isUser);
                return redirect('/');
            } else {
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'twitter_id' => $user->id,
                    'password' => encrypt('UPsidedown666!'),
                ]);

                Auth::login($createUser);
                return redirect('/');
            }
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }
}
